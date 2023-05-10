<?php

namespace App\Http\Controllers;

use App\Models\tipo;
use App\Http\Requests\StoretipoRequest;
use App\Http\Requests\UpdatetipoRequest;
use App\Models\User;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class TipoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-tipo|crear-tipo|editar-tipo|borrar-tipo', ['only' => ['index']]);
        $this->middleware('permission:crear-tipo', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-tipo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-tipo', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tipos'] = tipo::paginate(10);
        return view('tipo.index', $datos);
    }

    public function reporte(){
        $tipos = Tipo::paginate();
        $pdf = PDF::loadView('tipo.reporte', ['tipos' => $tipos]);
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
        return view('tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretipoRequest $request)
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
        $action = "Agregó un nuevo tipo a los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datostipo = tipo::create($request->validated());
        $datostipo = request()->except(['_token']);
        return redirect('tipo')->with('mensaje','Tipo De Producto Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = tipo::findOrFail($id);
        return view('tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetipoRequest  $request
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetipoRequest $request, $id)
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
        $action = "Actualizó datos del tipo de productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosTipo = request()->except(['_token', '_method']);
        tipo::where('id','=', $id)->update($datosTipo);
        return redirect('tipo')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipo  $tipo
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
        $action = "Eliminó el tipo de los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        tipo::destroy($id);
        return redirect('tipo')->with('mensaje', 'Tipo De Producto Borrado');
    }
}
