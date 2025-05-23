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
        Schema::create('semesters', function (Blueprint $table) {
            $table->bigIncrements('smt_id');
            $table->string('smt_semester');
            $table->string('smt_school_year');
            $table->timestamps();

            $table->renameColumn('updated_at', 'smt_updated_at');
            $table->renameColumn('created_at', 'smt_created_at');
            
            $table->unsignedBigInteger('smt_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('smt_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('smt_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'smt_deleted_at');
            $table->string('smt_sys_note')->nullable();

            $table->foreign('smt_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('smt_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('smt_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
