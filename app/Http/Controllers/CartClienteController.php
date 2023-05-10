<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Factura;
use App\Models\NotaVenta;
use App\Models\peso;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\producto;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class CartClienteController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-carrito-cliente|editar-carrito-cliente|procesar-carrito-cliente', ['only' => ['index']]);
        $this->middleware('permission:editar-carrito-cliente', ['only' => ['edit']]);
        $this->middleware('permission:procesar-carrito-cliente', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datos['clientes'] = User::where('TipoC', '=', 1)->paginate(10);
        return view('cartCliente.index', $datos);
    }

    public function edit($id)
    {
        $carts = ShoppingCart::get();
        foreach ($carts as $cart) {
            if ($cart->client_id == $id) {
                $cartId = $cart->id;
            }
        }
        $datos['cartDetails'] = ShoppingCartDetail::where('cart_id', '=', $cartId)->paginate(10);
        $pesos = peso::get();
        $productos = producto::get();
        return view('cartDetailCliente.index', $datos, compact('pesos', 'productos'));
    }

    public function store()
    {
    }

    public function destroy($id)
    {
        $carts = ShoppingCart::get();
        $Productos = Producto::get();
        $cartDetails = ShoppingCartDetail::get();
        $pesos = Peso::get();
        foreach ($carts as $cart) {
            if ($cart->client_id == $id) {
                $cartId = $cart->id;
            }
        }
        $bandera = 0;
        foreach ($cartDetails as $cartDetail) {
            if ($cartDetail->cart_id == $cartId) {
                foreach ($Productos as $Producto) {
                    if ($Producto->id == $cartDetail->prod_id) {
                        if ($Producto->stock < $cartDetail->cantidad) {
                            return redirect('cartCliente')->with('mensaje', 'Stock Del Producto Insuficiente');
                        }
                    }
                }
                $bandera = 1;
            }
        }
        if ($bandera == 0) {
            return redirect('cartCliente')->with('mensaje', 'Carrito Vacio');
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
            $action = "Procesó los productos del carrito de un cliente";
            $Bitacora = userBitacora::create();
            $Bitacora->tipo = $tipo;
            $Bitacora->user = $user->name;
            $Bitacora->action = $action;
            $Bitacora->fecha = date('Y-m-d');
            $Bitacora->hora = date('H:i:s');
            $Bitacora->save();

            $MontoFinal = 0;
            $factura = Factura::create();
            $NotaVenta = NotaVenta::create();
            $cliente = User::find($id);
            $factura->fecha = date('Y-m-d');
            $factura->hora = date('H:i:s');
            $factura->id_cliente = $cliente->id;
            $factura->nombre = $cliente->name;
            $NotaVenta->fecha = date('Y-m-d');
            $NotaVenta->hora = date('H:i:s');
            $NotaVenta->id_fact = $factura->id;
            foreach ($cartDetails as $cartDetail) {
                if ($cartDetail->cart_id == $cartId) {
                    foreach ($Productos as $Producto) {
                        if ($Producto->id == $cartDetail->prod_id) {
                            foreach ($pesos as $peso) {
                                if ($Producto->id_Peso == $peso->id) {
                                    $DetalleVenta = DetalleVenta::create();
                                    $DetalleVenta->id_prod = $Producto->id;
                                    $DetalleVenta->id_notaV = $NotaVenta->id;
                                    $DetalleVenta->nombreProd = $cartDetail->nombreProd . " - " . $peso->gramos . " Gramos";
                                    $DetalleVenta->cantidad = $cartDetail->cantidad;
                                    $DetalleVenta->precio = $cartDetail->precioU;
                                    $DetalleVenta->montoTotal = $cartDetail->total;
                                    $DetalleVenta->save();
                                    $stock = $Producto->stock;
                                    $Producto->stock = $stock - $DetalleVenta->cantidad;
                                    $Producto->save();
                                    $MontoFinal += $DetalleVenta->montoTotal;
                                }
                            }
                        }
                    }
                }
            }
            $factura->montoTotal = $MontoFinal;
            $NotaVenta->montoTotal = $MontoFinal;
            $factura->save();
            $NotaVenta->save();
            return redirect('cartCliente')->with('mensaje', 'Productos Procesados');
        }
    }
}
