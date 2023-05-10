@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/empleado/' . $empleado->id) }}" method="POST" style="margin: auto; width:200%">
                @csrf
                {{ method_field('PATCH') }}
                @include('empleado.form', ['modo' => 'UPDATE'])
            </form>
        </div>
    </div>
@endsection
