<br>
<h1> {{ $modo }} PRODUCTO </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="text" placeholder="nombre" name="nombre" class="form-control" id="nombre"
        value="{{ isset($producto->nombre) ? $producto->nombre : old('nombre') }}">
    <label for="exampleInputPassword1" class="form-label">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" placeholder="descripcion" name="descripcion" class="form-control" id="descripcion"
        value="{{ isset($producto->descripcion) ? $producto->descripcion : old('descripcion') }}">
    <label for="exampleInputPassword1" class="form-label">Descripción</label>
</div>
<div class="form-floating mb-3">
    <input type="float" placeholder="precioU" name="precioU" class="form-control" id="precioU"
        value="{{ isset($producto->precioU) ? $producto->precioU : old('precioU') }}">
    <label for="exampleInputPassword1" class="form-label">Precio Unitario</label>
</div>
@if ((isset($producto->nombre) ? $producto->nombre : '') == '')
    <div class="form-floating mb-3">
        <input type="hidden" placeholder="stock" name="stock" class="form-control" id="stock" value="0">
    </div>
@else
    <div class="form-floating mb-3">
        <input type="integer" placeholder="stock" name="stock" class="form-control" id="stock"
            value="{{ isset($producto->stock) ? $producto->stock : old('stock') }}">
        <label for="exampleInputPassword1" class="form-label">Stock</label>
    </div>
@endif
<div class="form-floating mb-3">
    <input type="integer" placeholder="cantMin" name="cantMin" class="form-control" id="cantMin"
        value="{{ isset($producto->cantMin) ? $producto->cantMin : old('cantMin') }}">
    <label for="exampleInputPassword1" class="form-label">Cantidad Minima</label>
</div>
@if ((isset($producto->nombre) ? $producto->nombre : '') == '')
    <input type="hidden" placeholder="estado" name="estado" class="form-control" id="estado" value="No Disponible">
@else
    <h5>Estado</h5>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="No Disponible"
            @if ((isset($producto->estado) ? $producto->estado : old('estado')) == 'No Disponible') checked @endif>
        <label class="form-check-label" for="flexRadioDefault1">
            No Disponible
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="Disponible"
            @if ((isset($producto->estado) ? $producto->estado : old('cantMin')) == 'Disponible') checked @endif>
        <label class="form-check-label" for="flexRadioDefault1">
            Disponible
        </label>
    </div> <br>
@endif
<div class="form-floating mb-3">
    <input type="file" placeholder="image" name="image" class="form-control" id="image" value=" ">
    <label for="exampleInputPassword1" class="form-label">image</label>
</div>
<h5>Peso</h5>
@foreach ($pesos as $peso)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="id_Peso" id="flexRadioDefault1" value="{{ $peso->id }}"
            @if ((isset($producto->id_Peso) ? $producto->id_Peso : old('id_Peso')) == $peso->id) checked @endif>
        <label class="form-check-label" for="flexRadioDefault1">
            {{ $peso->gramos }} Gramos
        </label>
    </div>
@endforeach
<br>
<h5>Tipo De Producto</h5>
@foreach ($tipos as $tipo)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="{{ $tipo->id }}"
            @if ((isset($producto->id_Tipo) ? $producto->id_Tipo : old('id_Tipo')) == $tipo->id) checked @endif>
        <label class="form-check-label" for="flexRadioDefault1">
            {{ $tipo->nombre }}
        </label>
    </div>
@endforeach
<br>
<h5>Categoría Del Producto</h5>
@foreach ($categorias as $categoria)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="id_Cat" id="flexRadioDefault5"
            value="{{ $categoria->id }}" @if ((isset($producto->id_Cat) ? $producto->id_Cat : old('id_Cat')) == $categoria->id) checked @endif>
        <label class="form-check-label" for="flexRadioDefault5">
            {{ $categoria->nombre }}
        </label>
    </div>
@endforeach
<br>
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} PRODUCTO</button>
<a href="{{ url('producto') }}" class="btn btn-success"> Regresar </a>
