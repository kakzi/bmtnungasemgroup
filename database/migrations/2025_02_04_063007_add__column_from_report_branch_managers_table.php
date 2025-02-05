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
        Schema::table('report_branch_managers', function (Blueprint $table) {
            $table->bigInteger('rahn')->after('pembiayaan');
            $table->bigInteger('ijarah')->after('rahn');
            $table->bigInteger('murabahah')->after('ijarah');
            $table->bigInteger('km_harian')->after('murabahah');
            $table->text('wilayah')->after('km_harian');
            $table->boolean('kejujuran')->default(false)->after('km_harian');
            $table->text('foto_tarikan')->after('kejujuran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report_branch_managers', function (Blueprint $table) {
            //
        });
    }
};
