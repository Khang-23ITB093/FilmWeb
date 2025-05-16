<?php

use App\Models\Genre;
use App\Models\UpcomingMovie;
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
        Schema::create('upcoming_movie_genres', function (Blueprint $table) {
            $table->foreignIdFor(UpcomingMovie::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Genre::class)->constrained()->cascadeOnDelete();
            $table->primary(['upcoming_movie_id', 'genre_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_movie_genres');
    }
};
