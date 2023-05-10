<br>
<h1> {{ $modo }} FACTURA </h1>
@include('layouts.partials.messages')
<input type="hidden" placeholder="nit_empresa" name="nit_empresa" class="form-control" id="nit_empresa" value="123456789">
<div class="form-floating mb-3">
    <input type="integer" placeholder="nit_cliente" name="nit_cliente" class="form-control" id="nit_cliente"
        value="{{ isset($factura->nit_cliente) ? $factura->nit_cliente : old('nit_cliente') }}">
    <label for="exampleInputPassword1" class="form-label">Nit Cliente</label>
</div>
<div class="form-floating mb-3">
    <input type="text" placeholder="nombre" name="nombre" class="form-control" id="nombre"
        value="{{ isset($factura->nombre) ? $factura->nombre : old('nombre') }}">
    <label for="exampleInputPassword1" class="form-label">Name Cliente</label>
</div>
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
        value="{{ isset($factura->montoTotal) ? $factura->montoTotal : old('montoTotal') }}">
    <label for="exampleInputPassword1" class="form-label">Monto Total</label>
</div>
<div class="form-floating mb-3">
    <input type="float" placeholder="pago" name="pago" class="form-control" id="pago"
        value="{{ isset($factura->pago) ? $factura->pago : old('pago') }}">
    <label for="exampleInputPassword1" class="form-label">Pago</label>
</div>
<input type="hidden" placeholder="cambio" name="cambio" class="form-control" id="cambio" value="0">
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} FACTURA</button>
<a href="{{ url('factura') }}" class="btn btn-success"> Regresar </a>
