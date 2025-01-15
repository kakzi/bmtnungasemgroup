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
        Schema::create('report_regionals', function (Blueprint $table) {
            $table->id();
            $table->text('checklist_personil');
            $table->boolean('pendampingan')->default(false);
            $table->boolean('briefing')->default(false);
            $table->text('file_pendampingan');
            $table->text('file_briefing');
            $table->text('file_swot');
            $table->text('catatan_khusus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_regionals');
    }
};
