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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->bigIncrements('pdb_id');
            $table->string('pdb_name');
            $table->string('pdb_nis');
            $table->string('pdb_nisn');
            $table->unsignedBigInteger('pdb_class_id');
            $table->string('pdb_gender');
            $table->string('pdb_place_of_birth');
            $table->timestamp('pdb_date_of_birth');
            $table->string('pdb_religion');
            $table->string('pdb_address');
            $table->string('pdb_father_name');
            $table->string('pdb_father_occupation');
            $table->BigInteger('pdb_parent_phone');
            $table->string('pdb_status');
            $table->string('pdb_email');

            $table->unsignedBigInteger('pdb_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pdb_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pdb_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'pdb_deleted_at');
            $table->string('pdb_sys_note')->nullable();

            $table->foreign('pdb_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pdb_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pdb_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pdb_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};