<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use App\Http\Requests\StoreNotaVentaRequest;
use App\Http\Requests\UpdateNotaVentaRequest;
use App\Models\DetalleVenta;
use App\Models\Factura;
use App\Models\peso;
use App\Models\producto;
use App\Models\User;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class NotaVentaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-nota-venta|crear-nota-venta|editar-nota-venta|borrar-nota-venta', ['only' => ['index']]);
        $this->middleware('permission:crear-nota-venta', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-nota-venta', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-nota-venta', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['notaVentas'] = NotaVenta::paginate(10);
        return view('notaVenta.index', $datos);
    }

    public function reporte(){
        $notaVentas = NotaVenta::paginate();
        $pdf = PDF::loadView('notaVenta.reporte', ['notaVentas' => $notaVentas]);
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
        $facturas = Factura::get();
        return view('notaVenta.create', compact('facturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotaVentaRequest $request)
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
        $action = "Agregó una nueva nota venta";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datos = request()->except(['_token']);
        NotaVenta::create($datos);
        return redirect('notaVenta')->with('mensaje','Nota Venta Registrada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function show($id_nv)
    {
        $notaVenta = NotaVenta::find($id_nv);
        $datos['detalleVentas'] = DetalleVenta::where('id_notaV', $notaVenta->id)->paginate(10);
        $productos = producto::get();
        $pesos = peso::get();
        return view('detalleVenta.index', $datos, compact('productos', 'pesos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaVenta = NotaVenta::find($id);
        $facturas = Factura::get();
        return view('notaVenta.edit', compact('notaVenta', 'facturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaVentaRequest  $request
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaVentaRequest $request, $id)
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
        $action = "Actualizó una nota venta";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datos = request()->except(['_token','_method']);
        NotaVenta::where('id','=', $id)->update($datos);
        return redirect('notaVenta')->with('mensaje','Nota Venta Actualizada Con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaVenta  $notaVenta
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
        $action = "Eliminó una nota venta";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        NotaVenta::destroy($id);
        return redirect('notaVenta')->with('mensaje', 'Nota Venta Borrada');
    }
}
