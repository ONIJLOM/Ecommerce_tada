@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/notaVenta') }}" method="POST">
                @csrf
                @include('notaVenta.form', ['modo' => 'CREATE'])
            </form>
        </div>
    </div>
@endsection
