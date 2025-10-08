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
        Schema::create('drug_statistics', function (Blueprint $table) {
            $table->id();
           $table->integer('year_2018')->default(0);
        $table->integer('year_2019')->default(0);
        $table->integer('year_2020')->default(0);
        $table->integer('year_2021')->default(0);
        $table->integer('year_2022')->default(0);
        $table->integer('year_2023')->default(0);
        $table->integer('year_2024')->default(0);
        $table->integer('year_2025')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_statistics');
    }
};
