<?php
	include("INCLUDES/funciones.php");

	if (!estaLogueado()) {
		header("Location:login.php");exit;
	}
	
	$usuario = obtenerUsuarioLogueado();
?>

<?php include("INCLUDES/header.php"); ?>

	<div class="container">
		<div class="jumbotron" id="active-usr">Perfil de <?=$usuario["nombre"]?></div>
		<ul class="datos-usr">
			<li>Nombre: <?=$usuario["nombre"]?> </li>
			<li>Email: <?=$usuario["email"]?> </li>
			<li>Edad: <?=$usuario["edad"]?> </li>
			<li>Pais: <?=$usuario["pais"]?> </li>
		</ul>
	</div>
			
				
			
		
<?php include("INCLUDES/footer.php"); ?>