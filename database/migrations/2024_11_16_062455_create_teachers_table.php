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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('tch_id');
            $table->string('tch_nik');
            $table->unsignedBigInteger('tch_user_id')->nullable();
            $table->string('tch_name');
            $table->string('tch_gender');
            $table->string('tch_birth_place');
            $table->date('tch_birth_date');
            $table->string('tch_address');
            $table->string('tch_phone', 20);
            $table->string('tch_last_education');
            $table->string('tch_current_education');
            $table->string('tch_name_institution');
            $table->string('tch_main_task');
            $table->string('tch_additional_task');
            $table->string('tch_pictures')->nullable();

             // Custom timestamps
            $table->timestamp('tch_created_at')->nullable();
            $table->timestamp('tch_updated_at')->nullable();
            $table->softDeletes('tch_deleted_at');
            $table->string('tch_sys_note')->nullable();

            // Audit trail
            $table->unsignedBigInteger('tch_created_by')->nullable();
            $table->unsignedBigInteger('tch_updated_by')->nullable();
            $table->unsignedBigInteger('tch_deleted_by')->nullable();

           // Foreign keys
            $table->foreign('tch_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
