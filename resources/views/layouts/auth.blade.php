<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
        <link
        rel="stylesheet"
        type="text/css"
        href="vendor/bootstrap/css/bootstrap.min.css"
        />
        <!--===============================================================================================-->
        <link
        rel="stylesheet"
        type="text/css"
        href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
        />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
        <!--===============================================================================================-->
        <link
        rel="stylesheet"
        type="text/css"
        href="vendor/css-hamburgers/hamburgers.min.css"
        />
        <!--===============================================================================================-->
        <link
        rel="stylesheet"
        type="text/css"
        href="vendor/select2/select2.min.css"
        />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div>
            @yield('content')
        </div>


        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script>
        $(".js-tilt").tilt({
            scale: 1.1,
        });
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>
</html>
