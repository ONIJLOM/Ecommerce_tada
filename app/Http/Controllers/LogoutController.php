<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\userBitacora;
use App\Models\tipo;
use App\Models\User;

date_default_timezone_set('America/La_Paz');

class LogoutController extends Controller
{
    public function logout()
    {
        $id = Auth::id();
        Session::flush();
        $user = User::find($id);
        $tipo = "default";
        if ($user->TipoA == 1) {
            $tipo = "Administrador";
        }
        if ($user->TipoE == 1) {
            $tipo = "Empleado";
        }
        if ($user->TipoC == 1) {
            $tipo = "Cliente";
        }
        $action = "Cerró sesion";
        $datosBitacora = userBitacora::create();
        $datosBitacora->tipo = $tipo;
        $datosBitacora->user = $user->name;
        $datosBitacora->action = $action;
        $datosBitacora->fecha = date('Y-m-d');
        $datosBitacora->hora = date('H:i:s');
        $datosBitacora->save();
        Auth::logout();
        return view('home.index');
    }
}
