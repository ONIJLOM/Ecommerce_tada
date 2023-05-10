<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\peso;

class PesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peso::create([
            'gramos' => '400'
        ]);
        Peso::create([
            'gramos' => '1000'
        ]);
        Peso::create([
            'gramos' => '2000'
        ]);
        Peso::create([
            'gramos' => '3000'
        ]);
    }
}
