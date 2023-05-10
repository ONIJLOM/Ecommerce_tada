<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoria::create([
            'nombre' => 'Cervezas',
            'id_Tipo' => '1'
        ]);

        categoria::create([
            'nombre' => 'Gaseosas',
            'id_Tipo' => '2'
        ]);

        categoria::create([
            'nombre' => 'Energizante',
            'id_Tipo' => '2'
        ]);

        categoria::create([
            'nombre' => 'Agua',
            'id_Tipo' => '2'
        ]);

        categoria::create([
            'nombre' => 'Ron',
            'id_Tipo' => '1'
        ]);
    }
}
