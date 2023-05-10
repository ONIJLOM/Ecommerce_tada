<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\userBitacora;
use Spatie\Permission\Models\Role;
use PDF;

date_default_timezone_set('America/La_Paz');

class AdministradorController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-administrador|crear-administrador|editar-administrador|borrar-administrador', ['only' => ['index']]);
        $this->middleware('permission:crear-administrador', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-administrador', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-administrador', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datos['administradores'] = User::where('TipoA', '=', 1)->paginate(10);
        return view('administrador.index', $datos);
    }

    public function reporte()
    {
        $administradores = User::where('TipoA', '=', 1)->paginate();
        $pdf = PDF::loadView('administrador.reporte', ['administradores' => $administradores]);
        $pdf->setOption(['dpi' => 30, 'defaultFont' => 'sans-serif']);
        //$pdf->set_paper(array(0,0,250,1000));
        return $pdf->stream();
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('administrador.create', compact('roles'));
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
        $action = "Agregó un nuevo usuario administrador";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        $datosAdmin = User::create($request->validated());
        //$datosAdmin->assignRole($request->input('roles'));
        $datosAdmin->assignRole('Administrador');
        return redirect('administrador')->with('mensaje', 'Administrador Agregado Con Éxito');
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
        $action = "Eliminó a un usuario administrador";
        $Bitacora = userBitacora::create();
        $Bitacora->tipo = $tipo;
        $Bitacora->user = $user->name;
        $Bitacora->action = $action;
        $Bitacora->fecha = date('Y-m-d');
        $Bitacora->hora = date('H:i:s');
        $Bitacora->save();

        User::destroy($id);
        return redirect('administrador')->with('mensaje', 'Administrador Borrado');
    }

    public function edit($id)
    {
        $administrador = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $adminRole = $administrador->roles->pluck('name', 'name')->all();
        return view('administrador.edit', compact('administrador', 'roles', 'adminRole'));
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
        $action = "Actualizó datos de un usuario administrador";
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
        return redirect('administrador')->with('mensaje', 'Datos Actualizados');
    }

    public function show()
    {
        //
    }
}
