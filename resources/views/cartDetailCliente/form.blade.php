<br>
<h1> {{ $modo }} DETALLE CARRITO </h1>
@include('layouts.partials.messages')
<h5>Producto</h5>
@if ((isset($cartDetail->id) ? $cartDetail->id : '') == '')
    <select name="prod_id" class="form-control">
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
    <select name="prod_id" class="form-control">
        @foreach ($productos as $producto)
            <option value="{{ $producto->id }}" @if ($cartDetail->prod_id == $producto->id) selected @endif>
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
        value="{{ isset($cartDetail->cantidad) ? $cartDetail->cantidad : old('cantidad') }}">
    <label for="exampleInputPassword1" class="form-label">Cantidad</label>
</div>
@if ((isset($cartDetail->id) ? $cartDetail->id : '') == '')
    <h5>Clientes</h5>
    <select name="client_id" class="form-control">
        @foreach ($clientes as $cliente)
            @if ($cliente->TipoC == 1)
                <option value="{{ $cliente->id }}">{{ $cliente->name }} </option>
            @endif)
        @endforeach
        <option selected value=""> Seleccione Una Cliente... </option>
    </select> <br>
@endif
<input type="hidden" name="precio" class="form-control" id="exampleInputPassword1" value="">
<input type="hidden" name="total" class="form-control" id="exampleInputPassword1" value="">
<input type="hidden" name="cart_id" class="form-control" id="exampleInputPassword1" value="">
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} Detalle Carrito</button>
<a href="{{ url('cartDetailCliente') }}" class="btn btn-success"> Regresar </a>
