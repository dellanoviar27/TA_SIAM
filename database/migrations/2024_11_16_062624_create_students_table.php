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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('std_id');
            $table->string('std_name');
            $table->string('std_nis');
            $table->string('std_nisn');
            $table->unsignedBigInteger('std_class_id');
            $table->string('std_gender');
            $table->string('std_place_of_birth');
            $table->timestamp('std_date_of_birth');
            $table->string('std_religion');
            $table->string('std_address');
            $table->string('std_father_name');
            $table->string('std_father_occupation');
            $table->BigInteger('std_parent_phone');
            $table->string('std_status');
            $table->string('std_email');
           
            $table->unsignedBigInteger('std_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('std_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('std_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'std_deleted_at');
            $table->string('std_sys_note')->nullable();

            $table->foreign('std_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_class_id')->references('cls_id')->on('classes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
