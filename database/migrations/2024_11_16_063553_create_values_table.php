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
        Schema::create('values', function (Blueprint $table) {
            $table->bigIncrements('val_id');
            $table->string('val_name');
            $table->unsignedBigInteger('val_class_id');
            $table->string('val_year');
            $table->string('val_semester');
            $table->unsignedBigInteger('val_subject_id');
            $table->string('val_task');
            $table->string('val_uts');
            $table->string('val_uas');
            $table->string('val_predicate');
            $table->string('val_description');
            
            $table->unsignedBigInteger('val_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('val_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('val_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'val_deleted_at');
            $table->string('val_sys_note')->nullable();

            $table->foreign('val_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('val_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('val_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('val_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('val_subject_id')->references('sbj_id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};
