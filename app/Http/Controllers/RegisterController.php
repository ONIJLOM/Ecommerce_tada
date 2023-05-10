<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\http\Requests\RegisterRequest;
use App\Models\ShoppingCart;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class RegisterController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        //dd($request);
        $user = User::create($request->validated());
        $cart = ShoppingCart::create();
        $cart->client_id = $user->id;
        $cart->save();

        if ($user->TipoA == 1) {
            $tipo = "Administrador";
        }
        if ($user->TipoE == 1) {
            $tipo = "Empleado";
        }
        if ($user->TipoC == 1) {
            $tipo = "Cliente";
        }
        $action = "Se registró un nuevo cliente";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();
        return redirect('/login')->with('success', 'Account created successfully');
    }
}
