<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Semester;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassStudentController extends Controller
{
    public function index(Request $request)
    {
        $semesters = Semester::all();
        $classes = Classes::all();

        $selectedSemester = $request->semester_id;
        $selectedClass = $request->class_id;

        $students = collect();
        $studentsInClass = collect();

         if ($selectedSemester && $selectedClass) {
        // Ambil siswa yang sudah diverifikasi (status = verified) dan belum masuk kelas di semester ini
            $students = Student::withoutTrashed()
                ->where('std_status', 'verified') // hanya siswa yang sudah diverifikasi
                ->whereDoesntHave('classStudents', function ($query) use ($selectedSemester) {
                    $query->where('cst_semester_id', $selectedSemester);
                })
                ->get();

            // Ambil siswa yang sudah masuk kelas ini
            $studentsInClass = ClassStudent::with('student.user')
                ->where('cst_semester_id', $selectedSemester)
                ->where('cst_class_id', $selectedClass)
                ->get();
        }

        return view('staff.class_student.index', compact(
            'semesters',
            'classes',
            'students',
            'studentsInClass',
            'selectedSemester',
            'selectedClass'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_id' => 'required|exists:semesters,smt_id',
            'class_id' => 'required|exists:classes,cls_id',
            'student_ids' => 'required|array'
        ]);

        foreach ($request->student_ids as $student_id) {
            $exists = ClassStudent::where('cst_student_id', $student_id)
                ->where('cst_semester_id', $request->semester_id)
                ->exists();

            if (!$exists) {
                ClassStudent::create([
                    'cst_class_id' => $request->class_id,
                    'cst_semester_id' => $request->semester_id,
                    'cst_student_id' => $student_id,
                    'cst_teacher_id' => null
                ]);
            }
        }

        Alert::success('Berhasil Menambahkan', 'Siswa Berhasil Ditambahkan');
        return redirect()->route('class-student.index', [
            'semester_id' => $request->semester_id,
            'class_id' => $request->class_id
        ]);

    }

    public function destroy(ClassStudent $class_student)
    {
        $class_student->delete();

        Alert::success('Berhasil Menghapus', 'Siswa Berhasil Dihapus');
        return redirect()->back();
    }

    public function show(ClassStudent $class_student) {}
    public function edit(ClassStudent $class_student) {}
    public function update(Request $request, ClassStudent $class_student) {}

    public function promote(Request $request)
        {
            $request->validate([
                'old_semester_id' => 'required|exists:semesters,smt_id',
                'old_class_id' => 'required|exists:classes,cls_id',
                'new_semester_id' => 'required|exists:semesters,smt_id',
                'new_class_id' => 'required|exists:classes,cls_id',
            ]);

            $studentsToPromote = ClassStudent::where('cst_semester_id', $request->old_semester_id)
                ->where('cst_class_id', $request->old_class_id)
                ->get();

            foreach ($studentsToPromote as $data) {
                $alreadyExists = ClassStudent::where('cst_student_id', $data->cst_student_id)
                    ->where('cst_semester_id', $request->new_semester_id)
                    ->exists();

                if (!$alreadyExists) {
                    ClassStudent::create([
                        'cst_class_id' => $request->new_class_id,
                        'cst_semester_id' => $request->new_semester_id,
                        'cst_student_id' => $data->cst_student_id,
                        // 'cst_teacher_id' => null, // isi jika wali kelas langsung diketahui
                    ]);
                }
            }

            Alert::success('Berhasil Dinaikan', 'Siswa berhasil dinaikkan ke kelas berikutnya');
            return redirect()->route('class-student.index', [
                'semester_id' => $request->new_semester_id,
                'class_id' => $request->new_class_id,
            ]);
        }
}
