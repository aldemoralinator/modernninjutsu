<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/images/yinyang-icon.png" type="image/gif" sizes="64x64" />
    <title>Ninpo</title>

    {{--  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">  --}}

    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/layouts.app.css" />
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css" />

    @yield('css')

</head>

<body>
    <div class="app-main-container">

        @yield('content')

    </div>

    @yield('script')
    
</body>
</html>
