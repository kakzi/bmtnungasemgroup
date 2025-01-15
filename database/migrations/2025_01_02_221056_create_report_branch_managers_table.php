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
        Schema::create('report_branch_managers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('office_id')->constrained()->onDelete('cascade');
            $table->bigInteger('kas');
            $table->bigInteger('penempatan_kantor');
            $table->bigInteger('simpanan');
            $table->bigInteger('deposito');
            $table->bigInteger('simpanan_khusus');
            $table->bigInteger('pembiayaan');
            $table->bigInteger('kafalah');
            $table->bigInteger('qardh');
            $table->bigInteger('aset');
            $table->bigInteger('omset');
            $table->bigInteger('shu');
            $table->boolean('update_bantuan')->default(false);
            $table->text('checklist_teller');
            $table->text('checklist_marketing');

            $table->boolean('briefing')->default(false);
            $table->boolean('attribute')->default(false);
            $table->boolean('penagihan')->default(false);
            
            $table->bigInteger('lancar');
            $table->bigInteger('dpk');
            $table->bigInteger('kuranglancar');
            $table->bigInteger('diragukan');
            $table->bigInteger('macet');

            $table->boolean('pendampingan')->default(false);
            $table->text('file_pendampingan')->nullable();
            $table->text('file_foto_penagihan')->nullable();
            $table->text('file_akad')->nullable();
            $table->text('file_ttd_akad')->nullable();
            $table->text('file_cek_fisik_brankas');
            $table->text('file_dokumentasi_briefing');
            $table->text('file_notulensi');
            $table->text('file_tabarru_nota')->nullable();
            $table->text('file_kebersihan');

            $table->boolean('update_media')->default(false);
            $table->text('file_update_medsos');
            $table->text('catatan_khusus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_branch_managers');
    }
};
