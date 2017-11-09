<!DOCTYPE html>
<html>
	<head>
		<title>Planet Express</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../CSS/w3.css">
		<link rel="stylesheet" href="../CSS/bootstrap.min.css">
		<script src="../JS/jquery.min.js"></script>
		<script src="../JS/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	</head>
	<body>
		<header>
			<div id="topp"></div>		
			<div class="banner">
				<a href="home.php"><img src="../IMAGE/logo.png" alt="logotipo" class="logo"></a>
			</div>									
		</header>
		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>                  
      				</button>
      				<a class="navbar-brand"><img src="../IMAGE/background.png"></a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
      				<ul class="nav navbar-nav">
				        <li><a href="home.php">Home</a></li>
				        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos <span class="caret"></span></a>
          					<ul class="dropdown-menu">
          						<li><a href="productos.php">Pagina Principal</a></li><hr>
					            <li><a href="productos.php#1">Computacion</a></li>
					            <li><a href="productos.php#7">Celulares</a></li>
					            <li><a href="productos.php#9">Juegos</a></li>
          					</ul>
        				</li>
        				<li>
        					<a href="contacto.php">Contacto</a>
        				</li>
        				<li>
        					<a href="faq.php">FAQ</a>
        				</li>
				        <!--<li><a href="#">Page 2</a></li>
				        <li><a href="#">Page 3</a></li>-->
      				</ul>
      				<ul class="nav navbar-nav navbar-right">
      					<?php if(!estaLogueado()) :?>
					        <li>
					        	<a href="register.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a>
					        </li>
					        <li>
					        	<a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a>
					        </li>
					    <?php endif; ?>
					    <?php if (estaLogueado()) : ?>
					    	<li>
					    		<a href="editar.php">Editar</a>
					    	</li>
					    	<li>
					    		<a href="logout.php">Salir</a>
					    	</li>
					    	<li>
					    		<a href="miPerfil.php">Hola <?=obtenerUsuarioLogueado()["nombre"] ?></a>
					    	</li>
					    <?php endif; ?>
      				</ul>
    			</div>
  			</div>
		</nav>