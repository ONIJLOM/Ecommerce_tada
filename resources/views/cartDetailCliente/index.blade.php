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
            <h2>CARRITOS - CLIENTES</h2>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio (Bs)</th>
                        <th>Total (Bs)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartDetails as $cartDetail)
                        <tr>
                            <td>{{ $cartDetail->id }}</td>
                            @foreach ($productos as $producto)
                                @if ($producto->id == $cartDetail->prod_id)
                                    @foreach ($pesos as $peso)
                                        @if ($producto->id_Peso == $peso->id)
                                            <td>{{ $cartDetail->nombreProd }} - {{ $peso->gramos }} Gr</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <td>{{ $cartDetail->cantidad }}</td>
                            <td>{{ $cartDetail->precioU }}</td>
                            <td>{{ $cartDetail->total }}</td>
                            <td>
                                @can('editar-detalle-carrito')
                                    <a href="{{ url('/cartDetailCliente/' . $cartDetail->id . '/edit') }}"
                                        class="btn btn-success">
                                        Edit </a> ||
                                @endcan
                                @can('borrar-detalle-carrito')
                                    <form action="{{ url('/cartDetailCliente/' . $cartDetail->id) }}" method="POST"
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
                {!! $cartDetails->links() !!}
            </div>
            @can('crear-detalle-carrito')
            <a href="{{ url('cartDetailCliente/create') }}"> <button type="submit" class="btn btn-primary"> + New
                </button>
            </a>
            @endcan
        </div>
    </div>
@endsection
