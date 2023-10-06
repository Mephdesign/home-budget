<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WydatkiDzienneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wydatki_dzienne')->insert([
            0 =>[
                'miesiac' => '10',
                'name' => 'zakupy klaudia',
                'kwota' => '12.00'],
            1 =>[
                'miesiac' => '10',
                'name' => 'kebeb',
                'kwota' => '20.00'],
            2 =>[
                'miesiac' => '10',
                'name' => 'castorama',
                'kwota' => '100.00']
        ]);
    }
}
