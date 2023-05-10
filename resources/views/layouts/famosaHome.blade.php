<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Home</title>
        <meta name="format-detection" content="telephone=no" />
        <meta
        name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
        />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8" />
        <link rel="icon" href="images/icono famosa.png" type="image/x-icon" />
        <!-- Stylesheets-->
        <link
        rel="stylesheet"
        type="text/css"
        href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500"
        />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>

        <div class="preloader">
            <div class="wrapper-triangle">
              <div class="pen">
                <div class="line-triangle">
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                </div>
                <div class="line-triangle">
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                </div>
                <div class="line-triangle">
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                  <div class="triangle"></div>
                </div>
              </div>
            </div>
          </div>


        <div class="page">
            @guest
                @include('components.header')
            @endguest
            @auth
                @include('components.headerA')
            @endauth
            @yield('content')
            @include('components.footer')
        </div>


        <!--===============================================================================================-->
        <div class="snackbars" id="form-output-global"></div>
        <!-- Javascript-->
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
