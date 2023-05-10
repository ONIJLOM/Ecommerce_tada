<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Administradores</title>

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

    <h2>USUARIOS - ADMINISTRADORES</h2>
    <table class="table table-striped mt-2">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CI</th>
                <th>Sexo</th>
                <th>Telefono</th>
                <th>Domicilio</th>
                <th>Estado</th>
                <th>Email</th>
                <th> Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($administradores as $administrador)
                <tr>
                    <td>{{ $administrador->id }}</td>
                    <td>{{ $administrador->name }}</td>
                    <td>{{ $administrador->ci }}</td>
                    <td>{{ $administrador->sexo }}</td>
                    <td>{{ $administrador->telefono }}</td>
                    <td>{{ $administrador->domicilio }}</td>
                    <td>{{ $administrador->estado }}</td>
                    <td>{{ $administrador->email }}</td>
                    <td>
                        @if (!empty($administrador->getRoleNames()))
                            @foreach ($administrador->getRoleNames() as $rolname)
                                <span>{{ $rolname }}</span>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
