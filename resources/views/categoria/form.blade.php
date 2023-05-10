<br>
<h1> {{ $modo }} CATEGORIA </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="text" placeholder="nombre" name="nombre" class="form-control" id="nombre"
        value="{{ isset($categoria->nombre) ? $categoria->nombre : old('nombre') }}">
    <label for="exampleInputPassword1" class="form-label">Nombre</label>
</div>
<h5>Tipo De Producto</h5>
@foreach ($tipos as $tipo)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1"
            value="{{ $tipo->id }}">
        @if ((isset($categoria->id_Tipo) ? $categoria->id_Tipo : old('sexo')) == '{{ $tipo->id }}')
            checked
        @endif
        <label class="form-check-label" for="flexRadioDefault1">
            {{ $tipo->nombre }}
        </label>
    </div>
@endforeach
<br>
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} CATEGORIA</button>
<a href="{{ url('categoria') }}" class="btn btn-success"> Regresar </a>