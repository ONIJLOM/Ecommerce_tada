<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperAdmin',
            'ci' => '9866021',
            'sexo' => 'M',
            'telefono' => '60522212',
            'domicilio' => 'Santa Cruz',
            'estado' => 'Activo',
            'TipoC' => '0',
            'TipoE' => '0',
            'TipoA' => '1',
            'email' => 'a@gmail.com',
            'password' => '123456',
        ])->assignRole('Administrador');
    
            User::create([
                'name' => 'Brayan',
                'ci' => '9866022',
                'sexo' => 'M',
                'telefono' => '60522211',
                'domicilio' => 'Santa Cruz',
                'estado' => 'Activo',
                'TipoC' => '0',
                'TipoE' => '0',
                'TipoA' => '1',
                'email' => 'b@gmail.com',
                'password' => '123456',
            ])->assignRole('Administrador');
            
            User::create([
                'name' => 'Camilo',
                'ci' => '9866023',
                'sexo' => 'M',
                'telefono' => '60522213',
                'domicilio' => 'Santa Cruz',
                'estado' => 'Activo',
                'TipoC' => '0',
                'TipoE' => '0',
                'TipoA' => '1',
                'email' => 'c@gmail.com',
                'password' => '123456',
            ])->assignRole('Administrador');
    }
}
