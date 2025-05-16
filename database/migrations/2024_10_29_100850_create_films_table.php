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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string( 'title');
            $table->mediumText('description');
            $table->date('release_date');
            $table->enum('type', ['show', 'movie'])->default('movie');
            $table->boolean('status')->default(true);
            $table->integer('duration')->nullable();
            $table->decimal('average_rating',3, 1)->default(0);
            $table->json('video_path')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
