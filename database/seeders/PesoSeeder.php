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
            'ml' => '300'
        ]);
        Peso::create([
            'ml' => '500'
        ]);
        Peso::create([
            'ml' => '1000'
        ]);
        Peso::create([
            'ml' => '2000'
        ]);
        Peso::create([
            'ml' => '3000'
        ]);
    }
}
