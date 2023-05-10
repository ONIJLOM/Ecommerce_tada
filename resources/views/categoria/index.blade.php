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
            <h2>CATEGORIA DE PRODUCTOS</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('categoria/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                @foreach ($tipos as $tipo)
                                    @if ($categoria->id_Tipo == $tipo->id)
                                        {{ $tipo->nombre }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @can('editar-categoria')
                                    <a href="{{ url('/categoria/' . $categoria->id . '/edit') }}" class="btn btn-success">
                                        Edit </a> ||
                                @endcan
                                @can('borrar-categoria')
                                    <form action="{{ url('/categoria/' . $categoria->id) }}" method="POST" class="d-inline">
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
                {!! $categorias->links() !!}
            </div>
            @can('crear-categoria')
                <a href="{{ url('categoria/create') }}"> <button type="submit" class="btn btn-primary"> + New </button> </a>
            @endcan
        </div>
    </div>
@endsection
