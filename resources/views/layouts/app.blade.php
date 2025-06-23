<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Biblioteca Cubo')</title>
    <link rel="icon" href="{{ asset('img/CUBo.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.header')

    <main style="padding-top: 80px;"> <!-- para evitar que contenido toque el header -->
        @if (Request::is('/')) 
            {{-- Si es la ruta home, sin container --}}
            @yield('content')
        @else
            {{-- Para otras vistas con container --}}
            <div class="container">
                @yield('content')
            </div>
        @endif
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
