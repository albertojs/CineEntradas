<?php

	// Iniciamos la sesion, bases de datos, etc.
	session_start();
	include '../library/config.php';
	include '../library/opendb.php';
	
// Lo primero que hago es captar las variables del login y el password
$nombre=$_GET['nombre'];
$password=$_GET['password'];

// Si no existen, visualizo un error
if (!isset ($_GET['nombre']) || !isset ($_GET['password']))
	echo "error al recibir los parámetros";
	
	// Existen los parámetros; lo que haremos será buscar en la base de datos el usuario
	// y la contraseña, validándolo con un rango de usuario en caso de existir.
else 
	{
	// Lanzamos la Query
	$administradores="administradores";
	$sentencia = "SELECT * FROM $dbname.$dbpref$administradores WHERE nombre = '$nombre' AND password = '$password'";
	$res = mysql_query($sentencia);
	$filas = mysql_num_rows($res);
	
	// No Encontramos el usuario
	if ($filas != 1)
		echo "No Hay usuario";
		
	// O SÍ lo encontramos
	else
		{
			// Hemos encontrado al usuario
			$row = mysql_fetch_row($res);

			// Guardamos lo importante en variables de sesion
			$_SESSION["id"]= $row[0];
			$_SESSION["nombre"]= $row[1];
			$_SESSION["rango"]= $row[3];
			// Me cargas la página de administración total
			header("Location: admin.php");
				
		}
			
	}
?>