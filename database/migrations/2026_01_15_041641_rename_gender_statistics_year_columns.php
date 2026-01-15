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
         Schema::table('gender_statistics', function (Blueprint $table) {
            $table->renameColumn('2018', 'y2018');
            $table->renameColumn('2019', 'y2019');
            $table->renameColumn('2020', 'y2020');
            $table->renameColumn('2021', 'y2021');
            $table->renameColumn('2022', 'y2022');
            $table->renameColumn('2023', 'y2023');
            $table->renameColumn('2024', 'y2024');
            $table->renameColumn('2025', 'y2025');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('gender_statistics', function (Blueprint $table) {
            $table->renameColumn('y2018', '2018');
            $table->renameColumn('y2019', '2019');
            $table->renameColumn('y2020', '2020');
            $table->renameColumn('y2021', '2021');
            $table->renameColumn('y2022', '2022');
            $table->renameColumn('y2023', '2023');
            $table->renameColumn('y2024', '2024');
            $table->renameColumn('y2025', '2025');
        });
    }
};
