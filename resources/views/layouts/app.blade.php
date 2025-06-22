<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Biblioteca Cubo')</title>
    <link rel="icon" href="{{ asset('img/CUBo.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
