<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WydatkiStaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wydatki_stale')->insert([
            'miesiac' => '10',
            'name' => 'prad',
            'kwota' => '123.00',
            'completed' => '0',
        ]);
    }
}
