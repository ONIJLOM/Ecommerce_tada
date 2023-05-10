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
            <h2>BITÁCORA</h2>
            <div class="pagination justify-content-end">
                <a href="{{ url('bitacora/reporte') }}"><button type="submit" class="btn btn-primary"> Reporte
                    </button></a>
            </div>
            <table class="table table-striped mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acción</th>
                        <th>Usuario</th>
                        <th>Tipo Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bitacoras as $bitacora)
                        <tr>
                            <td>{{ $bitacora->id }}</td>
                            <td>{{ $bitacora->fecha }}</td>
                            <td>{{ $bitacora->hora }}</td>
                            <td>{{ $bitacora->action }}</td>
                            <td>{{ $bitacora->user }}</td>
                            <td>{{ $bitacora->tipo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $bitacoras->links() !!}
            </div>
                <a href="{{ url('bitacora/create') }}"><button type="submit" class="btn btn-primary"> + New
                    </button></a>
        </div>
    </div>
@endsection
