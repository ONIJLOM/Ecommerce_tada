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
            <h2>NOTA INGRESO DE PRODUCTOS</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('notaIngreso/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>NRO</th>
                        <th>Producto - Peso (gr)</th>
                        <th>Costo</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Hora</th>
                        <th>Fecha</th>
                        <th>Trabajador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $notaIngreso)
                        <tr>
                            <td>{{ $notaIngreso->id }}</td>
                            <td>{{ $notaIngreso->nro }}</td>
                            <td>
                                @foreach ($productos as $producto)
                                    @if ($notaIngreso->id_Prod == $producto->id)
                                        {{ $producto->nombre }}
                                        @foreach ($pesos as $peso)
                                            @if ($producto->id_Peso == $peso->id)
                                                - {{ $peso->gramos }} Gramos
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $notaIngreso->costoProd }}</td>
                            <td>{{ $notaIngreso->cantidad }}</td>
                            <td>{{ $notaIngreso->total }}</td>
                            <td>{{ $notaIngreso->hora }}</td>
                            <td>{{ $notaIngreso->fecha }}</td>
                            <td>
                                @foreach ($empleados as $empleado)
                                    @if ($notaIngreso->id_Emp == $empleado->id)
                                        {{ $empleado->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @can('editar-nota-de-ingreso')
                                    <a href="{{ url('/notaIngreso/' . $notaIngreso->id . '/edit') }}"
                                        class="btn btn-success"> Edit </a> ||
                                @endcan
                                @can('borrar-nota-de-ingreso')
                                    <form action="{{ url('/notaIngreso/' . $notaIngreso->id) }}" method="POST"
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
                {!! $notas->links() !!}
            </div>
            @can('crear-nota-de-ingreso')
                <a href="{{ url('notaIngreso/create') }}"><button type="submit" class="btn btn-primary"> + New </button></a>
            @endcan
        </div>
    </div>
@endsection
