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
        Schema::create('key_indicator_branch_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            //KPI PERTAMA
            $table->integer('indicator_one')->default(15);
            $table->integer('kpi_one');
            $table->string('target_funding')->nullable();
            $table->string('tercapai_funding')->nullable();
            $table->string('kurang_funding')->storedAs('target_funding - tercapai_funding')->nullable();
            $table->double('nilai_one')->storedAs('kpi_one');
            $table->double('total_one')->storedAs('(nilai_one * indicator_one / 100) * nilai_one');
            //kpi two
            $table->integer('indicator_two')->default(15);
            $table->integer('kpi_two');
            $table->string('target_landing')->nullable();
            $table->string('tercapai_landing')->nullable();
            $table->string('kurang_landing')->storedAs('target_landing - tercapai_landing')->nullable();
            $table->double('nilai_two')->storedAs('kpi_two');
            $table->double('total_two')->storedAs('(nilai_two * indicator_two / 100) * nilai_two');
            //kpi tiga
            $table->integer('indicator_three')->default(10);
            $table->integer('kpi_three');
            $table->string('target_npf')->nullable();
            $table->string('tercapai_npf')->nullable();
            $table->string('kurang_npf')->storedAs('target_npf - tercapai_npf')->nullable();
            $table->double('nilai_three')->storedAs('kpi_three');
            $table->double('total_three')->storedAs('(nilai_three * indicator_three / 100) * nilai_three');
            //kpi 4
            $table->integer('indicator_four')->default(10);
            $table->integer('kpi_four');
            $table->string('target_omset')->nullable();
            $table->string('tercapai_omset')->nullable();
            $table->string('kurang_omset')->storedAs('target_omset - tercapai_omset')->nullable();
            $table->double('nilai_four')->storedAs('kpi_four');
            $table->double('total_four')->storedAs('(nilai_four * indicator_four / 100) * nilai_four');
            //kpi 5
            $table->integer('indicator_five')->default(10);
            $table->integer('kpi_five');
            $table->string('target_wakaf')->nullable();
            $table->string('tercapai_wakaf')->nullable();
            $table->string('kurang_wakaf')->storedAs('target_wakaf - tercapai_wakaf')->nullable();
            $table->double('nilai_five')->storedAs('kpi_five');
            $table->double('total_five')->storedAs('(nilai_five * indicator_five / 100) * nilai_five');
            //kpi 6
            $table->integer('indicator_six')->default(10);
            $table->double('kpi_six');
            $table->string('target_jasa')->nullable();
            $table->string('tercapai_jasa')->nullable();
            $table->string('kurang_jasa')->storedAs('target_jasa - tercapai_jasa')->nullable();
            $table->double('nilai_six')->storedAs('kpi_six');
            $table->double('total_six')->storedAs('(nilai_six * indicator_six / 100) * nilai_six');
            //kpi 7
            $table->integer('indicator_seven')->default(10);
            $table->double('kpi_seven');
            $table->text('notes_seven');
            $table->double('nilai_seven')->storedAs('kpi_seven');
            $table->double('total_seven')->storedAs('(nilai_seven * indicator_seven / 100) * nilai_seven');
            //kpi 8
            $table->integer('indicator_eight')->default(10);
            $table->double('kpi_eight');
            $table->text('notes_eight');
            $table->double('nilai_eight')->storedAs('kpi_eight');
            $table->double('total_eight')->storedAs('(nilai_eight * indicator_eight / 100) * nilai_eight');
            //kpi 8
            $table->integer('indicator_nine')->default(10);
            $table->double('kpi_nine');
            $table->text('notes_nine');
            $table->double('nilai_nine')->storedAs('kpi_nine');
            $table->double('total_nine')->storedAs('(nilai_nine * indicator_nine / 100) * nilai_nine');
            //end
            $table->double('total')->storedAs('total_one + total_two + total_three + total_four + total_five + total_six + total_seven + total_eight + total_nine');
            $table->double('rata-rata')->storedAs('total/9');
            $table->longText('description')->nullable();
            $table->string('nilai_akhir')->storedAs('CASE WHEN `rata-rata` BETWEEN 1.8 AND 2.8 THEN "Branch Manager A" WHEN `rata-rata` BETWEEN 1 AND 1.79 THEN "Branch Manager B" WHEN `rata-rata` BETWEEN 0.4 AND 0.9 THEN "Branch Manager C" WHEN `rata-rata` BETWEEN 0.1 AND 0.39 THEN "Branch Manager D" ELSE "Branch Manager E" END')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_indicator_branch_managers');
    }
};
