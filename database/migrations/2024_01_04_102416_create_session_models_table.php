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
        Schema::create('session_models', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('group_id');

            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groupe_models')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_models');
    }
};
