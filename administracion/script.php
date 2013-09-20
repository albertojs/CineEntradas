<?php 
// No Existe el Botón Enviar
if (!isset ($_GET['Submit'])){
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Instalación de Entradas de Cine v. 0.3</title>
</head>
<link href='../css/cssadmin.css' rel='stylesheet' type='text/css'>
<body onload="document.form.host.focus()">

<?php
echo '<table width="75%"  border="0" align="center" cellspacing="5">' .
		'<tr>' .
		'<td width="40%"><div align="center"><img src="../imagenes/logo.gif" width="80" height="50"></div></td>' .
		'<td width="10%"></td>' .
		'<td width="40%"><center><h3>ENTRADAS DE CINE</h3><h4>Instalación</h4></center></td>' .
		'</tr>' .
		'</table>' .
		'<hr width="52%" align="center">';
?>

<form name="form" method="GET" action="">
  <table width="50%"  border="0" align="center" cellspacing="5">
    <tr>
      <th width="45%"><div align="right">Host</div></th>
      <td width="10%">&nbsp;</td>
      <td width="45%"><input type="text" name="host" value="localhost"></td>
    </tr>
    <tr>
      <th><div align="right">Nombre de la BBDD </div></th>
      <td></td>
      <td><input type="text" name="name" value="cine"></td>
    </tr>    <tr>
      <th><div align="right">Usuario</div></th>
      <td></td>
      <td><input type="text" name="user" value="root"></td>
    </tr>    <tr>
      <th><div align="right">Password</div></th>
      <td></td>
      <td><input type="text" name="pass"></td>
    </tr>    <tr>
      <th><div align="right">Prefijo de las Tablas </div></th>
      <td></td>
      <td><input type="text" name="prefijo"></td>
    </tr>    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" name="Submit" value="Continuar"></td>
      <td></td>
    </tr>  

  </table>
</form>
<div align="center"><h5>Rellene el formulario con los datos de su Base de Datos MySQL y pulse el bot&oacute;n Continuar</h5></div>
</body>
</html>	

<?php
}//No existe el botón Enviar
?>



<?php
		// Si existe el botón ENVIAR
		if (isset ($_GET['Submit']))
			{
			// Cogemos todos los GETS mandados
			$dbhost = $_GET['host'];
			$dbname = $_GET['name'];
			$dbuser = $_GET['user'];
			$dbpass = $_GET['pass'];
			$dbprefijo = $_GET['prefijo'];
			
			// Conectamos a MySQL
			$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error conectando al servidor MySQL');
			// Seleccionamos la BBDD que vamos a utilizar
			mysql_select_db($dbname);	
				
				if ($_GET['borrar'] == 'borrar')
					{
					mysql_query('DROP DATABASE IF EXISTS '.$dbname);
					mysql_query('CREATE DATABASE '.$dbname);
					echo "Base de datos $dbname creada.";
					}
				else
					echo "Base de datos $dbname estaba ya creada";


			// Tabla que contiene las diversas formas de pago
			$fdp='formas_de_pago';

			$query = "DROP TABLE IF EXISTS $dbname.$dbpref$fdp";
			$result = mysql_query($query) or die('Error al borrar la tabla de Formas de Pago');

			$query = "CREATE TABLE $dbname.$dbpref$fdp (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50) UNIQUE NOT NULL)";
			echo $query;
			$result = mysql_query($query) or die('Error al crear la tabla de Formas de Pago');


			// Tabla con las Películas
			$peliculas = 'peliculas';

			$query = "DROP TABLE IF EXISTS $dbname.$dbpref$peliculas";
			$result = mysql_query($query) or die('Error al borrar la tabla de Películas');			

			$query = "CREATE TABLE $dbname.$dbpref$peliculas (id INT AUTO_INCREMENT PRIMARY KEY,titulo VARCHAR(100),imagen VARCHAR(50),content MEDIUMBLOB,size INT,tipo VARCHAR(35),descripcion VARCHAR(1024),genero ENUM('Ciencia Ficción','Terror','Drama','Musical','Dibujos Animados','Adultos'),duracion INT)";
			$result = mysql_query($query) or die('Error al crear la tabla de Películas');


			// Creo la tabla provincias con todos sus valores
			$provincias='provincias';

			$query = "DROP TABLE IF EXISTS $dbname.$dbpref$provincias";
			$result = mysql_query($query) or die('Error al borrar la tabla de provincias');

			$query = "CREATE TABLE $dbname.$dbpref$provincias(id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50))";
			$result = mysql_query($query) or die('Error al crear la tabla de provincias');

			$query = "INSERT INTO $dbname.$dbpref$provincias (nombre) values('Álava'),('Albacete'),('Alicante'),('Almería'),('Asturias'),('Ávila'),('Badajoz'),('Barcelona'),('Burgos'),('Cáceres'),('Cádiz'),('Cantabria'),('Castellón'),('Ciudad Real'),('Córdoba'),('Cuenca'),('Gerona'),('Granada'),('Guadalajara'),('Guipúzcoa'),('Huelva'),('Huesca'),('Islas Baleares'),('Jaén'),('La Coruña'),('La Rioja'),('Las Palmas'),('León'),('Lérida'),('Lugo'),('Madrid'),('Málaga'),('Murcia'),('Navarra'),('Orense'),('Palencia'),('Pontevedra'),('Salamanca'),('Santa Cruz de Tenerife'),('Segovia'),('Sevilla'),('Soria'),('Tarragona'),('Teruel'),('Toledo'),('Valencia'),('Valladolid'),('Vizcaya'),('Zamora'),('Zaragoza')";
			$result = mysql_query($query) or die('Error al insertar los valores en la tabla provincias');


			// Seguimos con localidades
			$localidades='localidades';

			$query = "DROP TABLE IF EXISTS $dbname.$dbpref$localidades";
			$result = mysql_query($query) or die('Error al borrar la tabla de localidades');

			$query = "CREATE TABLE $dbname.$dbpref$localidades(id INT AUTO_INCREMENT PRIMARY KEY,id_provincia INT NOT NULL,nombre VARCHAR(50) NOT NULL,CONSTRAINT FOREIGN KEY (id_provincia) REFERENCES provincias(id),CONSTRAINT UNIQUE (id_provincia,nombre))";
			$result = mysql_query($query) or die('Error al crear la tabla de localidades');


			//Empezamos con la tabla de Administradores
			$administradores='administradores';
			
			$query = "DROP TABLE IF EXISTS $dbname.$dbpref$administradores";
			$result = mysql_query($query) or die('Error al borrar la tabla de administradores');

			$query = "CREATE TABLE $dbname.$dbpref$administradores (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(20) UNIQUE,password VARCHAR(32) UNIQUE,rango INT)";
			$result = mysql_query($query) or die('Error al crear la tabla de localidades');
			
			$query = "INSERT INTO $dbname.$dbpref$administradores (nombre,password,rango) VALUES ('admin','f6fdffe48c908deb0f4c3bd36c032e72',1)";
			$result = mysql_query($query) or die('Error al insertar los valores en la tabla administradores');


			// Tabla con los cines
			$cines = 'cines';

			$query = "DROP TABLE IF EXISTS $dbname.$dbpref$cines";
			$result = mysql_query($query) or die('Error al borrar la tabla de Cines');

			$query = "CREATE TABLE $dbname.$dbpref$cines (id INT AUTO_INCREMENT PRIMARY KEY,id_localidad INT NOT NULL,nombre VARCHAR(100) NOT NULL,direccion VARCHAR(100),telefono VARCHAR(10),fax VARCHAR(10),metro VARCHAR(35),autobuses VARCHAR(35),web VARCHAR(50),precio FLOAT,propietario INT NOT NULL,dia_espectador VARCHAR(20),CONSTRAINT FOREIGN KEY (id_localidad) REFERENCES localidades(id),CONSTRAINT FOREIGN KEY (propietario) REFERENCES administradores(id))";
			$result = mysql_query($query) or die('Error al crear la tabla de Cines');

			}