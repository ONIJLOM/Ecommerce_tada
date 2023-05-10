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
            'nombre' => 'Coca Cola 3L',
            'descripcion' => 'Coca de 3L DESCARTABLE',
            'precioU' => '14',
            'image' => 'cocacola3l.png',
            'stock' => '30',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '5',
            'id_Tipo' => '1',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Pepsi 2L',
            'descripcion' => 'Pepsi de 2l DESCARTABLE',
            'precioU' => '7.50',
            'image' => 'pepsi2l.png',
            'stock' => '25',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '4',
            'id_Tipo' => '2',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Sprite 3L',
            'descripcion' => 'Sprite 3L DESCARTABLE',
            'precioU' => '14',
            'image' => 'sprite3l.png',
            'stock' => '35',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '5',
            'id_Tipo' => '2',
            'id_Cat' => '2',
        ]);

        producto::create([
            'nombre' => 'Cerveza Latita Paceña 300ml',
            'descripcion' => 'Cerveza Latita Paceña 300ml bien fria',
            'precioU' => '6',
            'image' => 'paceña300ml.png',
            'stock' => '30',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '1',
            'id_Cat' => '1',
        ]);

        producto::create([
            'nombre' => 'Cerveza Huari 300ml',
            'descripcion' => 'Cerveza Huari 300ml bien fria',
            'precioU' => '7',
            'image' => 'huari300ml.png',
            'stock' => '20',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '1',
            'id_Cat' => '1',
        ]);

        producto::create([
            'nombre' => 'Cerveza Corona 300ml',
            'descripcion' => 'Cerveza Corona 300ml bien fria',
            'precioU' => '10',
            'image' => 'corona300ml.png',
            'stock' => '35',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '1',
            'id_Cat' => '1',
        ]);

        producto::create([
            'nombre' => 'Energizante Monster 500ml',
            'descripcion' => '1 lata de Energizante Monster 500ml',
            'precioU' => '15',
            'image' => 'monster500ml.png',
            'stock' => '35',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '1',
            'id_Cat' => '3',
        ]);

        producto::create([
            'nombre' => 'Energizante Red Bull 300 Ml',
            'descripcion' => '1 lata Energizante Red Bull 250 Ml',
            'precioU' => '15',
            'image' => 'redbull300ml.png',
            'stock' => '20',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '1',
            'id_Tipo' => '2',
            'id_Cat' => '3',
        ]);

        producto::create([
            'nombre' => 'Energizante Ciclon 500 ml',
            'descripcion' => '1 Energizante Ciclon 500 Ml',
            'precioU' => '9',
            'image' => 'ciclon500ml.png',
            'stock' => '20',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '2',
            'id_Tipo' => '2',
            'id_Cat' => '3',
        ]);


        producto::create([
            'nombre' => 'Agua Con Gas Vital 500 ml',
            'descripcion' => '1 botella de Agua Con Gas Vital 600 Ml',
            'precioU' => '5',
            'image' => 'agua500ml.png',
            'stock' => '30',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '2',
            'id_Tipo' => '2',
            'id_Cat' => '4',
        ]);

        producto::create([
            'nombre' => 'Agua Con Gas Mendozina 1 L',
            'descripcion' => '1 botella de Agua Con Gas Mendozina 1 L',
            'precioU' => '6',
            'image' => 'agua1l.png',
            'stock' => '15',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '2',
            'id_Cat' => '4',
        ]);

        producto::create([
            'nombre' => 'Ron Flor De Caña 5 Años 2 Lt',
            'descripcion' => '1 botella Ron Flor De Caña 5 Años 2 Lt',
            'precioU' => '120',
            'image' => 'ron2ml.png',
            'stock' => '50',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '4',
            'id_Tipo' => '1',
            'id_Cat' => '5',
        ]);

        producto::create([
            'nombre' => 'Ron Diplomatico Mantuano 8 Años 1 Lt',
            'descripcion' => '1 botella Ron Diplomatico Mantuano 8 Años 1 Lt',
            'precioU' => '140',
            'image' => 'rond1l.png',
            'stock' => '15',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '1',
            'id_Cat' => '5',
        ]);

        producto::create([
            'nombre' => 'Ron Havana Club 7 Años 1 Lt',
            'descripcion' => '1 botella Ron Havana Club 7 Años 1 Lt',
            'precioU' => '130',
            'image' => 'ronh1l.png',
            'stock' => '15',
            'cantMin' => '10',
            'estado' => 'Disponible',
            'id_Peso' => '3',
            'id_Tipo' => '1',
            'id_Cat' => '5',
        ]);
    }
}
