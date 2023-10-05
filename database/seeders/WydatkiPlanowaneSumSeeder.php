<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WydatkiPlanowaneSumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wydatki_planowane_sum')->insert([
            'kwota' => '500.00',
            'pozostalo' => '123.00'
        ]);
    }
}
