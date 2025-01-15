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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
            $table->foreignId('approvement_id')->constrained()->cascadeOnDelete();
            $table->foreignId('permohonan_id')->constrained()->cascadeOnDelete();
            $table->string('nomor_agreement');
            $table->string('akad');
            // $table->string('petugas_akad');
            // $table->string('saksi_akad');
            $table->string('kantor_akad');

            //fill murabahah dan murabahah dp

            $table->string('jenis_barang')->nullable();
            $table->string('merk')->nullable();
            $table->string('nomor')->nullable();
            $table->string('tahun')->nullable();
            $table->string('rangka')->nullable();
            $table->string('mesin')->nullable();
            $table->string('warna')->nullable();

            $table->bigInteger('harga_beli')->nullable();
            $table->bigInteger('dp_mrbh')->nullable();
            $table->bigInteger('angsuran')->nullable();
            $table->bigInteger('up_mrbh')->nullable();
            $table->bigInteger('harga_jual')->nullable();
            $table->bigInteger('total_mrbh')->nullable();
            $table->bigInteger('pokok_mrbh')->nullable();
            $table->bigInteger('ujroh_mrbh')->nullable();
            $table->bigInteger('total_angsuran_mrbh')->nullable();

            //fill akad lain
            $table->bigInteger('nominal_qard')->nullable();
            $table->bigInteger('p_angsuran')->nullable();
            $table->bigInteger('jangka_waktu')->nullable();
            $table->bigInteger('ujroh')->nullable();
            $table->bigInteger('qard_pokok')->nullable();
            $table->bigInteger('qard_ujroh')->nullable();
            $table->bigInteger('angsuran_qard')->nullable();
            $table->bigInteger('total_pokok')->nullable();
            $table->bigInteger('total_ujroh')->nullable();
            $table->bigInteger('total_angsuran')->nullable();

            //fill biaya akad
            $table->bigInteger('sim_wajib');
            $table->bigInteger('atk');
            $table->bigInteger('materai');
            $table->bigInteger('wakaf');
            $table->bigInteger('tabarru');
            $table->bigInteger('total_biaya_akad');
            $table->string('tempo_awal');
            $table->string('tempo_akhir');

            //aggrement
            $table->string('file_agreement')->nullable();
            $table->string('file_foto_akad')->nullable();
            $table->boolean('check_bm')->default(false);
            $table->boolean('check_rm')->default(false);
            $table->boolean('check_staff')->default(false);
            $table->boolean('check_manager')->default(false);
            $table->boolean('check_asdir')->default(false);
            $table->boolean('check_dir')->default(false);
            
            //make by
            $table->string('make_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};
