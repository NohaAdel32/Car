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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title',50)->unique();
            $table->tinyInteger('luggage');
            $table->tinyInteger('doors');
            $table->longText('content');
            $table->tinyInteger('passengers');
            $table->Float('price');
            $table->string('image',100);
            $table->foreignId('cat_id')->constrained('Categories');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
