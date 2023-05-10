<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Http\Requests\StoreDetalleVentaRequest;
use App\Http\Requests\UpdateDetalleVentaRequest;
use App\Models\Factura;
use App\Models\NotaVenta;
use App\Models\peso;
use App\Models\producto;
use App\Models\User;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class DetalleVentaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-detalle-venta|crear-detalle-venta|editar-detalle-venta|borrar-detalle-venta', ['only' => ['index']]);
        $this->middleware('permission:crear-detalle-venta', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-detalle-venta', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-detalle-venta', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['detalleVentas'] = DetalleVenta::paginate(10);
        $productos = producto::get();
        return view('detalleVenta.index', $datos, compact('productos'));
    }

    public function reporte()
    {
        $detalleVentas = DetalleVenta::paginate();
        $productos = producto::get();
        $pdf = PDF::loadView('detalleVenta.reporte', ['detalleVentas' => $detalleVentas, 'productos' => $productos]);
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
        $productos = producto::get();
        $pesos = peso::get();
        $notaVentas = NotaVenta::get();
        return view('detalleVenta.create', compact('productos', 'pesos', 'notaVentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetalleVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetalleVentaRequest $request)
    {
        date_default_timezone_set('America/La_Paz');
        $producto = producto::find($request->id_prod);
        if ($producto->stock < $request->cantidad) {
            return back()->with('mensaje', 'Stock Insuficiente Del Producto');
        } else {
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
            $action = "Agregó un detalle de venta";
            $Bitacora = userBitacora::create();
            $Bitacora->tipo = $tipo;
            $Bitacora->user = $user->name;
            $Bitacora->action = $action;
            $Bitacora->fecha = date('Y-m-d');
            $Bitacora->hora = date('H:i:s');
            $Bitacora->save();

            $montoFinal = 0;
            $notaVenta = NotaVenta::find($request->id_notaV);
            $factura = Factura::find($notaVenta->id_fact);
            $datos = DetalleVenta::create();
            $pesos = Peso::get();
            foreach ($pesos as $peso) {
                if ($peso->id == $producto->id_Peso) {
                    $datos->nombreProd = $producto->nombre . " - " . $peso->gramos . " Gramos";
                }
            }
            $datos->cantidad = $request->cantidad;
            $datos->precio = $producto->precioU;
            $datos->montoTotal = $producto->precioU * $request->cantidad;
            $datos->id_prod = $request->id_prod;
            $datos->id_notaV = $request->id_notaV;
            $datos->save();
            $detalles = DetalleVenta::get();
            foreach ($detalles as $detalle) {
                if ($detalle->id_notaV == $request->id_notaV) {
                    $montoFinal += $detalle->montoTotal;
                }
            }
            $notaVenta->montoTotal = $montoFinal;
            $notaVenta->fecha = date('Y-m-d');
            $notaVenta->hora = date('H:i:s');
            $factura->montoTotal = $montoFinal;
            $factura->fecha = date('Y-m-d');
            $factura->hora = date('H:i:s');
            $notaVenta->save();
            $factura->save();
            $producto->subtract_stock($request->cantidad);
            return redirect('detalleVenta')->with('mensaje', 'Producto Agregado Con Éxito Al Detalle Venta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function show($id_nv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleVenta = DetalleVenta::find($id);
        $productos = producto::get();
        $pesos = peso::get();
        $notaVentas = NotaVenta::get();
        return view('detalleVenta.edit', compact('detalleVenta', 'productos', 'pesos', 'notaVentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetalleVentaRequest  $request
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalleVentaRequest $request, $id)
    {
        //dd($producto);
        date_default_timezone_set('America/La_Paz');
        $detalleVenta = DetalleVenta::find($id);
        $productoAnt = producto::find($detalleVenta->id_prod);
        $productoDes = producto::find($request->id_prod);
        $notaVenta = NotaVenta::find($detalleVenta->id_notaV);
        $factura = Factura::find($notaVenta->id_fact);
        if ($detalleVenta->id_prod != $request->id_prod and $productoDes->stock >= $request->cantidad) {
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
            $action = "Actualizó un detalle de venta";
            $Bitacora = userBitacora::create();
            $Bitacora->tipo = $tipo;
            $Bitacora->user = $user->name;
            $Bitacora->action = $action;
            $Bitacora->fecha = date('Y-m-d');
            $Bitacora->hora = date('H:i:s');
            $Bitacora->save();

            $productoAnt->add_stock($detalleVenta->cantidad);
            $pesos = Peso::get();
            foreach ($pesos as $peso) {
                if ($peso->id == $productoDes->id_Peso) {
                    $detalleVenta->nombreProd = $productoDes->nombre . " - " . $peso->gramos . " Gramos";
                }
            }
            $detalleVenta->cantidad = $request->cantidad;
            $detalleVenta->precio = $productoDes->precioU;
            $detalleVenta->montoTotal = $request->cantidad * $productoDes->precioU;
            $detalleVenta->id_prod = $request->id_prod;
            $detalleVenta->id_notaV = $request->id_notaV;
            $detalleVenta->save();
            $productoDes->subtract_stock($request->cantidad);
            $montoFinal = 0;
            $detalles = DetalleVenta::get();
            foreach ($detalles as $detalle) {
                if ($detalle->id_notaV == $request->id_notaV) {
                    $montoFinal += $detalle->montoTotal;
                }
            }
            $notaVenta->montoTotal = $montoFinal;
            $notaVenta->fecha = date('Y-m-d');
            $notaVenta->hora = date('H:i:s');
            $factura->montoTotal = $montoFinal;
            $factura->fecha = date('Y-m-d');
            $factura->hora = date('H:i:s');
            $notaVenta->save();
            $factura->save();
            return redirect('detalleVenta')->with('mensaje', 'Datos Actualizados');
        } else {
            if ($detalleVenta->id_prod != $request->id_prod and $productoDes->stock < $request->cantidad) {
                return back()->with('mensaje', 'Stock Insuficiente Del Producto');
            } else {
                if ($request->cantidad > $detalleVenta->cantidad) {
                    if ($productoDes->stock < $request->cantidad - $detalleVenta->cantidad) {
                        return back()->with('mensaje', 'Stock Insuficiente Del Producto');
                    } else {
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
                        $action = "Actualizó un detalle de venta";
                        $Bitacora = userBitacora::create();
                        $Bitacora->tipo = $tipo;
                        $Bitacora->user = $user->name;
                        $Bitacora->action = $action;
                        $Bitacora->fecha = date('Y-m-d');
                        $Bitacora->hora = date('H:i:s');
                        $Bitacora->save();

                        $productoDes->subtract_stock($request->cantidad - $detalleVenta->cantidad);
                        $pesos = Peso::get();
                        foreach ($pesos as $peso) {
                            if ($peso->id == $productoDes->id_Peso) {
                                $detalleVenta->nombreProd = $productoDes->nombre . " - " . $peso->gramos . " Gramos";
                            }
                        }
                        $detalleVenta->cantidad = $request->cantidad;
                        $detalleVenta->precio = $productoDes->precioU;
                        $detalleVenta->montoTotal = $request->cantidad * $productoDes->precioU;
                        $detalleVenta->id_prod = $request->id_prod;
                        $detalleVenta->id_notaV = $request->id_notaV;
                        $detalleVenta->save();
                        $detalles = DetalleVenta::get();
                        $montoFinal = 0;
                        foreach ($detalles as $detalle) {
                            if ($detalle->id_notaV == $request->id_notaV) {
                                $montoFinal += $detalle->montoTotal;
                            }
                        }
                        $notaVenta->montoTotal = $montoFinal;
                        $notaVenta->fecha = date('Y-m-d');
                        $notaVenta->hora = date('H:i:s');
                        $factura->montoTotal = $montoFinal;
                        $factura->fecha = date('Y-m-d');
                        $factura->hora = date('H:i:s');
                        $notaVenta->save();
                        $factura->save();
                        return redirect('detalleVenta')->with('mensaje', 'Datos Actualizados');
                    }
                } else {
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
                    $action = "Actualizó un detalle de venta";
                    $Bitacora = userBitacora::create();
                    $Bitacora->tipo = $tipo;
                    $Bitacora->user = $user->name;
                    $Bitacora->action = $action;
                    $Bitacora->fecha = date('Y-m-d');
                    $Bitacora->hora = date('H:i:s');
                    $Bitacora->save();

                    $productoDes->add_stock($detalleVenta->cantidad - $request->cantidad);
                    $pesos = Peso::get();
                    foreach ($pesos as $peso) {
                        if ($peso->id == $productoDes->id_Peso) {
                            $detalleVenta->nombreProd = $productoDes->nombre . " - " . $peso->gramos . " Gramos";
                        }
                    }
                    $detalleVenta->cantidad = $request->cantidad;
                    $detalleVenta->precio = $productoDes->precioU;
                    $detalleVenta->montoTotal = $request->cantidad * $productoDes->precioU;
                    $detalleVenta->id_prod = $request->id_prod;
                    $detalleVenta->id_notaV = $request->id_notaV;
                    $detalleVenta->save();
                    $detalles = DetalleVenta::get();
                    $montoFinal = 0;
                    foreach ($detalles as $detalle) {
                        if ($detalle->id_notaV == $request->id_notaV) {
                            $montoFinal += $detalle->montoTotal;
                        }
                    }
                    $notaVenta->montoTotal = $montoFinal;
                    $notaVenta->fecha = date('Y-m-d');
                    $notaVenta->hora = date('H:i:s');
                    $factura->montoTotal = $montoFinal;
                    $factura->fecha = date('Y-m-d');
                    $factura->hora = date('H:i:s');
                    $notaVenta->save();
                    $factura->save();
                    return redirect('detalleVenta')->with('mensaje', 'Datos Actualizados');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleVenta
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
        $action = "Eliminó un detalle de venta";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        date_default_timezone_set('America/La_Paz');
        $detalleVenta = DetalleVenta::find($id);
        $producto = producto::find($detalleVenta->id_prod);
        $notaVenta = NotaVenta::find($detalleVenta->id_notaV);
        $factura = Factura::find($notaVenta->id_fact);
        $producto->add_stock($detalleVenta->cantidad);
        DetalleVenta::destroy($id);
        $detalles = DetalleVenta::get();
        $montoFinal = 0;
        foreach ($detalles as $detalle) {
            if ($detalle->id_notaV == $notaVenta->id) {
                $montoFinal += $detalle->montoTotal;
            }
        }
        $notaVenta->montoTotal = $montoFinal;
        $notaVenta->fecha = date('Y-m-d');
        $notaVenta->hora = date('H:i:s');
        $factura->montoTotal = $montoFinal;
        $factura->fecha = date('Y-m-d');
        $factura->hora = date('H:i:s');
        $notaVenta->save();
        $factura->save();
        return redirect('detalleVenta')->with('mensaje', 'Producto Borrado Del Detalle Venta');
    }
}
