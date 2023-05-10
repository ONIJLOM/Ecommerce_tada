<br>
<h1> {{ $modo }} DETALLE CARRITO </h1>
@include('layouts.partials.messages')
<h5>Producto</h5>
@if ((isset($detalleVenta->id) ? $detalleVenta->id : '') == '')
    <select name="id_prod" class="form-control">
        @foreach ($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->nombre }} @foreach ($pesos as $peso)
                    @if ($producto->id_Peso == $peso->id)
                        - {{ $peso->gramos }} Gramos - {{$producto->precioU}} Bs
                    @endif
                @endforeach
            </option>
        @endforeach
        <option selected value=""> Seleccione Una Producto... </option>
    </select><br>
@else
    <select name="id_prod" class="form-control">
        @foreach ($productos as $producto)
            <option value="{{ $producto->id }}" @if ($detalleVenta->id_prod == $producto->id) selected @endif>
                {{ $producto->nombre }} @foreach ($pesos as $peso)
                    @if ($producto->id_Peso == $peso->id)
                        - {{ $peso->gramos }} Gramos
                    @endif
                @endforeach
            </option>
        @endforeach
    </select> <br>
@endif
<div class="form-floating mb-3">
    <input type="integer" placeholder="cantidad" name="cantidad" class="form-control" id="cantidad"
        value="{{ isset($detalleVenta->cantidad) ? $detalleVenta->cantidad : old('cantidad') }}">
    <label for="exampleInputPassword1" class="form-label">Cantidad</label>
</div>
@if ((isset($detalleVenta->id) ? $detalleVenta->id : '') == '')
    <h5>Nota Ventas</h5>
    <select name="id_notaV" class="form-control">
        @foreach ($notaVentas as $notaVenta)
                <option value="{{ $notaVenta->id }}">{{ $notaVenta->id }} </option>
        @endforeach
        <option selected value=""> Seleccione Una Nota Venta... </option>
    </select> <br>
@else
<h5>Nota Ventas</h5>
<select name="id_notaV" class="form-control">
    @foreach ($notaVentas as $notaVenta)
            <option value="{{ $notaVenta->id }}" @if ($notaVenta->id == $detalleVenta->id_notaV)
                selected
            @endif>{{ $notaVenta->id }} </option>
    @endforeach
    <option value=""> Seleccione Una Nota Venta... </option>
</select> <br>
@endif
<input type="hidden" name="precio" class="form-control" id="exampleInputPassword1" value="">
<input type="hidden" name="montoTotal" class="form-control" id="exampleInputPassword1" value="">
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} Detalle Carrito</button>
<a href="{{ url('detalleVenta') }}" class="btn btn-success"> Regresar </a>
