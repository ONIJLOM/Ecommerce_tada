@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/factura/' . $factura->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                @include('factura.form', ['modo' => 'UPDATE'])
            </form>
        </div>
    </div>
@endsection
