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
            <h2>PRODUCTOS</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('producto/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio Unitario</th>
                        <th>Stock</th>
                        <th>Cantidad Minima</th>
                        <th>Estado</th>
                        <th>Peso (Gr)</th>
                        <th>Tipo</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precioU }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->cantMin }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>
                                @foreach ($pesos as $peso)
                                    @if ($producto->id_Peso == $peso->id)
                                        {{ $peso->gramos }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($tipos as $tipo)
                                    @if ($producto->id_Tipo == $tipo->id)
                                        {{ $tipo->nombre }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($categorias as $categoria)
                                    @if ($producto->id_Cat == $categoria->id)
                                        {{ $categoria->nombre }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @can('editar-producto')
                                    <a href="{{ url('/producto/' . $producto->id . '/edit') }}" class="btn btn-success">
                                        Edit </a> ||
                                @endcan
                                @can('borrar-producto')
                                    <form action="{{ url('/producto/' . $producto->id) }}" method="POST" class="d-inline">
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
                {!! $productos->links() !!}
            </div>
            @can('crear-producto')
                <a href="{{ url('producto/create') }}"> <button type="submit" class="btn btn-primary"> + New </button> </a>
            @endcan
        </div>
    </div>
@endsection
