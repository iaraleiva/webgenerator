<?php
	session_start();

	if(isset($_SESSION["id_usuario"]))
		header('Location: panel.php');
	else
		header('Location: login.php');
?>