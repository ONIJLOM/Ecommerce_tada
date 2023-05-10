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
            <h2>Facturas - Clientes</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('factura/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nit De La Empresa</th>
                        <th>Nit Del Cliente</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Monto Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->nit_empresa }}</td>
                            <td>{{ $factura->nit_cliente }}</td>
                            <td>{{ $factura->nombre }}</td>
                            <td>{{ $factura->fecha }}</td>
                            <td>{{ $factura->hora }}</td>
                            <td>{{ $factura->montoTotal }}</td>
                            <td>
                                @can('editar-factura')
                                    <a href="{{ url('/factura/' . $factura->id . '/edit') }}" class="btn btn-success"> Edit
                                    </a> ||
                                @endcan
                                @can('borrar-factura')
                                    <form action="{{ url('/factura/' . $factura->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                    </form>
                                @endcan
                                || <a href="{{ url('/factura/' . $factura->id) }}" class="btn btn-success"> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $facturas->links() !!}
            </div>
            @can('crear-factura')
                <a href="{{ url('factura/create') }}"><button type="submit" class="btn btn-primary"> + New </button></a>
            @endcan
        </div>
    </div>
@endsection
