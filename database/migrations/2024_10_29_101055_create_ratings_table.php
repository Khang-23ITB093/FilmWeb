<?php

use App\Models\Film;
use App\Models\User;
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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Film::class)->constrained('films')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned()->checkBetween(1, 5); // Đảm bảo giá trị từ 1 đến 5
            $table->timestamps();

            $table->unique(['user_id', 'film_id']); // Mỗi người chỉ được đánh giá 1 lần
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
