#!/bin/bash
echo "Ingrese nombre del nuevo proyecto, luego presione la tecla enter"
read pepe
opcion=" "
while [[ $opcion != "Vacio" && $opcion != "Estructura" && $opcion != "Ejemplo" && $opcion != "Salir" ]]; do
	select opcion in Vacio Estructura Ejemplo Salir
	do
		case $opcion in
			"Vacio")
			mkdir $pepe
			cd $pepe
			echo "<html>
 					<head>
 					 <title> Leiva </title>
	 				</head>
					 <body bgcolor=>
					  <p><font size="4">
 						  <?php 
  						  echo $nom
						  ?>
 					  </p></font>
					 </body>
				  </html>" | cat > index.php
			echo "Se creo el proyecto $pepe en blanco"
			cd ..
			;;
			"Estructura")
			mkdir $pepe
			cd $pepe
			echo "<html>
 					<head>
 					 <title> Leiva </title>
 					</head>
					 <body bgcolor=>
					  <p><font size="4">
 						  <?php 
  						  echo $pepe
					 	 ?>
	 				  </p></font>
					 </body>
				  </html>" | cat > index.php
			mkdir css
			cd css
			mkdir user
			mkdir admin
			cd ..
			mkdir img
			cd img
			mkdir avatars
			mkdir buttons
			mkdir products
			mkdir pets
			cd ..
			mkdir js
			cd js
			mkdir validations
			mkdir effects
			cd ..
			mkdir tpl
			mkdir php
			echo "Se creo el proyecto $pepe con estructura"
			cd ..
			;;
			"Ejemplo")
			mkdir $pepe
			cd $pepe
			echo "<html>
 					<head>
 					 <title> Leiva </title>
 					</head>
					 <body bgcolor=>
					  <p><font size="4">
 						  <?php 
  						  echo $pepe
						  ?>
 					  </p></font>
					 </body>
				  </html>" | cat > index.php
			mkdir css
			cd css
			mkdir user
			mkdir admin
			echo | cat > user/estilo.css
			echo | cat > admin/estilo.css
			cd ..
			mkdir img
			cd img
			mkdir avatars
			mkdir buttons
			mkdir products
			mkdir pets
			cd ..
			mkdir js
			cd js
			mkdir validations
			mkdir effects
			echo | cat > validations/login.js
			echo | cat > validations/register.js
			echo | cat > effects/panels.js
			cd ..
			mkdir tpl
			echo | cat > tpl/main.tpl
			echo | cat > tpl/login.tpl
			echo | cat > tpl/register.tpl
			echo | cat > tpl/panel.tpl
			echo | cat > tpl/profile.tpl
			echo | cat > tpl/crud.tpl
			mkdir php
			echo | cat > php/create.php
			echo | cat > php/read.php
			echo | cat > php/update.php
			echo | cat > php/delete.php
			echo | cat > php/dbconetc.php
			echo "Se creo el proyecto $pepe con ejemplos"
			cd ..
			;;
			"Salir")
			exit
			;;
		esac
	done
done