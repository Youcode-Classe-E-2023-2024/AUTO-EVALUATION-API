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

        Schema::create('competence_evaluation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competence_id');
            $table->unsignedBigInteger('evaluation_id');
            $table->boolean('is_correct')->default(false);

            $table->foreign('competence_id')->references('id')->on('competence_models')->onDelete('cascade');
            $table->foreign('evaluation_id')->references('id')->on('evaluation_models')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competence_evaluation');
    }
};
