<?php

use App\Models\Season;
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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Season::class)->constrained()->cascadeOnDelete();
            $table->integer('episode_number')->unsigned();
            $table->string('title');
            $table->boolean('status')->default(true);
            $table->text('description');
            $table->date('release_date');
            $table->integer('duration');
            $table->string('video_path');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
