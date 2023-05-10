@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/categoria/' . $categoria->id) }}" method="POST" style="margin: auto; width:200%">
                @csrf
                {{ method_field('PATCH') }}
                @include('categoria.form', ['modo' => 'UPDATE'])
            </form>
        </div>
    </div>
@endsection
