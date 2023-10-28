<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DownloadCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert the initial download count record.
        DB::table('download_counts')->insert([
            'count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

