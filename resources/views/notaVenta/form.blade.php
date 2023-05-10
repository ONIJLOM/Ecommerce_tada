<br>
<h1> {{ $modo }} NOTA VENTA </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <?php $fcha = date('Y-m-d'); ?>
    <input type="hidden" class="form-control" value="{{ $fcha }}" name="fecha" id="fecha">
</div>
<div class="form-floating mb-3">
    <?php date_default_timezone_set('America/La_Paz');
    $time = date('H:i:s'); ?>
    <input type="hidden" name="hora" value="{{ $time }}" class="form-control" id="hora">
</div>
<div class="form-floating mb-3">
    <input type="float" placeholder="montoTotal" name="montoTotal" class="form-control" id="montoTotal"
        value="{{ isset($notaVenta->montoTotal) ? $notaVenta->montoTotal : old('montoTotal') }}">
    <label for="exampleInputPassword1" class="form-label">Monto Total</label>
</div>
@if ((isset($notaVenta->id) ? $notaVenta->id : '') == '')
    <select name="id_fact" class="form-control">
        @foreach ($facturas as $factura)
            <option value="{{ $factura->id }}">{{ $factura->nombre }} - {{$factura->id}}
            </option>
        @endforeach
        <option value="" selected> Seleccione La Factura Correspondiente ...
        </option>
    </select><br>
@else
    <select name="id_Prod" class="form-control">
        @foreach ($facturas as $factura)
            <option value="{{ $factura->id }}" @if ($notaVenta->id_fact == $factura->id) selected @endif>
                {{ $factura->nombre }} - {{$factura->id}}
            </option>
        @endforeach
        <option value=""> Seleccione La Factura Correspondiente ...
        </option>
    </select> <br>
@endif
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} NOTA VENTA</button>
<a href="{{ url('notaVenta') }}" class="btn btn-success"> Regresar </a>
