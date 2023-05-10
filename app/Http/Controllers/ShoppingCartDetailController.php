<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCartDetail;
use App\Models\producto;
use App\Models\peso;
use App\Models\User;
use App\Http\Requests\StoreShoppingCartDetailRequest;
use App\Http\Requests\UpdateShoppingCartDetailRequest;
use App\Models\ShoppingCart;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class ShoppingCartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = ShoppingCart::get();
        $cartDetails = ShoppingCartDetail::get();
        $productos = Producto::get();
        $pesos = Peso::get();
        return view('pages.carrito', compact('carts', 'cartDetails', 'productos', 'pesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoppingCartDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingCartDetailRequest $request)
    {
        date_default_timezone_set('America/La_Paz');

        $prod = producto::find($request->prod_id);
        if ($prod->stock > $request->cantidad) {
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
            $action = "Agregó productos al carrito";
            $Bitacora = userBitacora::create();
            $Bitacora->tipo = $tipo;
            $Bitacora->user = $user->name;
            $Bitacora->action = $action;
            $Bitacora->fecha = date('Y-m-d');
            $Bitacora->hora = date('H:i:s');
            $Bitacora->save();

            $datos = request()->except('_token');
            $datos = ShoppingCartDetail::create($datos);
            $datos->total = ($request->cantidad * $request->precioU);
            $datos->save();

            $cart = ShoppingCart::find($datos->cart_id);
            $cart->fechaMod = date('Y-m-d');
            $cart->horaMod = date('H:i:s');
            $cart->save();
            return redirect('catalogo')->with('mensaje', 'Producto Agregado Con Éxito');
        } else {
            return redirect('catalogo')->with('mensaje', 'Stock Del Producto Insuficiente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCartDetail $shoppingCartDetail)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingCartDetailRequest  $request
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingCartDetailRequest $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
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
        $action = "Eliminó productos de su carrito";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        ShoppingCartDetail::destroy($id);
        return redirect('shoppingCartDetail')->with('mensaje', 'Producto Borrado');
    }
}
