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
            $table->string('grd_katabah');
            $table->string('grd_kaifiyat');
            $table->string('grd_adab');
            $table->string('grd_predicate');
            $table->string('grd_description');
            $table->unsignedBigInteger('grd_presences_id');
            $table->unsignedBigInteger('grd_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('grd_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('grd_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'grd_deleted_at');
            $table->string('grd_sys_note')->nullable();

            $table->foreign('grd_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('grd_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('grd_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('grd_student_id')->references('std_id')->on('students')->onDelete('cascade');
            $table->foreign('grd_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('grd_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade');
            $table->foreign('grd_subject_id')->references('sbj_id')->on('subjects')->onDelete('cascade');
            $table->foreign('grd_teacher_id')->references('tch_id')->on('teachers')->onDelete('cascade');
            $table->foreign('grd_presences_id')->references('prs_id')->on('presences')->onDelete('cascade');
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
