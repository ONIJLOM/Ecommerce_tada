<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use App\Models\DetalleVenta;
use App\Models\NotaVenta;
use App\Models\User;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class FacturaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-factura|crear-factura|editar-factura|borrar-factura', ['only' => ['index']]);
        $this->middleware('permission:crear-factura', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-factura', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-factura', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['facturas'] = Factura::paginate(10);
        return view('factura.index', $datos);
    }

    public function reporte(){
        $facturas = Factura::paginate();
        $pdf = PDF::loadView('factura.reporte', ['facturas' => $facturas]);
        $pdf->setOption(['dpi' => 20, 'defaultFont' => 'sans-serif']);
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
        return view('factura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacturaRequest $request)
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
        $action = "Agregó una nueva factura";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

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
        $factura = Factura::create($datos);
        $notaVenta = NotaVenta::create();
        $notaVenta->fecha = $factura->fecha;
        $notaVenta->hora = $factura->hora;
        $notaVenta->montoTotal = $factura->montoTotal;
        $notaVenta->id_fact = $factura->id;
        $notaVenta->save();
        return redirect('factura')->with('mensaje','Factura Registrada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $factura = Factura::find($id);
        $notaVentas = NotaVenta::get();
        $detalleVentas = DetalleVenta::paginate();
        foreach($notaVentas as $notaVenta){
            if($notaVenta->id_fact == $factura->id){
                $idnv = $notaVenta->id;
            }
        }
        $notaVenta = NotaVenta::find($idnv);
        $pdf = PDF::loadView('factura.view', compact('factura', 'detalleVentas', 'notaVenta'));
        $pdf->setOption(['dpi' => 20, 'defaultFont' => 'sans-serif']);
        $pdf->set_paper(array(0,0,300,1000));
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::find($id);
        return view('factura.edit', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacturaRequest  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacturaRequest $request, $id)
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
        $action = "Actualizó una factura";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datos = request()->except(['_token','_method']);
        Factura::where('id','=', $id)->update($datos);
        //dd($factura);
        $factura = Factura::find($id);
        $factura->cambio = $request->pago - $request->montoTotal;
        $factura->save();
        return redirect('factura')->with('mensaje','Factura Actualizada Con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
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
        $action = "Eliminó una factura";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        Factura::destroy($id);
        return redirect('factura')->with('mensaje', 'Factura Borrada');
    }
}
