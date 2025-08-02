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
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('att_id');
            $table->unsignedBigInteger('att_student_id');
            $table->unsignedBigInteger('att_class_id');
            $table->unsignedBigInteger('att_semester_id');

            $table->integer('att_sick')->default(0);
            $table->integer('att_permission')->default(0);
            $table->integer('att_absence')->default(0);

            $table->unsignedBigInteger('att_created_by')->nullable();
            $table->unsignedBigInteger('att_updated_by')->nullable();
            $table->unsignedBigInteger('att_deleted_by')->nullable();

            $table->softDeletes();
            $table->renameColumn('deleted_at', 'att_deleted_at');
            $table->string('att_sys_note')->nullable();
            $table->timestamps();

            $table->foreign('att_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('att_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('att_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('att_student_id')->references('std_id')->on('students')->onDelete('cascade');
            $table->foreign('att_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('att_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
