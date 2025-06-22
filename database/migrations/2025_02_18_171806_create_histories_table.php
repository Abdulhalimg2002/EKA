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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
             $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
             $table->foreignId('house_id')->constrained('houses')->onDelete('cascade');
             $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
             $table->foreignId('bookings_id')->constrained('bookings')->onDelete('cascade');
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
