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
        Schema::table('register_anggotas', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable()->after('office_id');
            $table->unsignedBigInteger('city_id')->nullable()->after('province_id');
            $table->unsignedBigInteger('district_id')->nullable()->after('city_id');
            $table->unsignedBigInteger('subdistrict_id')->nullable()->after('district_id');
            $table->unsignedBigInteger('postal_code')->nullable()->after('subdistrict_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_anggotas', function (Blueprint $table) {
            //
        });
    }
};
