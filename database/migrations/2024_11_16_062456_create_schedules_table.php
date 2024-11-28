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
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('sch_id');
            $table->string('sch_day');
            $table->unsignedBigInteger('sch_class_id');
            $table->unsignedBigInteger('sch_subject_id');
            $table->unsignedBigInteger('sch_teacher_id');
            $table->timestamp('sch_time');
            $table->timestamps();

            $table->unsignedBigInteger('sch_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sch_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sch_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'sch_deleted_at');
            $table->string('sch_sys_note')->nullable();

            $table->foreign('sch_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sch_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sch_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sch_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('sch_subject_id')->references('sbj_id')->on('subjects')->onDelete('cascade');
            $table->foreign('sch_teacher_id')->references('tch_id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
