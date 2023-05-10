@extends('layouts.auth')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG" />
                </div>
                <form class="login100-form validate-form" action="{{ route('loginA') }}" method="POST">
                    @csrf
                    <span class="login100-form-title"> Famosa Login</span>
                    @include('layouts.partials.messages')
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Email" id="email"
                            aria-describedby="emailHelp" required autofocus />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Contraseña" id="password"
                            required autocomplete="current-password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Iniciar Sesión</button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">¿No tiene</span>
                        <a class="txt2" href="{{ route('register') }}">
                            {{ __('Cuenta?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
