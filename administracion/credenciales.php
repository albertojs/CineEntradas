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
	echo "error al recibir los par�metros";
	
	// Existen los par�metros; lo que haremos ser� buscar en la base de datos el usuario
	// y la contrase�a, valid�ndolo con un rango de usuario en caso de existir.
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
		
	// O S� lo encontramos
	else
		{
			// Hemos encontrado al usuario
			$row = mysql_fetch_row($res);

			// Guardamos lo importante en variables de sesion
			$_SESSION["id"]= $row[0];
			$_SESSION["nombre"]= $row[1];
			$_SESSION["rango"]= $row[3];
			// Me cargas la p�gina de administraci�n total
			header("Location: admin.php");
				
		}
			
	}
?>