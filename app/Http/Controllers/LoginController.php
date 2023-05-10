<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\userBitacora;
use App\Models\User;

date_default_timezone_set('America/La_Paz');

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('Email and/or password is incorrect');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
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
        $action = "Inició de sesion";
        $datosBitacora = userBitacora::create();
        $datosBitacora->tipo = $tipo;
        $datosBitacora->user = $user->name;
        $datosBitacora->action = $action;
        $datosBitacora->fecha = date('Y-m-d');
        $datosBitacora->hora = date('H:i:s');
        $datosBitacora->save();
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function Authenticated(Request $request, $user)
    {
        $TipoC = auth()->user()->TipoC;
        $TipoE = auth()->user()->TipoE;
        $TipoA = auth()->user()->TipoA;
        if ($TipoC == 1) {
            return view('home.index');
        }
        if ($TipoE == 1) {
            return view('home.indexEmp');
        }
        if ($TipoA == 1) {
            return view('home.indexAdm');
        }
    }
}
