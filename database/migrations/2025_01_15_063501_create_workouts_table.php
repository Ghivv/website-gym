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
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('gym_id')->constrained('users')->onDelete('cascade');
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->integer('duration')->nullable(); // Durasi dalam menit
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->timestamps();
            $table->softDeletes(); // Soft delete
            $table->index('name'); // Indeks untuk pencarian
            $table->index('gym_id'); // Indeks untuk relasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
