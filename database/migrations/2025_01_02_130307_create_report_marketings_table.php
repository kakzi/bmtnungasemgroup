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
        Schema::create('report_marketings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('office_id')->constrained()->onDelete('cascade');
            $table->bigInteger('speedawal');
            $table->bigInteger('speedakhir');
            $table->bigInteger('modal');
            $table->bigInteger('anggota');
            $table->bigInteger('funding');
            $table->bigInteger('landing');
            $table->bigInteger('pendapatan');
            $table->bigInteger('nominal_npf');
            $table->bigInteger('jumlah_npf');
            $table->bigInteger('simpanan');
            $table->bigInteger('slip_simpanan');
            $table->bigInteger('penarikan');
            $table->bigInteger('slip_penarikan');
            $table->bigInteger('angsuran');
            $table->bigInteger('pokok');
            $table->bigInteger('ujroh');
            $table->bigInteger('slip_angsuran');
            $table->boolean('penagihan')->default(false);
            $table->bigInteger('lancar');
            $table->bigInteger('dpk');
            $table->bigInteger('kuranglancar');
            $table->bigInteger('diragukan');
            $table->bigInteger('macet');
            $table->boolean('prospek');
            $table->text('layanan');
            $table->text('p_simpanan');
            $table->text('p_pembiayaan');
            $table->text('anggota_b_simpanan');
            $table->text('anggota_b_pembiayaan');
            $table->bigInteger('aplikasiwa');
            $table->bigInteger('jumlah_slip');
            $table->boolean('update_media')->default(false);
            $table->text('file_slip_penarikan');
            $table->text('file_kas_opname');
            $table->text('file_foto_penawaran');
            $table->text('file_transaksi');
            $table->text('file_foto_penagihan');
            $table->text('file_form_modal');
            $table->text('file_medsos');
            $table->text('file_speedawal');
            $table->text('file_speedakhir');
            $table->boolean('check_bm')->default(false);
            $table->boolean('check_rm')->default(false);
            $table->boolean('check_s')->default(false);
            $table->boolean('check_m')->default(false);
            $table->boolean('check_as')->default(false);
            $table->boolean('check_dir')->default(false);
            $table->string('make_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_marketings');
    }
};
