@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/notaIngreso/' . $notaIngreso->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                @include('notaIngreso.form', ['modo' => 'UPDATE'])
            </form>
        </div>
    </div>
@endsection
