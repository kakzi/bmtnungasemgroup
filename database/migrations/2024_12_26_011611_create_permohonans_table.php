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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('register_anggota_id');
            $table->unsignedBigInteger('periode_angsuran_id');
            $table->unsignedBigInteger('jenis_pembiayaan_id');
            $table->bigInteger('jumlah_permohonan');
            $table->integer('lama_angsuran');
            $table->string('keperluan');
            $table->string('permohonan_ke');
            $table->string('status_rumah');
            $table->text('alamat_usaha');
            $table->string('nama_ahli_waris');
            $table->string('status_ahli_waris');
            $table->string('pekerjaan_ahli_waris');
            $table->string('nik_ahli_waris');
            $table->string('tanggal_ahli_waris');
            $table->string('umur_ahli_waris');
            $table->string('alamat_ahli_waris');
            $table->integer('istri');
            $table->integer('anak');
            $table->integer('orang_tua');
            $table->integer('other')->nullable();
            $table->string('file_permohonan');
            $table->string('berkas');
            $table->string('make_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
