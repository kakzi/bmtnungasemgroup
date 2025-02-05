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
        Schema::table('report_tellers', function (Blueprint $table) {
            $table->dropColumn('total_masuk');
            $table->dropColumn('total_keluar');
            $table->dropColumn('total');
            $table->dropColumn('file_foto_promo');
            $table->text('file_kas_keluar')->nullable()->change();
            $table->text('file_buku_serah_terima')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report_tellers', function (Blueprint $table) {
            $table->text('file_kas_keluar')->nullable(false)->change();
            $table->text('file_buku_serah_terima')->nullable(false)->change();
        });
    }
};
