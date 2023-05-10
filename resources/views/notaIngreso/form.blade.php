<br>
<h1> {{ $modo }} NOTA INGRESO DE PRODUCTOS </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="integer" placeholder="nro" name="nro" class="form-control" id="nro"
        value="{{ isset($notaIngreso->nro) ? $notaIngreso->nro : old('nro') }}">
    <label for="exampleInputPassword1" class="form-label">Número De Nota De Ingreso</label>
</div>
<h5>Producto</h5>
@if ((isset($notaIngreso->nro) ? $notaIngreso->nro : '') == '')
    <select name="id_Prod" class="form-control">
        @foreach ($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->nombre }} @foreach ($pesos as $peso)
                    @if ($producto->id_Peso == $peso->id)
                        - {{ $peso->gramos }} Gramos
                    @endif
                @endforeach
            </option>
        @endforeach
    </select><br>
@else
    <select name="id_Prod" class="form-control">
        @foreach ($productos as $producto)
            <option value="{{ $producto->id }}" @if ($notaIngreso->id_Prod == $producto->id) selected @endif>
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
    <input type="float" placeholder="costoProd" name="costoProd" class="form-control" id="costoProd"
        value="{{ isset($notaIngreso->costoProd) ? $notaIngreso->costoProd : old('costoProd') }}">
    <label for="exampleInputPassword1" class="form-label">Costo Del Producto</label>
</div>
<div class="form-floating mb-3">
    <input type="integer" placeholder="cantidad" name="cantidad" class="form-control" id="cantidad"
        value="{{ isset($notaIngreso->cantidad) ? $notaIngreso->cantidad : old('cantidad') }}">
    <label for="exampleInputPassword1" class="form-label">Cantidad</label>
</div>
<div class="form-floating mb-3">
    <?php date_default_timezone_set('America/La_Paz'); 
    $fcha = date('Y-m-d'); ?>
    <input type="hidden" class="form-control" value="{{ $fcha }}" name="fecha" id="fecha">
</div>
<div class="form-floating mb-3">
    <?php date_default_timezone_set('America/La_Paz');
    $time = date('H:i:s'); ?>
    <input type="hidden" name="hora" value="{{ $time }}" class="form-control" id="hora">
</div>
<div class="form-floating mb-3">
    <input type="hidden" placeholder="" name="id_Emp" class="form-control" id="id_Emp"
        value="{{ auth()->user()->id }}">
</div>
<div class="form-floating mb-3">
    <input type="hidden" placeholder="" name="total" class="form-control" id="total" value="0">
</div>
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} NOTA INGRESO</button>
<a href="{{ url('notaIngreso') }}" class="btn btn-success"> Regresar </a>