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
        Schema::create('jenis_dadahs', function (Blueprint $table) {
            $table->id();
            
            $table->string('jenis_dadah'); // contoh: 13-17, 18-25, etc.
            $table->integer('y2018')->default(0);
            $table->integer('y2019')->default(0);
            $table->integer('y2020')->default(0);
            $table->integer('y2021')->default(0);
            $table->integer('y2022')->default(0);
            $table->integer('y2023')->default(0);
            $table->integer('y2024')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_dadahs');
    }
};
