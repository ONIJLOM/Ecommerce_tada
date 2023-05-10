<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\userBitacora;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use PDF;

date_default_timezone_set('America/La_Paz');

class EmpleadoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-empleado|crear-empleado|editar-empleado|borrar-empleado', ['only' => ['index']]);
        $this->middleware('permission:crear-empleado', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-empleado', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-empleado', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datos['empleados'] = User::where('TipoE', '=', 1)->paginate(10);
        return view('empleado.index', $datos);
    }

    public function reporte(){
        $empleados = User::where('TipoE', '=', 1)->paginate();
        $pdf = PDF::loadView('empleado.reporte', ['empleados' => $empleados]);
        $pdf->setOption(['dpi' => 30, 'defaultFont' => 'sans-serif']);
        //$pdf->set_paper(array(0,0,250,1000));
        return $pdf->stream();
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('empleado.create', compact('roles'));
    }

    public function store(RegisterRequest $request)
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
        $action = "Agregó un nuevo usuario empleado";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosEmp = User::create($request->validated());
        $datosEmp->assignRole($request->input('roles'));
        $datosEmp = request()->except(['_token', 'password', 'password_confirmation', 'TipoA', 'TipoE', 'TipoC']);
        return redirect('empleado')->with('mensaje', 'Empleado Agregado Con Éxito');
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
        $action = "Eliminó a un usuario empleado";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        User::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado Borrado');
    }

    public function edit($id)
    {
        $empleado = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $empRole = $empleado->roles->pluck('name', 'name')->all();
        return view('empleado.edit', compact('empleado', 'roles', 'empRole'));
    }

    public function update(Request $request, $id)
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
        $action = "Actualizó datos de un usuario empleado";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect('empleado')->with('mensaje', 'Datos Actualizados');
    }

    public function show()
    {
        //
    }
}
