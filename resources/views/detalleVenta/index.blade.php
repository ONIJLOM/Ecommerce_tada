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
            <h2>Detalle Venta</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('detalleVenta/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte
                    </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio (Bs)</th>
                        <th>Total (Bs)</th>
                        <th>ID Nota Venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleVentas as $detalleVenta)
                        <tr>
                            <td>{{ $detalleVenta->id }}</td>
                            @foreach ($productos as $producto)
                                @if ($producto->id == $detalleVenta->id_prod)
                                    <td>{{ $detalleVenta->nombreProd }}</td>
                                @endif
                            @endforeach
                            <td>{{ $detalleVenta->cantidad }}</td>
                            <td>{{ $detalleVenta->precio }}</td>
                            <td>{{ $detalleVenta->montoTotal }}</td>
                            <td>{{ $detalleVenta->id_notaV }}</td>
                            <td>
                                @can('editar-detalle-venta')
                                    <a href="{{ url('/detalleVenta/' . $detalleVenta->id . '/edit') }}"
                                        class="btn btn-success">
                                        Edit </a> ||
                                @endcan
                                @can('borrar-detalle-venta')
                                    <form action="{{ url('/detalleVenta/' . $detalleVenta->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Seguro que quieres eliminar este producto de este carrito?')"
                                            value="Delete">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $detalleVentas->links() !!}
            </div>
            @can('crear-detalle-venta')
                <a href="{{ url('detalleVenta/create') }}"> <button type="submit" class="btn btn-primary"> + New </button>
                </a>
            @endcan
        </div>
    </div>
@endsection
