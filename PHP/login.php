<?php 
	require_once("INCLUDES/funciones.php");

	if (estaLogueado()) {
		header("Location:home.php");exit;
	}

	if ($_POST) {
		$arrayDeErrores = validarLogin();

		if (count($arrayDeErrores) == 0) {
			loguear($_POST["email"]);

			if (isset($_POST["recordame"])) {
				setcookie("usuarioLogueado", $_POST["email"], time()+60*60*24*30);
			}

			header("Location:perfilDeUsuario.php?email=" . $_POST["email"]);
		}
	}
?>

<?php include("INCLUDES/header.php"); ?>
	
		<div class="container login">
			<?php if(isset($arrayDeErrores)) : ?>
				<div class="jumbotron" id="errores">
					<ul class="errores">
						<?php foreach ($arrayDeErrores as $error) : ?>
							<li>
								<?=$error?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-xs-12  col-sm-8 col-sm-offset-2  col-md-6 col-md-offset-3 login">
					<h1>Planet Express</h1>
					<form action="login.php" method="POST">
						<h3>Inicio de Sesion</h3>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="text" name="email">
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input class="form-control" type="password" name="password">
						</div>
						<div class="form-group">
							Recordame <input type="checkbox" name="recordame">
						</div>
						<div class="form-group">
							<button type="submit" class="w3-button w3-blue">Login</button>
						</div>
						<h4>¿No tiene una cuenta?</h4>
						<div id="crear-cuenta">
							<button onclick="window.open('register.php')" type="button" class="w3-button w3-blue">Crear una Cuenta</button>
						</div>
					</form>
				</div>
					
			</div>
		</div>
		<?php include("INCLUDES/footer.php"); ?>