<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

date_default_timezone_set('America/La_Paz');

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()){
            $TipoA = auth()->user()->TipoA;
            $TipoE = auth()->user()->TipoE;
            if ($TipoA == 1) {
                return view('home.indexAdm');
            }
            if ($TipoE == 1) {
                return view('home.indexEmp');
            }
        }
        return view('home.index');
    }
}
