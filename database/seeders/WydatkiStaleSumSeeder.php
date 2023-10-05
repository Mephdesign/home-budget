<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WydatkiStaleSumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wydatki_stale_sum')->insert([
            'kwota' => '123.00',
            'pozostalo' => '123.00'
        ]);
    }
}
