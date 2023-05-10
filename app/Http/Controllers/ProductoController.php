<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreproductoRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateproductoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\peso;
use App\Models\tipo;
use App\Models\categoria;
use App\Models\producto;
use App\Models\notaIngreso;
use App\Models\userBitacora;
use PDF;

date_default_timezone_set('America/La_Paz');

class ProductoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos'] = producto::paginate(10);
        $tipos = tipo::get();
        $pesos = peso::get();
        $categorias = categoria::get();
        return view('producto.index', $datos, compact('tipos', 'pesos', 'categorias'));
    }

    public function reporte(){
        $productos = Producto::paginate();
        $tipos = Tipo::get();
        $pesos = Peso::get();
        $categorias = categoria::get();
        $pdf = PDF::loadView('producto.reporte', ['productos' => $productos, 'tipos' => $tipos, 'pesos' => $pesos, 'categorias' => $categorias]);
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
        $pesos = peso::get();
        $categorias = categoria::get();
        return view('producto.create', compact('tipos', 'pesos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
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
        $action = "Agregó un nuevo producto";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosProd = request()->except('_token');
        if($request->hasFile('image')){
            $imagen = $request->file('image');
            $nombre = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('storage/productos');
            $request->image->move($destino, $nombre);
            $datosProd['image'] = $nombre;
            //$datosProd['image'] = $request->file('image')->store('productos', 'public');
        }
        $request->validated();
        producto::insert($datosProd);
        return redirect('producto')->with('mensaje','Producto Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos = tipo::get();
        $pesos = peso::get();
        $categorias = categoria::get();
        $producto = producto::findOrFail($id);
        return view('producto.edit', compact('categorias', 'producto', 'pesos', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductoRequest  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductoRequest $request, $id)
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
        $action = "Actualizó datos de un producto";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosProd = request()->except(['_token','_method']);
        if($request->hasFile('image')){
            //Eliminar una imagen incompleto
            /*$producto = Producto::findOrFail($id);
            Storage::delete('public/'.$producto->image);
            $url = 'public/productos/'.$producto->image;
            Storage::delete($url);*/
            //guardar la imagen
            $imagen = $request->file('image');
            $nombre = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('storage/productos');
            $request->image->move($destino, $nombre);
            $datosProd['image'] = $nombre;
        }
        $request->validated();
        Producto::where('id','=', $id)->update($datosProd);
        return redirect('producto')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
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
        $action = "Eliminó un producto";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        producto::destroy($id);
        return redirect('producto')->with('mensaje', 'Producto Borrado');
    }
}
