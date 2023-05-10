<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Productos</title>

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

    <h2>PRODUCTOS</h2>
    <table class="table table-striped mt-2">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Stock</th>
                <th>Cantidad Minima</th>
                <th>Estado</th>
                <th>Peso (Gr)</th>
                <th>Tipo</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precioU }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->cantMin }}</td>
                    <td>{{ $producto->estado }}</td>
                    <td>
                        @foreach ($pesos as $peso)
                            @if ($producto->id_Peso == $peso->id)
                                {{ $peso->gramos }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($tipos as $tipo)
                            @if ($producto->id_Tipo == $tipo->id)
                                {{ $tipo->nombre }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($categorias as $categoria)
                            @if ($producto->id_Cat == $categoria->id)
                                {{ $categoria->nombre }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
