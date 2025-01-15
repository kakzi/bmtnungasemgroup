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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('office_id');
            $table->unsignedInteger('code_id');
            $table->string('code');
            $table->string('to');
            $table->string('from');
            $table->string('number');
            $table->string('perihal');
            $table->string('image')->nullable();
            $table->text('lampiran');
            $table->text('desc');
            $table->enum('status_code', array('review','accepted'));
            $table->enum('status', array('Menunggu Assignment','Accepted Assignment'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
