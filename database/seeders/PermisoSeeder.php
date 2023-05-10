<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //table rol
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //table peso
            'ver-peso',
            'crear-peso',
            'editar-peso',
            'borrar-peso',
            //table tipo
            'ver-tipo',
            'crear-tipo',
            'editar-tipo',
            'borrar-tipo',
            //table categoria
            'ver-categoria',
            'crear-categoria',
            'editar-categoria',
            'borrar-categoria',
            //table producto
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',
            //table nota-de-ingreso
            'ver-nota-de-ingreso',
            'crear-nota-de-ingreso',
            'editar-nota-de-ingreso',
            'borrar-nota-de-ingreso',
            //table administrador
            'ver-administrador',
            'crear-administrador',
            'editar-administrador',
            'borrar-administrador',
            //table empleado
            'ver-empleado',
            'crear-empleado',
            'editar-empleado',
            'borrar-empleado',
            //table cliente
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',
            //table carrito cliente ---------------------------------------------
            'ver-carrito-cliente',
            'editar-carrito-cliente',
            'procesar-carrito-cliente',
            //table detalle carrito
            'ver-detalle-carrito',
            'crear-detalle-carrito',
            'editar-detalle-carrito',
            'borrar-detalle-carrito',
            //table factura
            'ver-factura',
            'crear-factura',
            'editar-factura',
            'borrar-factura',
            //table nota venta
            'ver-nota-venta',
            'crear-nota-venta',
            'editar-nota-venta',
            'borrar-nota-venta',
            //table detalle venta
            'ver-detalle-venta',
            'crear-detalle-venta',
            'editar-detalle-venta',
            'borrar-detalle-venta',
            //table bitácora
            'ver-bitacora',
            //'crear-bitacora',
            //'editar-bitacora',
            //'borrar-bitacora',
        ];

        foreach ($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
    }
}
