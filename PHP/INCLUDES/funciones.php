<?php
	
	session_start();

	$dsn = "mysql:host=localhost;port=3306;dbname=reglog";
	$user = "root";
	$pass = "";

	$conn = new PDO($dsn, $user, $pass);

	if (isset($_COOKIE["usuarioLogueado"]) && !estaLogueado()) {
		loguear($_COOKIE["usuarioLogueado"]);
	}
	function validarLogin() {
		$arrayDeErrores = [];
		if ($_POST["email"] == "") {
			$arrayDeErrores["email"] = "Ingrese un Correo (REQUERIDO)";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$arrayDeErrores["email"] = "Formato de correo invalido";	
		}
		else if (traerPorEmail($_POST["email"]) == null) {
			$arrayDeErrores["email"] = "El correo no esta en la base";
		}
		else {
			$usuario = traerPorEmail($_POST["email"]);
			if (password_verify($_POST["password"], $usuario["password"]) == false) {
				$arrayDeErrores["password"] = "Las contraseñas no coinciden";
			}
		}
		return $arrayDeErrores;
	}
	function validarInformacion() {
		$arrayDeErrores = [];
		$nombreArchivo = $_FILES["avatar"]["name"];
		$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
		if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
			$arrayDeErrores["avatar"] = "No se subio un Avatar (REQUERIDO)";
		}
		else if ($extension != "jpg" && $extension != "jpeg" && $extension != "gif" && $extension != "png") {
			$arrayDeErrores["avatar"] = "El Avatar no tiene un formato valido (JPG, JPEG, GIF o PNG)";
		}
		if ($_POST["nombre"] == "") {
			$arrayDeErrores["nombre"] = "No se ingreso un nombre (REQUERIDO)";
		}
		if ($_POST["email"] == "") {
			$arrayDeErrores["email"] = "Ingrese un correo (REQUERIDO)";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$arrayDeErrores["email"] = "El formato del Mail es invalido";	
		}
		else if (traerPorEmail($_POST["email"]) != null) {
			$arrayDeErrores["email"] = "El mail esta repetido";		
		}
		if (is_numeric($_POST["edad"]) == false) {
			$arrayDeErrores["edad"] = "Edad minima 18 (REQUERIDO)";	
		}
		if (strlen($_POST["password"]) < 6) {
			$arrayDeErrores["password"] = "Contraseña invalida  o no Ingresada (MINIMO 6 CARACTERES)";	
		} 
		else if ($_POST["password"] != $_POST["cpassword"]) {
			$arrayDeErrores["password"] = "Las contraseñas no coinciden";
		}
		if (isset($_POST["terminos"]) == false) {
			$arrayDeErrores["terminos"] = "Acepte los terminos y condiciones (REQUERIDO)";
		}
		return $arrayDeErrores;
	}
	function validarEdicion($emailActual) {
		$arrayDeErrores = [];

		if ($_POST["nombre"] == "") {
			$arrayDeErrores["nombre"] = "Ingrese un nombre Valido (REQUERIDO)";
		}

		if ($_POST["email"] == "") {
			$arrayDeErrores["email"] = "No se ingreso ningun Mail (REQUERIDO)";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$arrayDeErrores["email"] = "El formato del Mail es invalido";	
		}
		else if (traerPorEmail($_POST["email"]) != null && $_POST["email"] != $emailActual) {
			$arrayDeErrores["email"] = "El mail esta repetido";		
		}

		$usuario = traerPorEmail($emailActual);

		if (password_verify($_POST["oldpassword"], $usuario["password"]) == false) {
			$arrayDeErrores["password"] = "La contraseña anterior no coincide";
		}

		if (is_numeric($_POST["edad"]) == false) {
			$arrayDeErrores["edad"] = "Edad minima 18 (REQUERIDO)";	
		}

		if (strlen($_POST["password"]) < 6) {
			$arrayDeErrores["password"] = "Contraseña invalida  o no Ingresada (MINIMO 6 CARACTERES)";	
		} 
		else if ($_POST["password"] != $_POST["cpassword"]) {
			$arrayDeErrores["password"] = "Las contraseñas no Coinciden";
		}

		
		return $arrayDeErrores;
	}
	function armarUsuario($informacion) {
		return [
			"nombre" => $informacion["nombre"],
			"email" => $informacion["email"],
			"password" => password_hash($informacion["password"], PASSWORD_DEFAULT),
			"edad" => $informacion["edad"],
			"pais" => $informacion["pais"]
		];
	}
	/* JSON
	function guardarUsuario($usuario) {
		$json = json_encode($usuario);
		file_put_contents("usuarios.json", $json . PHP_EOL, FILE_APPEND);
	}
	*/
	function guardarUsuario(&$usuario) {
		global $conn;

		$sql = "Insert into usuarios values (default, :nombre, :email, :password, :edad, :pais);";

		$query = $conn->prepare($sql);

		$query->bindValue(":nombre", $usuario["nombre"]);
		$query->bindValue(":email", $usuario["email"]);
		$query->bindValue(":password", $usuario["password"]);
		$query->bindValue(":edad", $usuario["edad"]);
		$query->bindValue(":pais", $usuario["pais"]);

		$query->execute();

		$usuario["id"] = $conn->lastInsertId();
	}
	/* JSON
	function traerTodosLosUsuarios() {
		$archivo = fopen("usuarios.json", "r");
		$linea = fgets($archivo);
		$usuarios = [];
		while($linea != false) {

			$array = json_decode($linea, true);
			$usuarios[] = $array;

			$linea = fgets($archivo);
		}
		return $usuarios;
	}
	*/
	function traerTodosLosUsuarios() {
		global $conn;
		$sql = "Select * from usuarios";

		$query = $conn->prepare($sql);

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	/* JSON
	function traerPorEmail($email) {
		$archivo = fopen("usuarios.json", "r");
		$linea = fgets($archivo);
		while($linea != false) {
			$array = json_decode($linea, true);
			
			if ($array["email"] == $email) {
				return $array;
			}
			$linea = fgets($archivo);
		}
		return null;
	}
	*/
	function traerPorEmail($email) {
		global $conn;
		$sql = "Select * from usuarios where email = :email";

		$query = $conn->prepare($sql);

		$query->bindValue(":email", $email);

		$query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	function loguear($email) {
		$_SESSION["usuarioLogueado"] = $email;
	}
	function estaLogueado() {
		if (isset($_SESSION["usuarioLogueado"])) {
			return true;
		}
		else {
			return false;
		}
	}
	function logout() {
		session_destroy();
		setcookie("usuarioLogueado", "", -1);
	}
	function obtenerUsuarioLogueado() {
		if (estaLogueado()) {
			$email = $_SESSION["usuarioLogueado"];
			return traerPorEmail($email);
		} else {
			return null;
		}
	}
	function editarUsuario($usuario) {
		global $conn;

		$sql = "UPDATE usuarios set email = :email, nombre = :nombre, password = :password, edad = :edad, pais = :pais WHERE id = :id;";

		$query = $conn->prepare($sql);

		$query->bindValue(":nombre", $_POST["nombre"]);
		$query->bindValue(":email", $_POST["email"]);
		$query->bindValue(":password", password_hash($_POST["password"], PASSWORD_DEFAULT));
		$query->bindValue(":edad", $_POST["edad"]);
		$query->bindValue(":pais", $_POST["pais"]);
		$query->bindValue(":id", $usuario["id"]);
		
		$query->execute();
	}
?>