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
        Schema::table('report_marketings', function (Blueprint $table) {
            $table->dropColumn('file_speedawal');
            $table->dropColumn('file_speedakhir');
            $table->dropColumn('speedawal');
            $table->dropColumn('speedakhir');
            $table->bigInteger('km_harian')->after('jumlah_slip');
            $table->text('wilayah')->after('km_harian');
            $table->boolean('kejujuran')->default(false)->after('km_harian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report_marketings', function (Blueprint $table) {
            //
        });
    }
};
