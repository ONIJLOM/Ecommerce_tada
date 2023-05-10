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
            <h2>Nota Ventas - Clientes</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('notaVenta/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Monto Total</th>
                        <th>ID Factura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notaVentas as $notaVenta)
                        <tr>
                            <td>{{ $notaVenta->id }}</td>
                            <td>{{ $notaVenta->fecha }}</td>
                            <td>{{ $notaVenta->hora }}</td>
                            <td>{{ $notaVenta->montoTotal }}</td>
                            <td>{{ $notaVenta->id_fact }}</td>
                            <td>
                                @can('editar-nota-venta')
                                    <a href="{{ url('/notaVenta/' . $notaVenta->id . '/edit') }}" class="btn btn-success">
                                        Edit
                                    </a> ||
                                @endcan
                                @can('borrar-nota-venta')
                                    <form action="{{ url('/notaVenta/' . $notaVenta->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                    </form>
                                @endcan
                                @can('ver-detalle-venta')
                                    || <a href="{{ url('/notaVenta/' . $notaVenta->id) }}" class="btn btn-success"> Ver
                                        Detalle
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $notaVentas->links() !!}
            </div>
            @can('crear-nota-venta')
                <a href="{{ url('notaVenta/create') }}"><button type="submit" class="btn btn-primary"> + New </button></a>
            @endcan
        </div>
    </div>
@endsection
