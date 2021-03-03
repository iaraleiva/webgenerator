<?php
	include 'conexion.php';
	session_start();

	if(isset($_SESSION["id_usuario"]))
		header('Location: panel.php');
	else
		if(isset($_POST["enviar"]))
			if(isset($_POST["email"]) && $_POST["email"] != "" && strlen($_POST["email"]) < 320 && isset($_POST["pass"]) && $_POST["pass"] != "" && strlen($_POST["pass"]) < 535 && isset($_POST["pass_rep"]) && $_POST["pass_rep"] != "" && strlen($_POST["pass_rep"]) < 535){
				$email = $_POST["email"];
				$pass = $_POST["pass"];
				$pass_rep = $_POST["pass_rep"];

				if($pass == $pass_rep){
					$query = "SELECT `idUsuario` from `usuarios` where `email` like '$email'";
					$res = $con->query($query);
					if($res->fetch_array())//email ya esta registrado
						header('Location: register.php?alerta=EYEELBDD');
					else{
						$query = "INSERT into `usuarios` (`idUsuario`, `email`, `password`, `fechaRegistro`) values (null, '$email', '$pass', CURRENT_TIMESTAMP);";
						$con->query($query);
						header('Location: login.php?alerta=RE');
					}
				}else//las contraseñas no coinciden
					header('Location: register.php?alerta=LCNC');
			}else
				header('Location: register.php?alerta=DLTLC');

	$con->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>WebGenerator</title>
</head>
<body>
	<center>
		<h3>Registrate</h3>
		<div>
			<form action="register.php" method="POST" id="formulario">
				<input type="text" name="email" placeholder="Correo electronico"><br/>
				<input type="password" name="pass" placeholder="Contrase&ntilde;a"><br/>
				<input type="password" name="pass_rep" placeholder="Repetir contrase&ntilde;a"><br/>
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>

		<a href="login.php">Inicia sesion</a>
	</center>

	<script type="text/javascript" src="js/alertas.js"></script>
</body>
</html>