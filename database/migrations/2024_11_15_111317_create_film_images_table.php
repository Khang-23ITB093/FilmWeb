<?php

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
        Schema::create('film_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id')->unique()->constrained()->cascadeOnDelete();
            $table->json('backgrounds');
            $table->json('posters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_images');
    }
};
