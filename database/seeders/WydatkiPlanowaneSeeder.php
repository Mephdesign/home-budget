<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WydatkiPlanowaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wydatki_planowane')->insert([
            'miesiac' => '10',
            'name' => 'mechanik',
            'kwota' => '500.00',
            'completed' => '0',
        ]);
    }
}
