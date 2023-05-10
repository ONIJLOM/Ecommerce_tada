<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class ClienteController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-cliente|crear-cliente|editar-cliente|borrar-cliente', ['only' => ['index']]);
        $this->middleware('permission:crear-cliente', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cliente', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cliente', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datos['clientes'] = User::where('TipoC', '=', 1)->paginate(10);
        return view('cliente.index', $datos);
    }

    public function reporte(){
        $clientes = User::where('TipoC', '=', 1)->paginate();
        $pdf = PDF::loadView('cliente.reporte', ['clientes' => $clientes]);
        $pdf->setOption(['dpi' => 30, 'defaultFont' => 'sans-serif']);
        //$pdf->set_paper(array(0,0,250,1000));
        return $pdf->stream();
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(RegisterRequest $request)
    {
        $idB = Auth::id();
        $user = User::find($idB);
        if ($user->TipoA == 1) {
            $tipo = "Administrador";
        }
        if ($user->TipoE == 1) {
            $tipo = "Empleado";
        }
        if ($user->TipoC == 1) {
            $tipo = "Cliente";
        }
        $action = "Agregó a un nuevo usuario cliente";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        User::create($request->validated());
        return redirect('cliente')->with('mensaje', 'Empleado Agregado Con Éxito');
    }

    public function destroy($id)
    {
        $idB = Auth::id();
        $user = User::find($idB);
        if ($user->TipoA == 1) {
            $tipo = "Administrador";
        }
        if ($user->TipoE == 1) {
            $tipo = "Empleado";
        }
        if ($user->TipoC == 1) {
            $tipo = "Cliente";
        }
        $action = "Eliminó a un usuario cliente";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        User::destroy($id);
        return redirect('cliente')->with('mensaje', 'Empleado Borrado');
    }

    public function edit($id)
    {
        $cliente = User::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $idB = Auth::id();
        $user = User::find($idB);
        if ($user->TipoA == 1) {
            $tipo = "Administrador";
        }
        if ($user->TipoE == 1) {
            $tipo = "Empleado";
        }
        if ($user->TipoC == 1) {
            $tipo = "Cliente";
        }
        $action = "Actualizó datos a un usuario cliente";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosClien = request()->except(['_token', 'password', 'password_confirmation', 'TipoA', 'TipoE', 'TipoC', '_method']);
        User::where('id', '=', $id)->update($datosClien);
        return redirect('cliente')->with('mensaje', 'Datos Actualizados');
    }

    public function show()
    {
        //
    }
}
