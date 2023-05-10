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
            <h2>USUARIOS - CLIENTES</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('cliente/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>CI</th>
                        <th>Sexo</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            @if ($cliente->TipoC == 1)
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->name }}</td>
                                <td>{{ $cliente->ci }}</td>
                                <td>{{ $cliente->sexo }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    @can('editar-cliente')
                                        <a href="{{ url('/cliente/' . $cliente->id . '/edit') }}" class="btn btn-success">
                                            Edit </a> ||
                                    @endcan
                                    @can('borrar-cliente')
                                        <form action="{{ url('/cliente/' . $cliente->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input class="btn btn-danger" type="submit"
                                                onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                        </form>
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $clientes->links() !!}
            </div>
            @can('crear-cliente')
                <a href="{{ url('cliente/create') }}"> <button type="submit" class="btn btn-primary"> + New </button> </a>
            @endcan
        </div>
    </div>
@endsection
