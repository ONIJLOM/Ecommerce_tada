@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/tipo') }}" method="POST" style="margin: auto; width:200%">
                @csrf
                @include('tipo.form', ['modo' => 'CREATE'])
            </form>
        </div>
    </div>
@endsection
