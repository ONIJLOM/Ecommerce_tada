<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipo;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'nombre' => 'Con Alcohol'
        ]);
        Tipo::create([
            'nombre' => 'Sin Alcohol'
        ]);
    }
}
