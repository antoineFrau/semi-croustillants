<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background: #fff;
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>

<body>

    <div id="app">
        <!-- @yield('header') -->
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/bootstrap.js') }}"></script>
</body>

</html>