@extends('layouts.app-master')

@section('content')

    @guest

    <h1>HOME</h1>

    <p> Para ver el contenido inicia sesion </p>

    @endguest

    @auth
        <div id="app" class="wrapper" style="position: absolute; left:0;">
            @include('layouts.sidebar')
            <div id="content">
                <h1>HOME</h1>

                <!--Para mostrar solo a las personas que iniciaron sesion-->
                <p> Bienvenido administrador {{auth()->user()->name}}, estás autenticado a la página </p>

            </div>
        </div>
    @endauth

@endsection