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
        Schema::create('informations', function (Blueprint $table) {
            $table->bigIncrements('inf_id');
            $table->string('inf_title');
            $table->text('inf_content');
            $table->unsignedBigInteger('inf_user_id')->nullable();
            $table->boolean('inf_is_published')->default(false);
            $table->timestamps();

             $table->renameColumn('updated_at', 'inf_updated_at');
            $table->renameColumn('created_at', 'inf_created_at');
            
            $table->unsignedBigInteger('inf_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('inf_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('inf_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'inf_deleted_at');
            $table->string('inf_sys_note')->nullable();

            $table->foreign('inf_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('inf_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('inf_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('inf_user_id')->references('usr_id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
