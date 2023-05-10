<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento</title>

    <style>
        @page {
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            /*size-width: 10cm;
            height: 200cm;*/
        }
    </style>

    <style>
        /** Define the margins of your page **/
        /*@page {
    margin: 100px 25px;
}*/

        header {
            position: fixed;
            top: -37px;
            left: 0px;
            right: 0px;
            height: 32px;

            /** Extra personal styles **/
            background-color: #dc3545;
            color: white;
            text-align: center;
            line-height: 39px;
        }

        footer {
            position: fixed;
            bottom: -75px;
            left: 0px;
            right: 0px;
            height: 72px;

            /** Extra personal styles **/
            background-color: #dc3545;
            color: white;
            text-align: center;
            line-height: 5px;
        }
    </style>

</head>

<body>

    <header>
        <b>FAMOSA - REPORTE</b>
    </header>

    <footer>
        <?php date_default_timezone_set('America/La_Paz'); ?>
        <b>Fecha: {{ date('Y-m-d') }} || Hora: {{ date('H:i:s') }}</b>
    </footer>

    <h2>Facturas - Clientes</h2>
    <table class="table table-striped mt-2">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nit De La Empresa</th>
                <th>Nit Del Cliente</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Monto Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ $factura->nit_empresa }}</td>
                    <td>{{ $factura->nit_cliente }}</td>
                    <td>{{ $factura->nombre }}</td>
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->hora }}</td>
                    <td>{{ $factura->montoTotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
