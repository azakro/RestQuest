<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RestQuest</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <!-- Semantic UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css"></link>
    <!-- Styles -->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('newFavicon.ico') }}}">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/paper-full.min.js') }}"></script>
    <script type="text/paperscript" src="{{ asset('js/paperScript.js') }}" canvas="myCanvas"></script>

</head>
<body>
    @yield('content')
</body>
</html>