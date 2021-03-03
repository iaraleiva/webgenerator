<?php
	include 'conexion.php';
	session_start();

	if(isset($_SESSION["id_usuario"])){
		if(isset($_GET["dominio"])){
			$dominio = $_GET["dominio"];
			$query = "SELECT `idWeb` from `webs` where `idUsuario` like '" . $_SESSION["id_usuario"] . "' and `dominio` like '$dominio'";
			$res = $con->query($query);
			if($res->fetch_array()){
				shell_exec("zip -r $dominio.zip ../tuweb/$dominio");
				header("Content-disposition: attachment; filename=$dominio.zip");
				header("Content-type: application/zip");
				readfile("$dominio.zip");
				shell_exec("rm -R $dominio.zip");
			}else
				header('Location: panel.php');
		}else
			header('Location: panel.php');
	}else
		header('Location: login.php');
?>