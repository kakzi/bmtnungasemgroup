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
        Schema::table('point_lkh_santris', function (Blueprint $table) {
            $table->bigInteger('point_kehadiran')->after('point_lkh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('point_lkh_santris', function (Blueprint $table) {
            //
        });
    }
};
