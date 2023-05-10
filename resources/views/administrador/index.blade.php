@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content"> <br>
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                        style="background-color: #d1e7dd" style="border: #d1e7dd">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h2>USUARIOS - ADMINISTRADORES</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('administrador/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte
                    </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>CI</th>
                        <th>Sexo</th>
                        <th>Telefono</th>
                        <th>Domicilio</th>
                        <th>Estado</th>
                        <th>Email</th>
                        <th> Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $administrador)
                        <tr>
                            <td>{{ $administrador->id }}</td>
                            <td>{{ $administrador->name }}</td>
                            <td>{{ $administrador->ci }}</td>
                            <td>{{ $administrador->sexo }}</td>
                            <td>{{ $administrador->telefono }}</td>
                            <td>{{ $administrador->domicilio }}</td>
                            <td>{{ $administrador->estado }}</td>
                            <td>{{ $administrador->email }}</td>
                            <td>
                                @if (!empty($administrador->getRoleNames()))
                                    @foreach ($administrador->getRoleNames() as $rolname)
                                        <span>{{ $rolname }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @can('editar-administrador')
                                    <a href="{{ url('/administrador/' . $administrador->id . '/edit') }}"
                                        class="btn btn-success"> Edit </a> ||
                                @endcan
                                @can('borrar-administrador')
                                    <form action="{{ url('/administrador/' . $administrador->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $administradores->links() !!}
            </div>
            @can('crear-administrador')
                <a href="{{ url('administrador/create') }}"><button type="submit" class="btn btn-primary"> + New
                    </button></a>
            @endcan
        </div>
    </div>
@endsection
