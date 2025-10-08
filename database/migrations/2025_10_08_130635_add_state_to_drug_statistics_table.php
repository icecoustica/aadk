<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('drug_statistics', function (Blueprint $table) {
        $table->string('state')->nullable()->after('id');
    });
}

public function down()
{
    Schema::table('drug_statistics', function (Blueprint $table) {
        $table->dropColumn('state');
    });
}

};
