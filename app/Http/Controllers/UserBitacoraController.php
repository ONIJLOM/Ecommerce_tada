<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\userBitacora;
use PDF;

date_default_timezone_set('America/La_Paz');

class UserBitacoraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-bitacora', ['only' => ['index']]);
        /*$this->middleware('permission:crear-bitacora', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-bitacora', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-bitacora', ['only' => ['destroy']]);*/
    }

    public function index()
    {
        $datos['bitacoras'] = userBitacora::paginate(10);
        return view('bitacora.index', $datos);
    }

    public function reporte(){
        $bitacoras = UserBitacora::paginate();
        $pdf = PDF::loadView('bitacora.reporte', ['bitacoras' => $bitacoras]);
        $pdf->setOption(['dpi' => 30, 'defaultFont' => 'sans-serif']);
        //$pdf->set_paper(array(0,0,250,1000));
        return $pdf->stream();
    }
}
