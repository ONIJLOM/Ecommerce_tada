@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/producto/' . $producto->id) }}" method="POST" style="margin: auto; width:200%" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                @include('producto.form', ['modo' => 'UPDATE'])
            </form>
        </div>
    </div>
@endsection
