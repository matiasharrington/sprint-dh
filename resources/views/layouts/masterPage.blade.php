<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>
	    	@yield('titulo')
	    </title>

		<link rel="stylesheet" href="/css/styles.css">
        <link rel="shortcut icon" href="/image/favicon.ico">
	</head>
	<body>
		<header>	
			<div id="banner">
				<a href="/home"><img src="/image/logo.png" alt="logo" class="logo"></a>
			</div>									
		</header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a href="/home" class="navbar-brand">
                        <img src="/image/background.png" alt="mini-logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/productos">Pagina Principal</a></li>
                                <li><a href="/productos/informatica">Informatica</a></li>
                                <li><a href="/productos/celulares">Celulares</a></li>
                                <li><a href="/productos/juegos">Juegos</a></li>
                                <li><a href="/productos/electrodomesticos">Electrodomesticos</a></li>
                                <li><a href="/productos/multimedia">Multimedia</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/contacto">Contacto</a>
                        </li>
                        <li>
                            <a href="/faq">FAQ</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
                            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                        @else
                            <li><a href="/carrito" id="shop-cart"><img src="/image/shop-cart.png" alt="carrito"> Carrito</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" id="perfil-activo">
                                    <img src="/avatars/{{Auth::user()->avatar}}" id="mini-avatar">
                                    {{ Auth::user()->nickname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/home" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-in"></span>
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/profile">
                                            <span class="glyphicon glyphicon-user"></span>
                                            Perfil
                                        </a>
                                    </li>
                                    @if (Auth::user()->type == 1)
                                        <li>
                                            <a href="/agregarProducto">Agregar Producto</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endguest
                        <form class="navbar-form navbar-left" action="buscador" method="GET">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar" name="buscador">
                            <div class="input-group-btn">
                              <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

	    @yield('contenido')

		<footer class="navbar navbar-inverse">
			<ul>
				<li>
					<a href="http://www.facebook.com" target="_blank" id="icon-face"><img src="/image/facebook.png"> Facebook</a>
				</li>
				<li>
					<a href="http://www.instagram.com" target="_blank" id="icon-insta"><img src="/image/instagram.png"> Instagram</a>
				</li>
				<li>
					<a href="http://www.twitter.com" target="_blank" id="icon-twitt"><img src="/image/twitter.png"> Twitter</a>
				</li>
			</ul>
            <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
			<h6 id="copyright">Copyright &copy; 2017 Plantex Express SA Todos los derechos reservados</h6>
            <h6><a href="https://github.com/matiasharrington/sprint-dh/blob/master/readme.md">Disclaimer</a></h6>	
		</footer>
	    <!-- Scripts -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
	    <script type="text/javascript">
            $(document).ready(function(){
                 $(window).scroll(function () {
                        if ($(this).scrollTop() > 150) {
                            $('#back-to-top').fadeIn();
                        } else {
                            $('#back-to-top').fadeOut();
                        }
                    });
                    // scroll body to 0px on click
                    $('#back-to-top').click(function () {
                        $('#back-to-top').tooltip('hide');
                        $('body,html').animate({
                            scrollTop: 0
                        }, 800);
                        return false;
                    });
                    $('#back-to-top').tooltip('show');
            });
		</script>
	</body>
</html>
