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
        Schema::table('letters', function (Blueprint $table) {
            $table->string('type')->after('code');
            $table->string('code_letters')->after('code_id');
            $table->string('periode')->after('code_id');
            $table->string('sk')->after('periode')->nullable();
            $table->string('date_form')->after('from')->nullable();
            $table->string('date_to')->after('to')->nullable();
            $table->string('date_final')->after('date_form')->nullable();
            $table->string('type_sk')->after('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            //
        });
    }
};
