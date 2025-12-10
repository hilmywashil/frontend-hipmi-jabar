<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ekatalog.css') }}">
</head>

<body>

    @include('layouts.components.header')

    @yield('content')

    @include('layouts.components.footer')

    @include('layouts.components.footer-after')
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>