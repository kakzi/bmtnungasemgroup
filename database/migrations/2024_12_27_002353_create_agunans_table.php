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
        Schema::create('agunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permohonan_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('office_id');
            $table->string('type_agunan');
            $table->string('atas_nama');
            $table->string('status_agunan');
            $table->string('nomor_agunan');
            $table->string('luas');
            $table->string('bank');
            $table->string('merk');
            $table->string('tahun');
            $table->string('nopol');
            $table->string('nomor_rangka');
            $table->string('warna');
            $table->string('produced_by');
            $table->string('nilai_taksir');
            $table->string('alamat_agunan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agunans');
    }
};
