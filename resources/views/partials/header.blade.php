<header>
    <nav class="flex justify-between items-center p-4 bg-gray-900 text-white">
        <!-- Logo -->
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/CUBOLogoColor.png') }}" alt="Biblioteca Cubo" style="height: 70px;">
            </a>
        </div>

        <!-- Navegación -->
        <ul class="flex gap-6 items-center">
            @auth('usuario')
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-400">Inicio</a></li>
                
                <li>
                    <a href="#" class="hover:text-green-400 flex items-center gap-1">
                        <i class="fas fa-user"></i>
                        Mi Perfil
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:text-red-400" 
                       onclick="event.preventDefault(); document.getElementById('logout-admin-form').submit();">
                        Cerrar Sesión
                    </a>
                    <form id="logout-admin-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @elseif(auth('cliente')->check())
                <li><a href="{{ route('home') }}" class="hover:text-green-400">Inicio</a></li>
                <li><a href="{{ route('cliente.libros') }}" class="hover:text-green-400">Libros</a></li>
                <li><a href="#" class="hover:text-green-400">Nuevas Publicaciones</a></li>
                <li>
                    <a href="{{ route('cliente.perfil') }}" class="hover:text-green-400 flex items-center gap-1">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:text-red-400" 
                       onclick="event.preventDefault(); document.getElementById('logout-cliente-form').submit();">
                        Cerrar Sesión
                    </a>
                    <form id="logout-cliente-form" action="{{ route('cliente.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li><a href="{{ route('cliente.showLogin') }}" class="hover:text-green-400">Iniciar Sesión</a></li>
                <li><a href="{{ route('cliente.showRegister') }}" class="text-green-500 font-semibold hover:text-green-400">Registro</a></li>
                <li><a href="#que-es-cubo" class="hover:text-green-400">¿Qué es CUBO?</a></li>
                <li><a href="#galeria" class="hover:text-green-400">Galería</a></li>
            @endauth
        </ul>
    </nav>
</header>