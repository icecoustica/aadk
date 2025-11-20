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
        Schema::create('gender_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->integer('2018')->default(0);
            $table->integer('2019')->default(0);
            $table->integer('2020')->default(0);
            $table->integer('2021')->default(0);
            $table->integer('2022')->default(0);
            $table->integer('2023')->default(0);
            $table->integer('2024')->default(0);
            $table->integer('2025')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gender_statistics');
    }
};
