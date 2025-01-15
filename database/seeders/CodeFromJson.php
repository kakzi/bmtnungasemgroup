<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CodeFromJson extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $office = public_path('json/codes.json');
        $json_office = file_get_contents($office);
        $data_office = json_decode($json_office, true);
        echo "Memulai proses seeder data office User...\n";
        DB::table('codes')->insert($data_office);
        echo "Done seeder data attendance...\n";
    }
}
