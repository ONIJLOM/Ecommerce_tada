<?php

namespace App\Http\Controllers;

use App\Models\peso;
use App\Models\producto;
use App\Models\User;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use App\Models\userBitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

date_default_timezone_set('America/La_Paz');

class CartDetailClienteController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-detalle-carrito|crear-detalle-carrito|editar-detalle-carrito|borrar-detalle-carrito', ['only' => ['index']]);
        $this->middleware('permission:crear-detalle-carrito', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-detalle-carrito', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-detalle-carrito', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datos['clientes'] = User::where('TipoC', '=', 1)->paginate(10);
        return view('cartCliente.index', $datos);
    }

    public function create()
    {
        $productos = producto::get();
        $pesos = peso::get();
        $clientes = User::get();
        return view('cartDetailCliente.create', compact('productos', 'pesos', 'clientes'));
    }

    public function store(Request $request)
    {
        $producto = producto::find($request->prod_id);
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
            $action = "Agregó productos al carrito de un cliente";
            $Bitacora = userBitacora::create();
            $Bitacora->tipo = $tipo;
            $Bitacora->user = $user->name;
            $Bitacora->action = $action;
            $Bitacora->fecha = date('Y-m-d');
            $Bitacora->hora = date('H:i:s');
            $Bitacora->save();

            $carts = ShoppingCart::get();
            foreach ($carts as $cart) {
                if ($cart->client_id == $request->client_id) {
                    $idCart = $cart->id;
                }
            }
            $cartShopp = ShoppingCart::find($idCart);
            $cartShopp->fechaMod = date('Y-m-d');
            $cartShopp->horaMod = date('H:i:s');
            $cartShopp->save();
            $datos = shoppingCartDetail::create();
            $datos->nombreProd = $producto->nombre;
            $datos->cantidad = $request->cantidad;
            $datos->precioU = $producto->precioU;
            $datos->total = $producto->precioU * $request->cantidad;
            $datos->prod_id = $request->prod_id;
            $datos->cart_id = $idCart;
            $datos->save();
            return redirect('cartDetailCliente')->with('mensaje', 'Producto Agregado Con Éxito');
        }
    }

    public function edit($id)
    {
        $cartDetail = ShoppingCartDetail::find($id);
        $productos = producto::get();
        $pesos = peso::get();
        return view('cartDetailCliente.edit', compact('cartDetail', 'productos', 'pesos'));
    }

    public function update(request $request, $id)
    {
        $producto = producto::find($request->prod_id);
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
            $action = "Actualizó los productos del carrito de un cliente";
            $Bitacora = userBitacora::create();
            $Bitacora->tipo = $tipo;
            $Bitacora->user = $user->name;
            $Bitacora->action = $action;
            $Bitacora->fecha = date('Y-m-d');
            $Bitacora->hora = date('H:i:s');
            $Bitacora->save();

            $cartDetail = ShoppingCartDetail::find($id);
            $cartShopp = ShoppingCart::find($cartDetail->cart_id);
            $cartShopp->fechaMod = date('Y-m-d');
            $cartShopp->horaMod = date('H:i:s');
            $cartShopp->save();
            $datos = shoppingCartDetail::find($id);
            $datos->nombreProd = $producto->nombre;
            $datos->cantidad = $request->cantidad;
            $datos->precioU = $producto->precioU;
            $datos->total = $producto->precioU * $request->cantidad;
            $datos->prod_id = $producto->id;
            $datos->cart_id = $cartShopp->id;
            $datos->save();
            /*$datos = request()->except(['_token','_method']);
            ShoppingCartDetail::where('id','=', $id)->update($datos);*/
            return redirect('cartDetailCliente')->with('mensaje', 'Datos Actualizados');
        }
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
        $action = "Eliminó los productos del carrito de un cliente";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        ShoppingCartDetail::destroy($id);
        return redirect('cartCliente')->with('mensaje', 'Producto Borrado Del Carrito');
    }
}
