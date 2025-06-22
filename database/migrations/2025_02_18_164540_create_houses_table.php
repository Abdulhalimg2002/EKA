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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->json('img')->nullable();
            $table->string('location'); // remove ->require()
            $table->string('dec_');     // fix typo from 'dec' to match your controller
            $table->decimal('price', 10, 2);
            $table->integer('numofR');
            $table->string('City');
            $table->string('status')->default('pending');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
