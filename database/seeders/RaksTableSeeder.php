<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RaksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('raks')->insert([
            'kode' => 110,
            'nama' => 'Biru',
            'lokasi' => 'Utara',
        ]);

        DB::table('raks')->insert([
            'kode' => 220,
            'nama' => 'Merah',
            'lokasi' => 'Selatan',
        ]);
    }
}