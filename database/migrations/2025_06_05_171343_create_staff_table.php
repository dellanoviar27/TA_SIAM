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
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('stf_id');
            $table->unsignedBigInteger('stf_user_id')->nullable();
            $table->string('stf_nik');
            $table->string('stf_name');
            $table->string('stf_gender');
            $table->string('stf_birth_place');
            $table->date('stf_birth_date');
            $table->string('stf_address');
            $table->string('stf_phone', 20);

            $table->timestamp('stf_created_at')->nullable();
            $table->timestamp('stf_updated_at')->nullable();
            $table->softDeletes('stf_deleted_at');
            $table->string('stf_sys_note')->nullable();
            
            // Audit trail
            $table->unsignedBigInteger('stf_created_by')->nullable();
            $table->unsignedBigInteger('stf_updated_by')->nullable();
            $table->unsignedBigInteger('stf_deleted_by')->nullable();


            // Foreign keys
            $table->foreign('stf_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('stf_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('stf_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('stf_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};