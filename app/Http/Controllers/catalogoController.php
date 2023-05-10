<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\producto;
use App\Models\peso;
use App\Models\ShoppingCart;

date_default_timezone_set('America/La_Paz');

class catalogoController extends Controller
{
    public function index()
    {
        $datos['productos'] = producto::paginate(8);
        $pesos = peso::get();
        $carts = ShoppingCart::get();
        return view('pages.catalogo', $datos, compact('pesos', 'carts'));
    }
}
