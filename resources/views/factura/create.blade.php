@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/factura') }}" method="POST">
                @csrf
                @include('factura.form', ['modo' => 'CREATE'])
            </form>
        </div>
    </div>
@endsection
