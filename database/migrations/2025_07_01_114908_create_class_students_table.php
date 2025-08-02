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
        Schema::create('class_students', function (Blueprint $table) {
            $table->bigIncrements('cst_id');

            $table->unsignedBigInteger('cst_class_id');
            $table->unsignedBigInteger('cst_semester_id');
            $table->unsignedBigInteger('cst_student_id');

            // Custom timestamp fields
            $table->timestamp('cst_created_at')->nullable();
            $table->timestamp('cst_updated_at')->nullable();
            $table->timestamp('cst_deleted_at')->nullable();

            // Audit trail
            $table->unsignedBigInteger('cst_created_by')->nullable();
            $table->unsignedBigInteger('cst_updated_by')->nullable();
            $table->unsignedBigInteger('cst_deleted_by')->nullable();

            $table->string('cst_sys_note')->nullable();

            // Foreign keys
            $table->foreign('cst_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('cst_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade');
            $table->foreign('cst_student_id')->references('std_id')->on('students')->onDelete('cascade');
            $table->foreign('cst_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cst_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cst_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_students');
    }
};