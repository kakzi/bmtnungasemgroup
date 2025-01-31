<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportManager extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 34; $i++) {
            DB::table('report_branch_managers')->insert([
                'user_id' => 1, // Assign a valid user_id
                'office_id' => $i,
                'kas' => rand(5000000, 10000000),
                'penempatan_kantor' => rand(1000000, 5000000),
                'simpanan' => rand(7000000, 12000000),
                'deposito' => rand(5000000, 9000000),
                'simpanan_khusus' => rand(3000000, 7000000),
                'pembiayaan' => rand(8000000, 14000000),
                'kafalah' => rand(2000000, 5000000),
                'qardh' => rand(1500000, 4000000),
                'aset' => rand(15000000, 20000000),
                'omset' => rand(12000000, 18000000),
                'shu' => rand(3000000, 6000000),
                'update_bantuan' => rand(0, 1),
                'checklist_teller' => 'Checklist '.$i,
                'checklist_marketing' => 'Checklist Marketing '.$i,
                'briefing' => rand(0, 1),
                'attribute' => rand(0, 1),
                'penagihan' => rand(0, 1),
                'lancar' => rand(5000000, 10000000),
                'dpk' => rand(4000000, 9000000),
                'kuranglancar' => rand(2000000, 5000000),
                'diragukan' => rand(1000000, 3000000),
                'macet' => rand(500000, 2000000),
                'update_media' => rand(0, 1),
                'file_update_medsos' => 'File Medsos '.$i,
                'file_cek_fisik_brankas' => 'File Medsos '.$i,
                'file_dokumentasi_briefing' => 'File Medsos '.$i,
                'file_notulensi' => 'File Medsos '.$i,
                'file_kebersihan' => 'File Medsos '.$i,
                'catatan_khusus' => 'Catatan '.$i,
                'make_by' => 'Catatan '.$i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
