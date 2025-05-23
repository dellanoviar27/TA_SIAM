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
        Schema::create('homeroom_teachers', function (Blueprint $table) {
            $table->bigIncrements('hrt_id');
            $table->unsignedBiginteger('hrt_class_id');
            $table->unsignedBiginteger('hrt_teacher_id');
            $table->timestamps();

            $table->renameColumn('updated_at', 'hrt_updated_at');
            $table->renameColumn('created_at', 'hrt_created_at');
            
            $table->unsignedBigInteger('hrt_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('hrt_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('hrt_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'hrt_deleted_at');
            $table->string('hrt_sys_note')->nullable();

            $table->foreign('hrt_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('hrt_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('hrt_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('hrt_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('hrt_teacher_id')->references('tch_id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homeroom_teachers');
    }
};
