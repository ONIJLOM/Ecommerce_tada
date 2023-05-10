<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador'])->syncPermissions(Permission::pluck('id','id')->all());
        /* 2da Forma
        $rol = Role::create(['name' => 'Administrador']);
        $permisos = Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);*/
    }
}
