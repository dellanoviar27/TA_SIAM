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
            $table->string('tch_name');
            $table->string('tch_nip');
            $table->string('tch_gender');
            $table->string('tch_place_of_birth');
            $table->timestamp('tch_date_of_birth');
            $table->string('tch_religion');
            $table->BigInteger('tch_phone');
            $table->string('tch_subject');
            $table->unsignedBigInteger('tch_classes_id');
            $table->string('tch_group');
            $table->string('tch_position');
            $table->string('tch_address');
            $table->timestamps();

            $table->unsignedBigInteger('tch_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('tch_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('tch_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'tch_deleted_at');
            $table->string('tch_sys_note')->nullable();

            $table->foreign('tch_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_classes_id')->references('cls_id')->on('classes')->onDelete('cascade');
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
