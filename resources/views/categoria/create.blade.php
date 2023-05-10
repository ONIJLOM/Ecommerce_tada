@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/categoria') }}" method="POST" style="margin: auto; width:200%">
                @csrf
                @include('categoria.form', ['modo' => 'CREATE'])
            </form>
        </div>
    </div>
@endsection
