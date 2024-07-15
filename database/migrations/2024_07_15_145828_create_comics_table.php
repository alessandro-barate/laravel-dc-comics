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
            $table->timestamps();

            $table->string('title', 100);
            $table->text('description');
            $table->string('thumb', 1000);
            $table->string('price', 10);
            $table->string('series', 50);
            $table->string('sale_date', 10);
            $table->text('type', 20);
            $table->string('artists', 300);
            $table->string('writers', 300);
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
