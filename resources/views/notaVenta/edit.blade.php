@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/notaVenta/' . $notaVenta->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                @include('notaVenta.form', ['modo' => 'UPDATE'])
            </form>
        </div>
    </div>
@endsection
