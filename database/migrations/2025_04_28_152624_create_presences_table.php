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
        Schema::create('presences', function (Blueprint $table) {
            $table->bigIncrements('prs_id');
            $table->unsignedBiginteger('prs_student_id');
            $table->unsignedBigInteger('prs_class_id');
            $table->unsignedBigInteger('prs_subject_id');
            $table->string('prs_status');
            $table->string('prs_descrription');
          
            $table->unsignedBigInteger('prs_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('prs_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('prs_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'prs_deleted_at');
            $table->string('prs_sys_note')->nullable();

            $table->foreign('prs_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('prs_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('prs_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('prs_student_id')->references('std_id')->on('students')->onDelete('cascade');
            $table->foreign('prs_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('prs_subject_id')->references('sbj_id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
