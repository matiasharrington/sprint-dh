<?php
	require_once("INCLUDES/funciones.php");

	if (!estaLogueado()) {
		header("Location:home.php");exit;
	}

	$paises = [
		"Ar" => "Argentina",
		"Br" => "Brasil",
		"Co" => "Colombia"
	];

	$usuario = obtenerUsuarioLogueado();

	$nombreDefault = $usuario["nombre"];
	$emailDefault = $usuario["email"];
	$edadDefault = $usuario["edad"];
	
	if ($_POST) {
		$arrayDeErrores = validarEdicion($usuario["email"]);
		if (count($arrayDeErrores) == 0) {
			editarUsuario($usuario);
			header("Location:home.php");exit;
		}
	}
?>

<?php include("INCLUDES/header.php"); ?>

		<div class="container">
			<?php if(isset($arrayDeErrores)) : ?>
				<div class="jumbotron" id="errores">
					<ul class="errores">
						<?php foreach($arrayDeErrores as $error) : ?>
							<li>
								<?=$error?>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			<?php endif; ?>
			
			<div class="row">
				<div class="col-xs-12  col-sm-8 col-sm-offset-2  col-md-6 col-md-offset-3 login">
					<h1>Edita tu Perfil de <strong> Planet Express</strong></h1>
					<form method="POST" action="editar.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nombre:</label>
							<input class="form-control" type="text" name="nombre" value="<?=$nombreDefault?>">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input class="form-control" type="text" name="email" value="<?=$emailDefault?>">
						</div>
						<div class="form-group">
							<label>Edad:</label>
							<input class="form-control" type="text" name="edad" value="<?=$edadDefault?>">
						</div>
						<div class="form-group">
							<label>Password anterior:</label>
							<input class="form-control" type="password" name="oldpassword">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input class="form-control" type="password" name="password">
						</div>
						<?php if(isset($_GET["versionCorta"]) == false) : ?>
							<div class="form-group">
								<label>Confirmar Contraseña:</label>
								<input class="form-control" type="password" name="cpassword">
							</div>
						<?php endif; ?>
						<?php if (count($paises) > 0) : ?>
							<div class="form-group">
								<label>Pais:</label>
								<select name="pais">
									<?php foreach ($paises as $key => $pais) : ?>
										<?php if ($key == $usuario["pais"]) : ?>
											<option value="<?=$key?>" selected>
												<?=$pais?>
											</option>
										<?php else: ?>
											<option value="<?=$key?>">
												<?=$pais?>
											</option>
										<?php endif; ?>
										
									<?php endforeach; ?>

								</select>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>		
		<?php include("INCLUDES/footer.php"); ?>