<?php

namespace Database\Seeders;

use App\Models\ShoppingCart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ClienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = User::create([
            'name' => 'Humberto',
            'ci' => '9866028',
            'sexo' => 'M',
            'telefono' => '60522218',
            'TipoC' => '1',
            'TipoE' => '0',
            'TipoA' => '0',
            'email' => 'h@gmail.com',
            'password' => '123456',
        ]);

        $cart = ShoppingCart::create();
        $cart->client_id = $cliente->id;
        $cart->save();

        $cliente = User::create([
            'name' => 'José Miguel',
            'ci' => '9866029',
            'sexo' => 'M',
            'telefono' => '60522219',
            'TipoC' => '1',
            'TipoE' => '0',
            'TipoA' => '0',
            'email' => 'j@gmail.com',
            'password' => '123456',
        ]);

        $cart = ShoppingCart::create();
        $cart->client_id = $cliente->id;
        $cart->save();

        $cliente = User::create([
            'name' => 'Luis Emilio',
            'ci' => '9864174',
            'sexo' => 'M',
            'telefono' => '60521400',
            'TipoC' => '1',
            'TipoE' => '0',
            'TipoA' => '0',
            'email' => 'l@gmail.com',
            'password' => '123456',
        ]);

        $cart = ShoppingCart::create();
        $cart->client_id = $cliente->id;
        $cart->save();

        $cliente = User::create([
            'name' => 'Martha',
            'ci' => '9864175',
            'sexo' => 'F',
            'telefono' => '60521401',
            'TipoC' => '1',
            'TipoE' => '0',
            'TipoA' => '0',
            'email' => 'm@gmail.com',
            'password' => '123456',
        ]);

        $cart = ShoppingCart::create();
        $cart->client_id = $cliente->id;
        $cart->save();
    }
}
