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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('language');
            $table->string('level');
            $table->text('question_text');
            $table->text('options')->nullable();
            $table->string('correct_answer');
            $table->text('penjelasan')->nullable();
            $table->index(['language', 'level']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
