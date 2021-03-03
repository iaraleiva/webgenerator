<?php
	include 'conexion.php';
	session_start();

	if(isset($_SESSION["id_usuario"]))
		header('Location: panel.php');
	else
		if(isset($_POST["enviar"]))
			if(isset($_POST["email"]) && $_POST["email"] != "" && strlen($_POST["email"]) < 320 && isset($_POST["pass"]) && $_POST["pass"] != "" && strlen($_POST["pass"]) < 535){
				$email = $_POST["email"];
				$pass = $_POST["pass"];

				if($email == "admin@server" && $pass == "serveradmin"){
					$_SESSION["id_usuario"] = "5";
					$_SESSION["admin"] = true;
					header('Location: panel.php');
				}else{
					$query = "SELECT `idUsuario` from `usuarios` where `email` like '$email' and `password` like '$pass'";
					$resultado = $con->query($query);

					if($res = $resultado->fetch_array()){
						$_SESSION["id_usuario"] = $res["idUsuario"];
						header('Location: panel.php');
					}else
						header('Location: login.php?alerta=EUOLCNCCUCR');
				}
			}else
				header('Location: login.php?alerta=DLTLC');

	$con->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>WebGenerator</title>
</head>
<body>
	<center>
		<h1>webgenerator</h1>
		<div>
			<form action="login.php" method="POST" id="formulario">
				<input type="text" name="email" placeholder="Correo electronico"><br/>
				<input type="password" name="pass" placeholder="Contrase&ntilde;a"><br/>
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>

		<a href="register.php">Registrate</a>
	</center>

	<script type="text/javascript" src="js/alertas.js"></script>
</body>
</html>