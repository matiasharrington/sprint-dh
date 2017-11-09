<?php
	include("INCLUDES/funciones.php");
	$email = $_GET["email"];
	$usuario = traerPorEmail($email);
?>

<?php include("INCLUDES/header.php"); ?>
	
		<div class="container">
			<div class="jumbotron" id="active-usr">Perfil de "<?=$usuario["nombre"]?>"</div>
			<div class="row usuario">
				<ul class="datos-usr">
					<li>Nombre: <?=$usuario["nombre"]?> </li>
					<li>Email: <?=$usuario["email"]?> </li>
					<li>Edad: <?=$usuario["edad"]?> </li>
					<li>Pais: <?=$usuario["pais"]?> </li>
				</ul>
			</div>
		</div>					
		<?php include("INCLUDES/footer.php"); ?>