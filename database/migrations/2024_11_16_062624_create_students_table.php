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
            $table->unsignedBigInteger('std_user_id')->nullable();
            $table->string('std_name');
            $table->string('std_gender');
            $table->string('std_birth_place');
            $table->date('std_birth_date');
            $table->string('std_child_to');
            $table->string('std_number_of_siblings');
            $table->string('std_address');
            $table->date('std_date_registration');
            $table->string('std_school');
            $table->unsignedBigInteger('std_class_id');
            $table->unsignedBigInteger('std_parent_id')->nullable();
            $table->string('std_nisn');
            $table->string('std_pictures')->nullable();
            $table->enum('std_status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('std_ppdb_notes')->nullable();
            $table->enum('std_re-registration', ['pending', 'lunas', 'dicicil', 'gratis'])->default('pending');
            $table->text('std_registration_notes')->nullable();

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
             $table->foreign('std_parent_id')->references('prt_id')->on('parents')->onDelete('cascade');
             $table->foreign('std_user_id')->references('usr_id')->on('users')->onDelete('cascade');
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
