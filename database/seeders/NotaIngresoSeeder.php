<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\notaIngreso;

class NotaIngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '30',
            'costoProd' => '2.5',
            'total' => '75',
            'id_Emp' => '4',
            'id_Prod' => '1',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '25',
            'costoProd' => '3',
            'total' => '75',
            'id_Emp' => '4',
            'id_Prod' => '2',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '35',
            'costoProd' => '2.5',
            'total' => '87.5',
            'id_Emp' => '4',
            'id_Prod' => '3',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '30',
            'costoProd' => '6',
            'total' => '180',
            'id_Emp' => '4',
            'id_Prod' => '4',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '20',
            'costoProd' => '5.5',
            'total' => '110',
            'id_Emp' => '4',
            'id_Prod' => '5',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '35',
            'costoProd' => '6',
            'total' => '210',
            'id_Emp' => '4',
            'id_Prod' => '6',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '35',
            'costoProd' => '10',
            'total' => '350',
            'id_Emp' => '4',
            'id_Prod' => '7',
        ]);

        NotaIngreso::create([
            'nro' => '1',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => '20',
            'costoProd' => '10.5',
            'total' => '210',
            'id_Emp' => '4',
            'id_Prod' => '8',
        ]);
    }
}
