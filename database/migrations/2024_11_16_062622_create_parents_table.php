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
        Schema::create('parents', function (Blueprint $table) {
            $table->bigIncrements('prt_id');
            $table->string('prt_father');
            $table->string('prt_status_father');
            $table->string('prt_address_father');
            $table->string('prt_job_father');
            $table->string('prt_income_father');
            $table->string('prt_mother');
            $table->string('prt_status_mother');
            $table->string('prt_address_mother');
            $table->string('prt_job_mother');
            $table->string('prt_income_mother');
            $table->string('prt_guardian');
            $table->string('prt_address_guardian');
            $table->string('prt_job_guardian');
            $table->string('prt_income_guardian');
            $table->string('prt_parent_phone');

             // Manual timestamps
             $table->timestamp('prt_created_at')->nullable();
             $table->timestamp('prt_updated_at')->nullable();
             
             // Manual soft deletes
             $table->timestamp('prt_deleted_at')->nullable();
 
             $table->unsignedBigInteger('prt_created_by')->nullable();
             $table->unsignedBigInteger('prt_deleted_by')->nullable();
             $table->unsignedBigInteger('prt_updated_by')->nullable();
       
             $table->string('prt_sys_note')->nullable();
 
             // Foreign keys
             $table->foreign('prt_created_by')->references('usr_id')->on('users')->onDelete('cascade');
             $table->foreign('prt_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
             $table->foreign('prt_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
