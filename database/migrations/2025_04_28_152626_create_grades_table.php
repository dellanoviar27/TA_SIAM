<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('grd_id');
            $table->unsignedBigInteger('grd_student_id');
            $table->unsignedBigInteger('grd_class_id');
            $table->unsignedBigInteger('grd_semester_id');
            $table->unsignedBigInteger('grd_subject_id');
            $table->unsignedBigInteger('grd_teacher_id');

            // Nilai
            $table->float('grd_knowledge')->nullable();
            $table->float('grd_practice')->nullable();
            $table->float('grd_attitude')->nullable();
            $table->float('grd_average')->nullable();
            $table->string('grd_predicate')->nullable();
            $table->boolean('grd_passed')->nullable();

            // Kehadiran
            $table->integer('grd_sick')->nullable();        // Sakit
            $table->integer('grd_permission')->nullable();  // Izin
            $table->integer('grd_absence')->nullable();     // Tanpa keterangan

            // Audit Trail
            $table->unsignedBigInteger('grd_created_by')->nullable();
            $table->unsignedBigInteger('grd_updated_by')->nullable();
            $table->unsignedBigInteger('grd_deleted_by')->nullable();

            $table->softDeletes();
            $table->renameColumn('deleted_at', 'grd_deleted_at')->nullable();
            $table->string('grd_sys_note')->nullable();

            $table->timestamps();

            // Foreign Keys
            $table->foreign('grd_student_id')->references('std_id')->on('students')->onDelete('cascade');
            $table->foreign('grd_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('grd_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade');
            $table->foreign('grd_subject_id')->references('sbj_id')->on('subjects')->onDelete('cascade');
            $table->foreign('grd_teacher_id')->references('tch_id')->on('teachers')->onDelete('cascade');

            $table->foreign('grd_created_by')->references('usr_id')->on('users')->onDelete('set null');
            $table->foreign('grd_updated_by')->references('usr_id')->on('users')->onDelete('set null');
            $table->foreign('grd_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
