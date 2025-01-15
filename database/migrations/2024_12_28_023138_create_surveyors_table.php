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
        Schema::create('surveyors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained()->onDelete('cascade');
            $table->foreignId('permohonan_id')->constrained()->onDelete('cascade');
            $table->string('status_berkas');
            $table->bigInteger('kemampuan_bayar');
            $table->bigInteger('nominal_approval');
            $table->string('recommendation');
            $table->text('note');
            $table->string('dokumentasi');
            $table->string('file_history')->nullable();
            $table->string('file_dokumentasi')->nullable();
            $table->string('file_surveyor');
            $table->string('make_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveyors');
    }
};
