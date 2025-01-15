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
        Schema::create('report_tellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('kas_khasanah');
            $table->bigInteger('uang_real');
            $table->bigInteger('pagu_kas');
            $table->bigInteger('modal_teller');
            $table->bigInteger('simpanan');
            $table->bigInteger('deposit');
            $table->bigInteger('angsuran');
            $table->bigInteger('atk');
            $table->bigInteger('materai');
            $table->bigInteger('kas_masuk');
            $table->bigInteger('total_masuk');
            $table->bigInteger('penarikan');
            $table->bigInteger('pencairan_pembiayaan');
            $table->bigInteger('kas_keluar');
            $table->bigInteger('penc_deposito');
            $table->bigInteger('total_keluar');
            $table->bigInteger('total');
            $table->boolean('prospek')->default(false);
            $table->boolean('update_media')->default(false);
            $table->boolean('update_jaminan')->default(false);
            $table->text('layanan');
            $table->text('p_pembiayaan');
            $table->text('p_simpanan');
            $table->bigInteger('anggota_b_simpanan');
            $table->bigInteger('anggota_b_pembiayaan');
            $table->bigInteger('aplikasiwa');
            $table->bigInteger('jumlah_slip');
            $table->bigInteger('jumlah_a_pencairan');
            $table->bigInteger('jumlah_visit');
            $table->text('file_slip_penarikan');
            $table->text('file_kas_keluar');
            $table->text('file_kas_opname');
            $table->text('file_portofolio');
            $table->text('file_foto_promo');
            $table->text('file_bp_st_agunan');
            $table->text('file_s_brankas');
            $table->text('file_simpok');
            $table->text('file_d_anggota');
            $table->text('file_mutasi');
            $table->text('file_buku_serah_terima');
            $table->text('file_update_medsos');
            $table->text('file_data_simjakasya');
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
        Schema::dropIfExists('report_tellers');
    }
};
