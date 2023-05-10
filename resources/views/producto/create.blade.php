@extends('layouts.app-master')
@section('content')
    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">
            <form action="{{ url('/producto') }}" method="POST" enctype="multipart/form-data"
                style="margin: auto; width:200%">
                @csrf
                @include('producto.form', ['modo' => 'CREATE'])
            </form>
        </div>
    </div>
@endsection
