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
        Schema::create('key_indicator_marketings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('indicator_one')->default(20);
            $table->integer('kpi_one');
            $table->string('target_funding')->nullable();
            $table->string('tercapai_funding')->nullable();
            $table->string('kurang_funding')->storedAs('target_funding - tercapai_funding')->nullable();
            $table->double('nilai_one')->storedAs('kpi_one');
            $table->double('total_one')->storedAs('(nilai_one * indicator_one / 100) * nilai_one');
            $table->integer('indicator_two')->default(20);
            $table->integer('kpi_two');
            $table->string('target_landing')->nullable();
            $table->string('tercapai_landing')->nullable();
            $table->string('kurang_landing')->storedAs('target_landing - tercapai_landing')->nullable();
            $table->double('nilai_two')->storedAs('kpi_two');
            $table->double('total_two')->storedAs('(nilai_two * indicator_two / 100) * nilai_two');
            $table->integer('indicator_three')->default(15);
            $table->integer('kpi_three');
            $table->string('target_notif')->nullable();
            $table->string('tercapai_notif')->nullable();
            $table->string('kurang_notif')->storedAs('target_notif - tercapai_notif')->nullable();
            $table->string('target_aplikasi')->nullable();
            $table->string('tercapai_aplikasi')->nullable();
            $table->string('kurang_aplikasi')->storedAs('target_aplikasi - tercapai_aplikasi')->nullable();
            $table->double('nilai_three')->storedAs('kpi_three');
            $table->double('total_three')->storedAs('(nilai_three * indicator_three / 100) * nilai_three');
            $table->integer('indicator_four')->default(15);
            $table->integer('kpi_four');
            $table->longText('notes_four')->nullable();
            $table->double('nilai_four')->storedAs('kpi_four');
            $table->double('total_four')->storedAs('(nilai_four * indicator_four / 100) * nilai_four');
            $table->integer('indicator_five')->default(15);
            $table->integer('kpi_five');
            $table->longText('notes_five')->nullable();
            $table->double('nilai_five')->storedAs('kpi_five');
            $table->double('total_five')->storedAs('(nilai_five * indicator_five / 100) * nilai_five');
            $table->integer('indicator_six')->default(15);
            $table->double('kpi_six');
            $table->string('notes_six')->nullable();
            $table->double('nilai_six')->storedAs('kpi_six');
            $table->double('total_six')->storedAs('(nilai_six * indicator_six / 100) * nilai_six');
            $table->double('total')->storedAs('total_one + total_two + total_three + total_four + total_five + total_six');
            $table->double('rata-rata')->storedAs('total/6');
            $table->longText('description')->nullable();
            $table->string('nilai_akhir')->storedAs('CASE WHEN `rata-rata` BETWEEN 2.7 AND 5.7 THEN "Marketing A" WHEN `rata-rata` BETWEEN 1.5 AND 2.69 THEN "Marketing B" WHEN `rata-rata` BETWEEN 0.7 AND 1.49 THEN "Marketing C" WHEN `rata-rata` BETWEEN 0.2 AND 0.69 THEN "Marketing D" ELSE "Marketing E" END')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_indicator_marketings');
    }
};
