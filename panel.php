<?php
	include 'conexion.php';
	session_start();

	if(isset($_SESSION["id_usuario"])){
		if(isset($_POST["crear_web"]) && isset($_POST["nombre_web"])){
			$dominio = $_SESSION["id_usuario"] . $_POST["nombre_web"];

			$query = "SELECT  `idWeb` from `webs` where `dominio` like '$dominio'";
			$res = $con->query($query);

			if($res->fetch_array())
				header('Location: panel.php?alerta=EDYEEU');
			else{
				$query = "INSERT into `webs` (`idWeb`, `idUsuario`, `dominio`, `fechaCreacion`) values (null, '" . $_SESSION["id_usuario"] . "', '$dominio', CURRENT_TIMESTAMP);";
				$con->query($query);
				shell_exec('./wix.sh ../tuweb/' . $dominio . ' "Bienvenido a ' . $dominio . '"');
				shell_exec("chmod 777 ../tuweb/$dominio");
			}
		}
	}else
		header('Location: login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>WebGenerator</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<center>
		<h3>Bienvenido a tu panel</h3><br/>
		<a href="logout.php">Cerrar sesión de 
			<?php
				if(isset($_SESSION["admin"]) && $_SESSION["admin"])
					echo "admin";
				else
					echo $_SESSION["id_usuario"];
			?>
		</a>
		<div>
			<h4>Generar Web de:</h4>
			<form action="panel.php" method="POST" id="formulario">
				<input type="text" name="nombre_web" placeholder="Nombre de la web">
				<input type="submit" name="crear_web" value="Crear web">
			</form>
		</div>

		<div>
			<?php
				if(isset($_SESSION["admin"]) && $_SESSION["admin"])
					$query = "SELECT `dominio` from `webs`";
				else
					$query = "SELECT `dominio` from `webs` where `idUsuario` like '" . $_SESSION["id_usuario"] . "'";

				$resultado_query = $con->query($query);

				while($res = $resultado_query->fetch_array()){
					echo '<div><div class="item"><a href="../tuweb/'. $res["dominio"] .'">'. $res["dominio"] .'</a></div><div class="item"><a href="descargar_zip.php?dominio='. $res["dominio"] .'">descargar web</a></div></div>';
				}
			?>
		</div>
	</center>
</body>
</html>

<?php
	$con->close();
?>