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
            <h2>PESOS DE PRODUCTOS</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('peso/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Peso En Gramos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesos as $peso)
                        <tr>
                            <td>{{ $peso->id }}</td>
                            <td>{{ $peso->gramos }}</td>
                            <td>
                                @can('editar-peso')
                                    <a href="{{ url('/peso/' . $peso->id . '/edit') }}" class="btn btn-success"> Edit </a> ||
                                @endcan
                                @can('borrar-peso')
                                    <form action="{{ url('/peso/' . $peso->id) }}" method="POST" class="d-inline">
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
                {!! $pesos->links() !!}
            </div>
            @can('crear-peso')
                <a href="{{ url('peso/create') }}"><button type="submit" class="btn btn-primary"> + New </button></a>
            @endcan
        </div>
    </div>
@endsection
