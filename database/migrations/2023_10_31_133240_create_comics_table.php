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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 80);
            $table->text('description')->nullable();
            $table->text('thumb')->nullable();
            $table->string('price', 10);
            $table->string('series', 50)->nullable();
            $table->string('sale_date')->nullable();
            $table->string('type')->nullable();
            $table->json('artists')->nullable();
            $table->json('writers')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
