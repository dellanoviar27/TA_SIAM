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
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('sbj_id');
            $table->string('sbj_code');
            $table->string('sbj_name');
            $table->string('sbj_kkm');
            $table->unsignedBiginteger('sbj_semester_id');
            $table->timestamps();

            $table->renameColumn('updated_at', 'sbj_updated_at');
            $table->renameColumn('created_at', 'sbj_created_at');

            $table->unsignedBigInteger('sbj_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sbj_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sbj_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'sbj_deleted_at');
            $table->string('sbj_sys_note')->nullable();

            $table->foreign('sbj_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sbj_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sbj_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sbj_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
