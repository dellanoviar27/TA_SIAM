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
            $table->string('std_nik');
            $table->string('std_name');
            $table->string('std_gender');
            $table->string('std_place_of_birth');
            $table->date('std_date_of_birth');
            $table->string('std_child_to');
            $table->string('std_number_of_siblings');
            $table->string('std_address');
            $table->date('std_date_registration');
            $table->string('std_school');
            $table->unsignedBigInteger('std_class_id');
            $table->string('std_nisn');
            // $table->string('std_father');
            // $table->string('std_status_father');
            // $table->string('std_address_father');
            // $table->string('std_job_father');
            // $table->string('std_income_father');
            // $table->string('std_mother');
            // $table->string('std_status_mother');
            // $table->string('std_address_mother');
            // $table->string('std_job_mother');
            // $table->string('std_income_mother');
            // $table->string('std_guardian');
            // $table->string('std_address_guardian');
            // $table->string('std_job_guardian');
            // $table->string('std_income_guardian');
            // $table->BigInteger('std_parent_phone');
            $table->string('std_pictures');
            $table->string('std_description');
            $table->string('std_status')->default('Pending', 'approved', 'rejected');
            $table->string('std_re_registration_status')->default('Pending', 'approved');

             // Manual timestamps
             $table->timestamp('std_created_at')->nullable();
             $table->timestamp('std_updated_at')->nullable();
             
             // Manual soft deletes
             $table->timestamp('std_deleted_at')->nullable();
 
             $table->unsignedBigInteger('std_created_by')->nullable();
             $table->unsignedBigInteger('std_deleted_by')->nullable();
             $table->unsignedBigInteger('std_updated_by')->nullable();
       
             $table->string('std_sys_note')->nullable();
 
             // Foreign keys
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
