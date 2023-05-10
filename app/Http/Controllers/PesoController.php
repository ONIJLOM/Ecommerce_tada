<?php

namespace App\Http\Controllers;

use App\Models\peso;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorepesoRequest;
use App\Http\Requests\UpdatepesoRequest;
use App\Models\User;
use App\Models\userBitacora;
use PDF;

date_default_timezone_set('America/La_Paz');

class PesoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-peso|crear-peso|editar-peso|borrar-peso', ['only' => ['index']]);
        $this->middleware('permission:crear-peso', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-peso', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-peso', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pesos'] = peso::paginate(10);
        return view('peso.index', $datos);
    }

    public function reporte(){
        $pesos = Peso::paginate();
        $pdf = PDF::loadView('peso.reporte', ['pesos' => $pesos]);
        $pdf->setOption(['dpi' => 30, 'defaultFont' => 'sans-serif']);
        //$pdf->set_paper(array(0,0,250,1000));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepesoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepesoRequest $request)
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
        $action = "Agregó un nuevo peso a los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosPeso = peso::create($request->validated());
        $datosPeso = request()->except(['_token']);
        return redirect('peso')->with('mensaje','Peso Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function show(peso $peso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peso = peso::findOrFail($id);
        return view('peso.edit', compact('peso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepesoRequest  $request
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepesoRequest $request, $id)
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
        $action = "Actualizó el peso de los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosPeso = request()->except(['_token','_method']);
        peso::where('id','=', $id)->update($datosPeso);
        return redirect('peso')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
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
        $action = "Eliminó el peso de los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        peso::destroy($id);
        return redirect('peso')->with('mensaje', 'Peso Borrado');
    }
}
