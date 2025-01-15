<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserFromJson extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON file
        $role = public_path('json/user.json');
        $json = file_get_contents($role);
        $data = json_decode($json, true);

        // Output the start of the process
        echo "Memulai proses seeder data Role User...\n";

        // Customize the username field for each user
        foreach ($data as &$user) {
            $user['email'] = $user['username'] . '@bmtnungasem.com'; // Customizing the username
        }

        // Insert the data into the users table
        DB::table('users')->insert($data);

        // Output the end of the process
        echo "Done Seeder Data User...\n";
    }
}
