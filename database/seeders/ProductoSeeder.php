<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        producto::create([
            'nombre' => 'Cortadito Liso',
            'descripcion' => '1 Paquete de fideos cortadito liso',
            'precioU' => '4',
            'image' => '1657473717.jpg',
            'stock' => '30',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Codito Chico Liso',
            'descripcion' => '1 Paquete de fideos codito chico liso',
            'precioU' => '4',
            'image' => '1657473695.jpg',
            'stock' => '25',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Espaghetti',
            'descripcion' => '1 Paquete de fideos espaguetti',
            'precioU' => '4',
            'image' => '1657473603.jpg',
            'stock' => '35',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '1',
            'id_Cat' => '1',
        ]);

        producto::create([
            'nombre' => 'Cortadito Liso',
            'descripcion' => '1 Paquete de fideos cortadito liso',
            'precioU' => '10',
            'image' => '1657473708.jpg',
            'stock' => '30',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '2',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Codito Chico Liso',
            'descripcion' => '1 Paquete de fideos codito chico liso',
            'precioU' => '10',
            'image' => '1657473754.jpg',
            'stock' => '20',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '2',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Espaghetti',
            'descripcion' => '1 Paquete de fideos espaguetti',
            'precioU' => '10',
            'image' => '1657473617.jpg',
            'stock' => '35',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '2',
            'id_Tipo' => '1',
            'id_Cat' => '1',
        ]);

        producto::create([
            'nombre' => 'Cortadito Liso',
            'descripcion' => '1 Paquete de fideos cortadito liso',
            'precioU' => '18',
            'image' => '1657473774.jpg',
            'stock' => '35',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Codito Chico Liso',
            'descripcion' => '1 Paquete de fideos codito chico liso',
            'precioU' => '18',
            'image' => '1657473782.jpg',
            'stock' => '20',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Espaghetti',
            'descripcion' => '1 Paquete de fideos espaguetti',
            'precioU' => '18',
            'image' => '1657473794.jpg',
            'stock' => '0',
            'cantMin' => '10',
            'estado' => 'No Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '1',
            'id_Cat' => '1',
        ]);
    }
}
