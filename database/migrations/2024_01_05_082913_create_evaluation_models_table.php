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
        Schema::create('evaluation_models', function (Blueprint $table) {
            $table->id();
            $table->text('remarque');
            $table->dateTime('start_At');
            $table->dateTime('end_At');

            $table->unsignedBigInteger('competence_id');
            $table->unsignedBigInteger('user_evaluateur_id');
            $table->unsignedBigInteger('user_evalue_id');
            $table->unsignedBigInteger('session_id');
            $table->timestamps();

            $table->foreign('competence_id')->references('id')->on('competence_models')->onDelete('cascade');
            $table->foreign('user_evaluateur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_evalue_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('session_models')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_models');
        Schema::dropIfExists('competence_evaluation');
    }
};
