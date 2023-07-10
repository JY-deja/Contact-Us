<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'L') }}</title> --}}
    <title>LOGIN & REGISTRE</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     {{-- ====================loginStyle==================== --}}
    <link rel="stylesheet" href="{{ url('css/login_registreStyle.css')}}">
     {{-- ====================resetPassword style==================== --}}
    <link rel="stylesheet" href="{{ url('css/styleReset.css')}}">
     {{-- ====================declare jquery==================== --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" defer></script>
    {{-- ====================loginContact file js==================== --}}
    <script src="{{ url('js/loginContact.js')}}" defer></script>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
        {{-- <main > --}}
            @yield('content')
        {{-- </main> --}}

</body>
</html>
