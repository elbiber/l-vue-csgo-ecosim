<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSGO-Ecosim</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @if (env('APP_ENV')==='local')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @else
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        @endif

        <!-- Scripts -->
        @if (env('APP_ENV')==='local')
        <script src="{{ asset('js/app.js') }}" defer></script>
        @else
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        @endif
    </head>
    <body>
        <div id="app">
            <index></index>
        </div>
        {{-- <script src="{{ mix('js/bundle.js') }}"></script> --}}
    </body>
</html>
