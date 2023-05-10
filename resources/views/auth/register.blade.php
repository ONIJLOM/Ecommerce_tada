@extends('layouts.auth')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG" />
                </div>
                <form action="/register" method="POST">
                    @csrf
                    @include('layouts.partials.messages')
                    <span class="login100-form-title"> Tada Registration</span>
                    <div class="wrap-input100 validate-input">
                        <input id="name" class="input100" type="text" name="name" placeholder="Nombre Completo"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input id="exampleInputEmail1" class="input100" type="email" name="email" :value="old('email')"
                            placeholder="Email" required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input id="exampleInputPassword1" class="input100" type="number" name="telefono"
                            :value="old('phone')" placeholder="Teléfono" required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input id="exampleInputPassword1" class="input100" type="password" name="password" required
                            placeholder="Contraseña" autocomplete="new-password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input id="password_confirmation" class="input100" type="password" name="password_confirmation"
                            required placeholder="Confirmar Contraseña" autocomplete="new-password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Registrarme
                        </button>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('login') }}">
                            {{ __('¿Ya tiene una cuenta?') }}
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                    <input type="hidden" placeholder="" name="TipoC" class="form-control" id="exampleInputPassword1"
                        value="1">
                    <input type="hidden" placeholder="" name="TipoE" class="form-control" id="exampleInputPassword1"
                        value="0">
                    <input type="hidden" placeholder="" name="TipoA" class="form-control" id="exampleInputPassword1"
                        value="0">
                </form>
            </div>
        </div>
    </div>
@endsection
