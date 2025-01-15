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
        Schema::create('register_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->string('name');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('age');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('alamat');
            $table->string('no_hp');
            $table->enum('status', ['whitelist', 'blacklist', 'waiting'])->default('waiting');
            $table->string('foto')->nullable();
            $table->string('lat_long')->nullable();
            $table->string('make_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_aggotas');
    }
};
