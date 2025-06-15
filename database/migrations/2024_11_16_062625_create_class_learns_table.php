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
        Schema::create('class_learns', function (Blueprint $table) {
           $table->bigIncrements('clr_id');
            $table->unsignedBiginteger('clr_class_id');
            $table->unsignedBiginteger('clr_semester_id');
            $table->unsignedBiginteger('clr_teacher_id');
            $table->unsignedBiginteger('clr_student_id');
            $table->timestamps();

            $table->renameColumn('updated_at', 'clr_updated_at');
            $table->renameColumn('created_at', 'clr_created_at');
            
            $table->unsignedBigInteger('clr_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('clr_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('clr_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'clr_deleted_at');
            $table->string('clr_sys_note')->nullable();

            $table->foreign('clr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('clr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('clr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('clr_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('clr_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade');
            $table->foreign('clr_teacher_id')->references('tch_id')->on('teachers')->onDelete('cascade');
            $table->foreign('clr_student_id')->references('std_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_learns');
    }
};
