<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Bitácora</title>

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
            height: 30px;

            /** Extra personal styles **/
            background-color: #dc3545;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -85px;
            left: 0px;
            right: 0px;
            height: 80px;

            /** Extra personal styles **/
            background-color: #dc3545;
            color: white;
            text-align: center;
            line-height: 8px;
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

    <h2>BITÁCORA</h2>
    <table class="table table-striped mt-2">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acción</th>
                <th>Usuario</th>
                <th>Tipo Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacoras as $bitacora)
                <tr>
                    <td>{{ $bitacora->id }}</td>
                    <td>{{ $bitacora->fecha }}</td>
                    <td>{{ $bitacora->hora }}</td>
                    <td>{{ $bitacora->action }}</td>
                    <td>{{ $bitacora->user }}</td>
                    <td>{{ $bitacora->tipo }}</td>
                </tr>
        </tbody>
        @endforeach
    </table>
</body>

</html>
