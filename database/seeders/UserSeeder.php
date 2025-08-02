<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = User::firstOrCreate([
            'name'=>'staff',
            'email'=>'staff@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $staff->assignRole('staff');

        $teacher = User::firstOrCreate([
            'name'=>'teacher',
            'email'=>'teacher@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $teacher->assignRole('teacher');

        $student = User::firstOrCreate([
            'name'=>'student',
            'email'=>'student@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $student->assignRole('student');

        $curriculum = User::firstOrCreate([
            'name'=>'curriculum',
            'email'=>'curriculum@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $curriculum->assignRole('curriculum');

        $madrasah_head = User::firstOrCreate([
            'name'=>'madrasah_head',
            'email'=>'madrasahhead@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $madrasah_head->assignRole('madrasah_head');
    }
}
