<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Deimos',
            'ci' => '9866024',
            'sexo' => 'M',
            'telefono' => '60522214',
            'domicilio' => 'Santa Cruz',
            'estado' => 'Activo',
            'TipoC' => '0',
            'TipoE' => '1',
            'TipoA' => '0',
            'email' => 'd@gmail.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Elena',
            'ci' => '9866025',
            'sexo' => 'F',
            'telefono' => '60522215',
            'domicilio' => 'Santa Cruz',
            'estado' => 'Activo',
            'TipoC' => '0',
            'TipoE' => '1',
            'TipoA' => '0',
            'email' => 'e@gmail.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Felipe',
            'ci' => '9866026',
            'sexo' => 'M',
            'telefono' => '60522216',
            'domicilio' => 'Santa Cruz',
            'estado' => 'Activo',
            'TipoC' => '0',
            'TipoE' => '1',
            'TipoA' => '0',
            'email' => 'f@gmail.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Gustavo',
            'ci' => '9866027',
            'sexo' => 'M',
            'telefono' => '60522217',
            'domicilio' => 'Santa Cruz',
            'estado' => 'Activo',
            'TipoC' => '0',
            'TipoE' => '1',
            'TipoA' => '0',
            'email' => 'g@gmail.com',
            'password' => '123456',
        ]);
    }
}
