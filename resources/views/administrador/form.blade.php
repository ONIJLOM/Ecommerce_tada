<br>
<h1> {{ $modo }} ACCOUNT </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="text" placeholder="name" name="name" class="form-control" id="name"
        value="{{ isset($administrador->name) ? $administrador->name : old('name') }}">
    <label for="exampleInputPassword1" class="form-label">Name Complete</label>
</div>
<div class="form-floating mb-3">
    <input type="integer" placeholder="ci" name="ci" class="form-control" id="ci"
        value="{{ isset($administrador->ci) ? $administrador->ci : old('ci') }}">
    <label for="exampleInputPassword1" class="form-label">CI</label>
</div>
<h5>Genere</h5>
<div class="form-check">
    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M"
        @if ((isset($administrador->sexo) ? $administrador->sexo : old('sexo')) == 'M') checked @endif>
    <label class="form-check-label" for="flexRadioDefault1">
        Masculine
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="F"
        @if ((isset($administrador->sexo) ? $administrador->sexo : old('sexo')) == 'F') checked @endif>
    <label class="form-check-label" for="flexRadioDefault2">
        Female
    </label>
</div>
<br>
<div class="form-floating mb-3">
    <input type="integer" placeholder="telefono" name="telefono" class="form-control" id="telefono"
        value="{{ isset($administrador->telefono) ? $administrador->telefono : old('telefono') }}">
    <label for="exampleInputPassword1" class="form-label">Phone</label>
</div>
<div class="form-floating mb-3">
    <input type="text" placeholder="domicilio" name="domicilio" class="form-control" id="domicilio"
        value="{{ isset($administrador->domicilio) ? $administrador->domicilio : old('domicilio') }}">
    <label for="exampleInputPassword1" class="form-label">Domicilio</label>
</div>
<h5>Estado</h5>
<div class="form-check">
    <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="Inactivo"
        @if ((isset($administrador->estado) ? $administrador->estado : old('estado')) == 'Inactivo') checked @endif>
    <label class="form-check-label" for="flexRadioDefault1">
        Inactivo
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="Activo"
        @if ((isset($administrador->estado) ? $administrador->estado : old('estado')) == 'Activo') checked @endif>
    <label class="form-check-label" for="flexRadioDefault1">
        Activo
    </label>
</div>
<br>
<div class="form-floating mb-3">
    <input type="email" placeholder="email" name="email" class="form-control" id="email"
        value="{{ isset($administrador->email) ? $administrador->email : old('email') }}"
        aria-describedby="emailHelp">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>
@if ((isset($administrador->name) ? $administrador->name : '') == '')
    <div class="form-floating mb-3">
        <input type="password" placeholder="password" name="password" class="form-control" id="exampleInputPassword1">
        <label for="exampleInputPassword1" class="form-label">Password</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" placeholder="password_confirmation" name="password_confirmation" class="form-control"
            id="exampleInputPassword1">
        <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
    </div>
    <!--OPCIOMAL PARA CREAR UN USUARIO CON UN ROL DIRECTAMENTE-->
    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Roles: </label>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                    </div>
                </div>-->
@else
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="">Roles</label>
            {!! Form::select('roles[]', $roles, $adminRole, ['class' => 'form-control']) !!}
        </div>
    </div>
@endif
<div class="form-floating mb-3">
    <input type="hidden" placeholder="" name="TipoC" class="form-control" id="exampleInputPassword1"
        value="0">
</div>
<div class="form-floating mb-3">
    <input type="hidden" placeholder="" name="TipoE" class="form-control" id="exampleInputPassword1"
        value="0">
</div>
<div class="form-floating mb-3">
    <input type="hidden" placeholder="" name="TipoA" class="form-control" id="exampleInputPassword1"
        value="1">
</div>
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} ACCOUNT</button>
<a href="{{ url('administrador') }}" class="btn btn-success"> Regresar </a>
