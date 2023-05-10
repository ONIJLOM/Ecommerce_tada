<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreNotaIngresoRequest;
use App\Http\Requests\UpdateNotaIngresoRequest;

use App\Models\notaIngreso;
use App\Models\peso;
use App\Models\producto;
use App\Models\User;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class NotaIngresoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-nota-de-ingreso|crear-nota-de-ingreso|editar-nota-de-ingreso|borrar-nota-de-ingreso', ['only' => ['index']]);
        $this->middleware('permission:crear-nota-de-ingreso', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-nota-de-ingreso', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-nota-de-ingreso', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['notas'] = NotaIngreso::paginate(10);
        $empleados = User::get();
        $productos = Producto::get();
        $pesos = Peso::get();
        return view('notaIngreso.index', $datos, compact('empleados', 'productos', 'pesos'));
    }

    public function reporte(){
        $notas = NotaIngreso::paginate();
        $empleados = User::get();
        $productos = Producto::get();
        $pesos = Peso::get();
        $pdf = PDF::loadView('notaIngreso.reporte', ['notas' => $notas, 'empleados' => $empleados, 'productos' => $productos, 'pesos' => $pesos]);
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
        $productos = Producto::get();
        $empleados = User::get();
        $pesos = Peso::get();
        return view('notaIngreso.create', compact('productos', 'pesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaIngresoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotaIngresoRequest $request)
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
        $action = "Agregó una nota de ingreso de productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $producto = producto::find($request->id_Prod);
        $producto->estado = 'Disponible';
        $producto->save();

        $datosNI = NotaIngreso::create($request->validated());
        $datosNI->update_stock($request->id_Prod, $request->cantidad);
        $datosNI->total = $request->cantidad * $request->costoProd;
        $datosNI->save();

        return redirect('notaIngreso')->with('mensaje','Nota De Ingreso Registrado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaIngreso  $notaIngreso
     * @return \Illuminate\Http\Response
     */
    public function show(NotaIngreso $notaIngreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaIngreso  $notaIngreso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::get();
        $pesos = Peso::get();
        $notaIngreso = NotaIngreso::findOrFail($id);
        return view('notaIngreso.edit', compact('productos', 'notaIngreso', 'pesos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaIngresoRequest  $request
     * @param  \App\Models\NotaIngreso  $notaIngreso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaIngresoRequest $request, $id)
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
        $action = "Actualizó una nota de ingreso de productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosNI = request()->except(['_token','_method']);
        $notaIngresoA = NotaIngreso::find($id);
        if($request->cantidad != $notaIngresoA->cantidad){
            if($request->cantidad > $notaIngresoA->cantidad){
                $notaIngresoA->update_stock($request->id_Prod, ($request->cantidad - $notaIngresoA->cantidad));
            }else{
                $notaIngresoA->update_stock($request->id_Prod, ($request->cantidad - $notaIngresoA->cantidad));
            }
        }
        NotaIngreso::where('id','=', $id)->update($datosNI);
        $notaIngresoD = NotaIngreso::find($id);
        $notaIngresoD->total = $request->cantidad * $request->costoProd;
        $notaIngresoD->save();

        $producto = producto::find($notaIngresoD->id_Prod);
        if($notaIngresoD->stock <> '0'){
            $producto->estado = 'Disponible';
            $producto->save();
        }
        return redirect('notaIngreso')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaIngreso  $notaIngreso
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
        $action = "Eliminó una nota de ingreso de productos";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        NotaIngreso::destroy($id);
        return redirect('notaIngreso')->with('mensaje', 'Nota De Ingreso Borrado');
    }
}
