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
            'nombre' => 'Fideos Largos',
            'id_Tipo' => '1'
        ]);

        categoria::create([
            'nombre' => 'Fideos Cortos',
            'id_Tipo' => '1'
        ]);

        categoria::create([
            'nombre' => 'Fideos Nidos',
            'id_Tipo' => '1'
        ]);
    }
}
