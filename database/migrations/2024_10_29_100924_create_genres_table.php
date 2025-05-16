<?php

use App\Models\Genre;
use App\Models\Film;
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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->json('images')->nullable();
            $table->timestamps();
        });

        Schema::create('film_genres', function (Blueprint $table) {
            $table->foreignIdFor(Film::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Genre::class)->constrained()->cascadeOnDelete();
            $table->primary(['film_id', 'genre_id']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
