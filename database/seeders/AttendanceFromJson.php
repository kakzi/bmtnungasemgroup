<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceFromJson extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $office = public_path('json/attendances.json');
        $json_office = file_get_contents($office);
        $data_office = json_decode($json_office, true);
        echo "Memulai proses seeder data office User...\n";
        DB::table('attendances')->insert($data_office);
        echo "Done seeder data attendance...\n";
    }
}
