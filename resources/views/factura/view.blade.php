<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Factura</title>

    <style>
        @page {
            margin-left: 0.5cm;
            margin-right: 1cm;
            /*size-width: 10cm;
            height: 200cm;*/
        }
    </style>

</head>

<body>
    <p>-------------------------------------------------------------------</p>
    <header><center><b>*** EMPRESA - FAMOSA ***</b></center></header>
    <center>PI MZ13 Y 14 barrio industrial <br>
    Santa Cruz - Bolivia<br>
    Contacto: 3 3462670 <br>
    Email: info@famosa.com.bo
    </center>
    <p>-------------------------------------------------------------------</p>
    <center><b>Facturación De Venta De Productos</b></center>
    <p>
        <b> Nro De Factura: </b> {{{ $factura->id }}}<br>
        <b> Nit De La Empresa: </b>{{ $factura->nit_empresa }}<br>
        <b> Nit Del Cliente: </b>{{ $factura->nit_cliente }} <br>
        <b> Nombre Del Cliente: </b>{{ $factura->nombre }} <br>
        <b> Detalles De La Compra: </b>
    <table class="table table-striped mt-2">
        <thead class="thead-light">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach ($detalleVentas as $detalleVenta)
                <tr>
                    @if ($detalleVenta->id_notaV == $notaVenta->id)
                        {
                        <td>{{ $detalleVenta->nombreProd }}</td>
                        <td>{{ $detalleVenta->cantidad }}</td>
                        <td>{{ $detalleVenta->precio }} Bs</td>
                        <?php $total += $detalleVenta->montoTotal; ?>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <b>TOTAL BOLIVIANOS: {{ $total }} Bs</b><br>
    Pago: {{ $factura->pago }} Bs<br>
    Cambio: {{ $factura->cambio }} Bs
    <p>-------------------------------------------------------------------</p>
    <center><b>Fecha Y Hora De Emisión </b><br>
        <?php date_default_timezone_set('America/La_Paz'); ?>
        Fecha: {{ date('Y-m-d') }} || Hora: {{ date('H:i:s') }}<br>
        ***** Gracias Por Su Compra *****
    </center>
    <p>-------------------------------------------------------------------</p>
</body>

</html>
