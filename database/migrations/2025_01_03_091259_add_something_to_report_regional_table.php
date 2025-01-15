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
        Schema::table('report_regionals', function (Blueprint $table) {
            $table->boolean('check_s')->default(false)->after('make_by');
            $table->boolean('check_m')->default(false)->after('check_s');
            $table->boolean('check_as')->default(false)->after('check_m');
            $table->boolean('check_dir')->default(false)->after('check_as');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report_regionals', function (Blueprint $table) {
            //
        });
    }
};
