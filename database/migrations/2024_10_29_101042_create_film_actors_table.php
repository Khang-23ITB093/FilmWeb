<?php

use App\Models\Actor;
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
        Schema::create('film_actors', function (Blueprint $table) {
            $table->foreignIdFor(Film::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Actor::class)->constrained()->cascadeOnDelete();
            $table->primary(['film_id', 'actor_id']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_actors');
    }
};
