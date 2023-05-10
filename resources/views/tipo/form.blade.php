<br>
<h1> {{ $modo }} - TIPO DE PRODUCTO </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="text" placeholder="nombre" name="nombre" class="form-control" id="nombre"
        value="{{ isset($tipo->nombre) ? $tipo->nombre : old('nombre') }}">
    <label for="exampleInputPassword1" class="form-label">Nombre</label>
</div>
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} TIPO DE PRODUCTO</button>
<a href="{{ url('tipo') }}" class="btn btn-success"> Regresar </a>
