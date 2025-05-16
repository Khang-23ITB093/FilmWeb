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
        Schema::create('upcoming_movies', function (Blueprint $table) {
            $table->id();
            $table->string('title_upcoming'); 
            $table->integer('release_month_upcoming');
            $table->integer('release_day_upcoming');
            $table->integer('release_year_upcoming');
            $table->text('links');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_movies');
    }
};
