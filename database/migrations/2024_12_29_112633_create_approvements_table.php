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
        Schema::create('approvements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained()->onDelete('cascade');
            $table->foreignId('permohonan_id')->constrained()->onDelete('cascade');
            $table->foreignId('surveyor_id')->constrained()->onDelete('cascade');
            $table->enum('kep_asesor', ['waiting','approved', 'approval_pending', 'rejected'])->default('waiting');
            $table->enum('agreement', ['printed', 'not yet printed'])->default('not yet printed');
            $table->bigInteger('nominal_asesor')->nullable();
            $table->bigInteger('nominal_pencairan')->nullable();
            $table->text('catatan_asesor')->nullable();
            $table->string('make_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvements');
    }
};
