<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\tipo;
use App\Http\Requests\StorecategoriaRequest;
use App\Http\Requests\UpdatecategoriaRequest;
use App\Models\User;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class CategoriaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-categoria|crear-categoria|editar-categoria|borrar-categoria', ['only' => ['index']]);
        $this->middleware('permission:crear-categoria', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-categoria', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-categoria', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['categorias'] = categoria::paginate(10);
        $tipos = tipo::get();
        return view('categoria.index', $datos, compact('tipos'));
    }

    public function reporte(){
        $categorias = Categoria::paginate();
        $tipos = Tipo::get();
        $pdf = PDF::loadView('categoria.reporte', ['categorias' => $categorias, 'tipos' => $tipos]);
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
        $tipos = tipo::get();
        return view('categoria.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoriaRequest $request)
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
        $action = "Creó una nueva categoria de los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        categoria::create($request->validated());
        return redirect('categoria')->with('mensaje','Categoria Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoriaRequest  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoriaRequest $request, $id)
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
        $action = "Actualizó datos de una categoría de los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosCateg = request()->except(['_token', '_method']);
        categoria::where('id','=', $id)->update($datosCateg);
        return redirect('categoria')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria  $categoria
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
        $action = "Eliminó una categoria de los productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        categoria::destroy($id);
        return redirect('categoria')->with('mensaje', 'Categoria Borrada');
    }
}
