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
            $table->string('std_gender');
            $table->string('std_birth_place');
            $table->date('std_birth_date');
            $table->string('std_child_to');
            $table->string('std_number_of_siblings');
            $table->string('std_address');
            $table->date('std_date_registration');
            $table->string('std_school'); // Nama sekolah formal
            $table->string('std_formal_level')->nullable(); // SD, SMP, SMA
            $table->string('std_formal_grade')->nullable(); // 1, 2, 3
            $table->unsignedBigInteger('std_class_id')->nullable();
            $table->string('std_nisn');
            $table->enum('std_status', ['pending', 'verified'])->default('pending');

            // Kolom tambahan untuk upload KK
            $table->string('std_kk_photo')->nullable(); // ← Tambahan kolom file KK

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
