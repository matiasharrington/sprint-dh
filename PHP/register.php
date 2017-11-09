<?php
	require_once("INCLUDES/funciones.php");
	if (estaLogueado()) {
		header("Location:home.php");exit;
	}
	$paises = [
		"Ar" => "Argentina",
		"Br" => "Brasil",
		"Co" => "Colombia"
	];
	$nombreDefault = $_POST ? $_POST["nombre"] : "";
	$emailDefault = $_POST ? $_POST["email"] : "";
	$edadDefault = $_POST ? $_POST["edad"] : "";
	if ($_POST) {
		$arrayDeErrores = validarInformacion();
		if (count($arrayDeErrores) == 0) {
			$usuario = armarUsuario($_POST);
			guardarUsuario($usuario);
			$nombreArchivo = $_FILES["avatar"]["name"];
			$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
			$nombre =  "../PERFILES/IMAGE" . $_POST["email"] . ".$extension"; 
			$archivo = $_FILES["avatar"]["tmp_name"];
			move_uploaded_file($archivo, $nombre);
			header("Location:login.php");exit;
		}
	}
?>
<?php include("INCLUDES/header.php"); ?>
	
		<div class="container register">
				<?php if(isset($arrayDeErrores)) : ?>
					<div class="jumbotron" id="errores">
						<ul class="errores">
							<?php foreach ($arrayDeErrores as $error) : ?>
								<li class="">
									<?=$error?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			<div class="row">
				<div class="col-xs-12  col-sm-8 col-sm-offset-2  col-md-6 col-md-offset-3 login">
					<h1>Registrate a <strong> Planet Express</strong></h1>
					<form action="register.php" method="POST" enctype="multipart/form-data" value="">
						<div class="form-group">
							<label>Nombre</label><br>
							<input class="form-control" type="text" name="nombre" value="">
						</div>
						<div class="form-group">
							<label>Correo</label>
							<input class="form-control" type="text" name="email" value="<?=$emailDefault?>">
						</div>
						<div class="form-group">
							<label>Edad</label>
							<input class="form-control" type="text" name="edad" value="<?=$edadDefault?>">
						</div>
						<?php if (count($paises) > 0) : ?>
							<div class="form-group">
								<label>Pais</label><br>
								<select name="pais" class="form-control">
									<?php foreach ($paises as $key => $pais) : ?>
										<?php if ($key == $_POST["pais"]) : ?>
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
							<label>Contraseña</label>
							<input class="form-control" type="password" name="password">
						</div>
						<?php if(isset($_GET["versionCorta"]) == false) : ?>
							<div class="form-group">
								<label>Confirmar Contraseña</label>
								<input class="form-control" type="password" name="cpassword">
							</div>
						<?php endif; ?>
						<div class="tyc-conf">
							<label><a href="tyc.php">Terminos y Condiciones</a></label>
							<input type="checkbox" name="terminos">
						</div>
						<div>
							<label>Avatar</label>
							<input type="file" name="avatar">
						</div>
						<div id="registrar">
							<button type="submit" class="w3-button w3-blue">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php include("INCLUDES/footer.php"); ?>
		
	