<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ModernForniture</title>

    <!-- Scripts -->
    <script src="{{secure_asset() ('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/apphome.css') }}" rel="stylesheet">
</head>
<body>

<div id="menu">
    <div id="iconomenu">

        <li><img src="/imagenes/iconos/menu.png" id="imgmenu" alt="Icono para abrir el menu" />
            <ul>
                <li><a href="{{ url('admin/admin_home') }}">Inicio</a></li>
                <li><a href="{{ url('admin_ofertas') }}">Oferta</a></li>
                <li><a href="{{ url('admin_novedades') }}">Novedades</a></li>
                <li><a href="{{ url('admin_armarios') }}">Armarios</a></li>
                <li><a href="{{ url('admin_librerias') }}">Librerias</a></li>
                <li><a href="{{ url('admine_stanterias') }}">Estanterias</a></li>
                <li><a href="{{ url('admin_escritorios') }}">Escritorios</a></li>
                <li><a href="{{ url('admin_comodas') }}">Comodas</a></li>
                <li><a href="{{ url('admin_mesas') }}">Mesas</a></li>
                <li><a href="{{ url('admin_sillones') }}">Sillones</a></li>
                <li><a href="{{ url('admin_sillas') }}">Sillas</a></li>
                <li><a href="{{ url('admin_sofas') }}">Sofas</a></li>
                <li><a href="{{ url('admin_camas') }}">Camas</a></li>
                <li><a href="{{ url('admin_taburetes') }}">Taburetes</a></li>
                <li><a href="{{ url('admin_lamparas') }}">Lamparas</a></li>
            </ul>
        </li>


    </div>
    <div>
        <li>
            <a href="{{ url('admin/admin_home') }}"><img src="/imagenes/logo.png" id="imglogo"  alt="logo de la pagina web"  /></a>
        </li>
    </div>

    <!--SEARCH FORM --->
    <div>
        <form  role="search" action="{{url('admin_search')}}">
            <div class="form-group">
                <input type="search" id="searchinput" name='search' placeholder="Buscar" />
                <button type="submit" class="btn btn-default"><img  id="imgbuscar" src="/imagenes/iconos/lupa.png"></button>
            </div>

        </form>


    </div>




    <div>

    <!---  <a class="nav-link" href="{{ route('login') }}"><img src="imagenes/iconos/perfil2.png" id="imguser" alt="Icono de usuario" /></a> --->
        @guest

            <ul class="menulogin">
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar') }}</a>
                    </li>
                </div>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.index') }}">
                                {{ __('Mi perfil') }}
                            </a>

                                <a class="dropdown-item"  href="{{route('producto.create')}}">
                                {{ __('Crear producto') }}
                            </a>


                                <a class="dropdown-item" href="{{url('products_admin')}}">
                                    {{ __('Ver productos') }}
                                </a>



                                <a class="dropdown-item" href="{{ route('admin.users') }}">
                                {{ __('Ver usuarios') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
            </ul>

        @endguest
    </div>


    <div> <img src="/imagenes/iconos/carrito.png" id="imgcarro" alt="Icono del carrito" /></div>


</div>


<main class="py-4">
    @yield('content')
</main>

</body>
</html>
