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
<link href='css/cine_theme1.css' rel='stylesheet' type='text/css'>
<body onload="document.form.host.focus()" style="background-image:url(imagenes/gnome.png); background-attachment:fixed;">

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

<table width="60%"  border="0" align="center" cellspacing="5"  bgcolor="#CCCC99">
<form name="form" method="GET" action="script.php">
    <tr>
      <th width="45%"><div align="right"><font color="black">-Host</div></th>
      <td width="10%">&nbsp;</td>
      <td width="45%"><input type="text" name="host" value="localhost"></td>
    </tr>
    <tr>
      <th><div align="right"><font color="black">-Nombre de la BBDD </div></th>
      <td></td>
      <td><input type="text" name="name" value="cine"></td>
    </tr>    <tr>
      <th><div align="right"><font color="black">-Usuario</div></th>
      <td></td>
      <td><input type="text" name="user" value="root"></td>
    </tr>    <tr>
      <th><div align="right"><font color="black">-Password</div></th>
      <td></td>
      <td><input type="text" name="pass"></td>
    </tr>    <tr>
      <th><div align="right"><font color="black">-Prefijo de las Tablas </div></th>
      <td></td>
      <td><input type="text" name="pref"></td>
    </tr>    <tr>
    </tr>    <tr>
      <th><div align="right"><font color="black">-Sobreescribir la BD si existe?</div></th>
      <td></td>
      <td><input type="checkbox" name="borrar" value="borrar"></td>
    </tr>    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" name="Submit" value="Continuar"></td>
      <td></td>
    </tr>  
	</form>
  </table>
<hr width="52%" align="center">
<div align="center"><h4>Rellene el formulario con los datos de su Base de Datos MySQL y pulse el bot&oacute;n Continuar</h4></div>

</body>
</html>
<?php
}
//No existe el botón Enviar////////////////////////////////////////////////////////////////////////////////////
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Instalación de Entradas de Cine v. 0.3</title>
</head>
<body onload="document.form.host.focus()" style="background-image:url(imagenes/gnome.png); background-attachment:fixed;">


<?
		// Si existe el botón ENVIAR
		if (isset ($_GET['Submit']))
			{
			// Cogemos todos los GETS mandados
			$dbhost = $_GET['host'];
			$dbname = $_GET['name'];
			$dbuser = $_GET['user'];
			$dbpass = $_GET['pass'];
			$dbpref = $_GET['pref'];
			
			// Conectamos a MySQL
			$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error conectando al servidor MySQL');
			// Seleccionamos la BBDD que vamos a utilizar
			mysql_select_db($dbname);	
				
			if (isset($_GET['borrar']) && $_GET['borrar']== 'borrar')
			{	
					
				$error=0;
				$tablas="";
				
				echo "<h2 align='center'><u>-Instalacion:</u></h2><br>";
				echo "<table align='center' border='3' width='600'>";
				mysql_query('DROP DATABASE IF EXISTS '.$dbname);
				mysql_query('CREATE DATABASE '.$dbname);
				echo "<tr><td><b>-Crear Base de datos $dbname </b></td>";
				echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				
				// Tabla que contiene las diversas formas de pago
				$fdp='formas_de_pago';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$fdp";
				$result = mysql_query($query);
				
				echo "<tr><td><b>-Borrar tabla formas de pago</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}
				
				$query = "CREATE TABLE $dbname.$dbpref$fdp (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50) UNIQUE NOT NULL)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla formas de pago</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}
				
				$query = "INSERT INTO $dbname.$dbpref$fdp(nombre) VALUES ('Efectivo'),('Visa'),('Mastercard'),('Paypal'),('MobiPay')";
				$result = mysql_query($query);
				

				// Tabla con las Películas
				$peliculas = 'peliculas';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$peliculas";
				$result = mysql_query($query);			
				
				echo "<tr><td><b>-Borrar tabla peliculas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}
				
				$query = "CREATE TABLE $dbname.$dbpref$peliculas (id INT AUTO_INCREMENT PRIMARY KEY,titulo VARCHAR(100),imagen VARCHAR(50),content MEDIUMBLOB,size INT,tipo VARCHAR(35),descripcion VARCHAR(1024),genero ENUM('Ciencia Ficción','Terror','Drama','Musical','Dibujos Animados','Adultos'),duracion INT,activa INT(1))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla peliculas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$peliculas;
				}

				// Creo la tabla provincias con todos sus valores
				$provincias='provincias';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$provincias";
				$result = mysql_query($query) or die('Error al borrar la tabla de provincias');

				echo "<tr><td><b>-Borrar tabla provincias</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$provincias(id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla provincias</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$provincias;
				}
				
				$query = "INSERT INTO $dbname.$dbpref$provincias (nombre) values('Álava'),('Albacete'),('Alicante'),('Almería'),('Asturias'),('Ávila'),('Badajoz'),('Barcelona'),('Burgos'),('Cáceres'),('Cádiz'),('Cantabria'),('Castellón'),('Ciudad Real'),('Córdoba'),('Cuenca'),('Gerona'),('Granada'),('Guadalajara'),('Guipúzcoa'),('Huelva'),('Huesca'),('Islas Baleares'),('Jaén'),('La Coruña'),('La Rioja'),('Las Palmas'),('León'),('Lérida'),('Lugo'),('Madrid'),('Málaga'),('Murcia'),('Navarra'),('Orense'),('Palencia'),('Pontevedra'),('Salamanca'),('Santa Cruz de Tenerife'),('Segovia'),('Sevilla'),('Soria'),('Tarragona'),('Teruel'),('Toledo'),('Valencia'),('Valladolid'),('Vizcaya'),('Zamora'),('Zaragoza')";
				$result = mysql_query($query) or die('Error al insertar los valores en la tabla provincias');


				// Seguimos con localidades
				$localidades='localidades';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$localidades";
				$result = mysql_query($query);

				echo "<tr><td><b>-Borrar tabla localidades</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$localidades(id INT AUTO_INCREMENT PRIMARY KEY,id_provincia INT NOT NULL,nombre VARCHAR(50) NOT NULL,CONSTRAINT FOREIGN KEY (id_provincia) REFERENCES $dbname.$dbpref$provincias(id),CONSTRAINT UNIQUE (id_provincia,nombre))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla localidades</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$localidades;
				}

				//Empezamos con la tabla de Administradores
				$administradores='administradores';
			
				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$administradores";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla administradores</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$administradores (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(20) UNIQUE,password VARCHAR(32) UNIQUE,rango INT)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla administradores</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$administradores;
				}
				
				
				$query = "INSERT INTO $dbname.$dbpref$administradores (nombre,password,rango) VALUES ('admin','f6fdffe48c908deb0f4c3bd36c032e72',1)";
				$result = mysql_query($query) or die('Error al insertar los valores en la tabla administradores');


				// Tabla con los cines
				$cines = 'cines';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$cines";
				$result = mysql_query($query);

				echo "<tr><td><b>-Borrar tabla cines</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$cines (id INT AUTO_INCREMENT PRIMARY KEY,id_localidad INT NOT NULL,nombre VARCHAR(100) NOT NULL,direccion VARCHAR(100),telefono VARCHAR(10),fax VARCHAR(10),metro VARCHAR(35),autobuses VARCHAR(35),web VARCHAR(50),precio FLOAT,propietario INT NOT NULL,dia_espectador ENUM('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'),CONSTRAINT FOREIGN KEY (id_localidad) REFERENCES $dbname.$dbpref$localidades(id),CONSTRAINT FOREIGN KEY (propietario) REFERENCES $dbname.$dbpref$administradores(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla cines</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$cines;	
				}
				
				// Tabla con las salas de los cines
				$salas = 'salas';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$salas";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla salas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$salas (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(20),x INT,y INT,id_cine INT,id_peli INT, CONSTRAINT FOREIGN KEY(id_cine) REFERENCES $dbname.$dbpref$cines(id),CONSTRAINT FOREIGN KEY(id_peli) REFERENCES $dbname.$dbpref$peliculas(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla salas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$salas;
				}
				
				// Tabla con las formas de pago de cada cine
				$fpc = 'cines_formas_de_pago';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$fpc";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla formas de pago de los cines</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$fpc (id INT AUTO_INCREMENT PRIMARY KEY,id_cine INT,id_forma INT,CONSTRAINT UNIQUE (id_cine,id_forma),CONSTRAINT FOREIGN KEY(id_cine) REFERENCES $dbname.$dbpref$cines(id),CONSTRAINT FOREIGN KEY(id_forma) REFERENCES $dbname.$dbpref$fdp(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla formas de pago de cada cine</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$fpc;
				}
				
				// Tabla con las proyecciones
				$proy = 'proyecciones';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$proy";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla proyecciones</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$proy (id INT AUTO_INCREMENT PRIMARY KEY,id_sala INT,id_pelicula INT,hora_inicio VARCHAR(6),fecha_proyeccion date,CONSTRAINT FOREIGN KEY(id_sala) REFERENCES $dbname.$dbpref$salas(id),CONSTRAINT FOREIGN KEY(id_pelicula) REFERENCES $dbname.$dbpref$peliculas(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla proyecciones</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$proy;
				}
				
				// Tabla historico-proyecciones
				$hp = 'historico_proyecciones';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$hp";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla historico-proyecciones</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$hp (id INT AUTO_INCREMENT PRIMARY KEY,id_sala INT,id_pelicula INT,hora_inicio VARCHAR(6),fecha_proyeccion date)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla historico-proyecciones</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$hp;
				}
				
				// Tabla reservas
				$reservas = 'reservas';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$reservas";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla reservas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$reservas (id INT AUTO_INCREMENT PRIMARY KEY,id_proyeccion int,dni varchar(10),importe int,id_fp int,fecha_reserva date,CONSTRAINT FOREIGN KEY(id_proyeccion) REFERENCES $dbname.$dbpref$proy(id),CONSTRAINT FOREIGN KEY(id_fp) REFERENCES $dbname.$dbpref$fdp(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla reservas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$reservas;
				}
				
				// Tabla butacas
				$butacas = 'butacas';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$butacas";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla butacas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$butacas (id INT AUTO_INCREMENT PRIMARY KEY,id_reserva int,butaca int,CONSTRAINT FOREIGN KEY(id_reserva) REFERENCES $dbname.$dbpref$reservas(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla butacas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";	
					$error=$error+1;
					$tablas=$tablas.",".$butacas;
				}
				
				
				// Tabla reservas_temporal
				$reservas_temporal = 'reservas_temporal';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$reservas_temporal";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla reservas temporal</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$reservas_temporal (id INT AUTO_INCREMENT PRIMARY KEY,id_proyeccion int,fecha int,CONSTRAINT FOREIGN KEY(id_proyeccion) REFERENCES proyecciones(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla reservas temporal</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$reservas;
				}
				
				
				// Tabla butacas temporal
				$butacas_temporal = 'butacas_temporal';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$butacas_temporal";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla butacas temporal</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$butacas_temporal (id INT AUTO_INCREMENT PRIMARY KEY,id_reserva int,butaca int,CONSTRAINT FOREIGN KEY(id_reserva) REFERENCES reservas_temporal(id) ON DELETE CASCADE)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla butacas temporal</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";	
					$error=$error+1;
					$tablas=$tablas.",".$butacas;
				}
				
				
				// Tabla historico_reservas
				$hr = 'historico_reservas';

				$query = "DROP TABLE IF EXISTS $dbname.$dbpref$hr";
				$result = mysql_query($query) ;

				echo "<tr><td><b>-Borrar tabla historico-reservas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}

				$query = "CREATE TABLE $dbname.$dbpref$hr (id INT AUTO_INCREMENT PRIMARY KEY,id_proyeccion int,butacas int,dni varchar(10),fecha_reserva date)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla historico-reservas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$hr;
				}
				
				echo "</table>";
				
				
				if($error==0){
					echo "<h3 align='center'><b>Nº de errores: ".$error." errores.</b></h3>";
					echo "<h3 align='center'><b>La instalacion  ha finalizado de forma existosa.</b></h3>";	
				}
				else{
					echo "<h3 align='center'><b>Instalacion terminada con :".$error." errores.</b></h3>";
					echo "<h3 align='center'>Tablas con errores:".$tablas;
				}
				
				
					$cadena = '<?php';
					$cadena = $cadena."\n".'//Datos del Host';
					$cadena = $cadena."\n".'$dbhost = "'.$dbhost.'";';
					$cadena = $cadena."\n".'//Datos del nombre de la base de datos';
					$cadena = $cadena."\n".'$dbname = "'.$dbname.'";';
					$cadena = $cadena."\n".'//Datos del Prefijo';
					$cadena = $cadena."\n".'$dbpref = "'.$dbpref.'";';
					$cadena = $cadena."\n".'//Datos del Usuario';
					$cadena = $cadena."\n".'$dbuser = "'.$dbuser.'";';
					$cadena = $cadena."\n".'//Datos del password';
					$cadena = $cadena."\n".'$dbpass = "'.$dbpass.'";';
					$cadena = $cadena."\n\n\n\n".'//Creado en febrero/Marzo de 2007 por Álvaro Alcedo Moreno, Eduardo Quero Salorio y Alberto Jiménez Soria'."\n\n".'?>';
					//abre un archivo y escribe en él
					$archivo = fopen("library/config.php" , "w+");

					// Si se ha abierto con éxito
					if ($archivo) {
						fputs ($archivo, $cadena);
						echo "<h4 align='center'><b>Archivo de Configuración creado correctamente</b>";
					}
					else
						echo "<h4 align='center'><b>No se pudo crear el archivo de configuración. Consulte el manual para más información";

						fclose ($archivo);
						echo "<h3 align='center'><b>Instalacion Terminada</h3></b>";
					
				
				
			}
			else{
					 // obtenemos una lista de las bases de datos del servidor
					$db = mysql_list_dbs();
					// vemos cuantas BD hay
					$num_bd = mysql_num_rows($db);
					//comprobamos si la BD que quermos crear exite ya
					$existe = "NO" ;

					for ($i=0; $i<$num_bd; $i++) {

						if (mysql_dbname($db, $i) == $dbname) {
							$existe = "SI" ;
						}
					}
					
					
					
			if ($existe == "NO") {
				echo "<script languaje='javascript'>";
				echo "setTimeout(window.location='script.php?host=".$host."&name=".$dbname."&user=".$dbuser."&pass=".$dbpass."&prefijo=".$dbprefijo."&Submit=Continuar&borrar=borrar',1) ";
				echo "</script>";
			}
			else{
				$error=0;
				$tablas="";
				mysql_select_db($dbname);	
				echo "<h2 align='center'><u>-Instalacion:</u></h2><br>";
				echo "<table align='center' border='3' width='600'>";
				
				
				echo "<tr><td><b>-Crear Base de datos $dbname </b></td>";
				echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				
				// Tabla que contiene las diversas formas de pago
				$fdp='formas_de_pago';

				
				
				$query = "CREATE TABLE $dbname.$dbpref$fdp (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50) UNIQUE NOT NULL)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla formas de pago</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$fdp;
				}
				
				$query = "INSERT INTO $dbname.$dbpref$fdp(nombre) VALUES ('Efectivo'),('Visa'),('Mastercard'),('Paypal'),('MobiPay')";
				$result = mysql_query($query);

				// Tabla con las Películas
				$peliculas = 'peliculas';

				
				
				$query = "CREATE TABLE $dbname.$dbpref$peliculas (id INT AUTO_INCREMENT PRIMARY KEY,titulo VARCHAR(100),imagen VARCHAR(50),content MEDIUMBLOB,size INT,tipo VARCHAR(35),descripcion VARCHAR(1024),genero ENUM('Ciencia Ficción','Terror','Drama','Musical','Dibujos Animados','Adultos'),duracion INT,activa INT(1))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla peliculas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$peliculas;
				}

				// Creo la tabla provincias con todos sus valores
				$provincias='provincias';

				

				$query = "CREATE TABLE $dbname.$dbpref$provincias(id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla provincias</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$provincias;
				}
				
				$query = "INSERT INTO $dbname.$dbpref$provincias (nombre) values('Álava'),('Albacete'),('Alicante'),('Almería'),('Asturias'),('Ávila'),('Badajoz'),('Barcelona'),('Burgos'),('Cáceres'),('Cádiz'),('Cantabria'),('Castellón'),('Ciudad Real'),('Córdoba'),('Cuenca'),('Gerona'),('Granada'),('Guadalajara'),('Guipúzcoa'),('Huelva'),('Huesca'),('Islas Baleares'),('Jaén'),('La Coruña'),('La Rioja'),('Las Palmas'),('León'),('Lérida'),('Lugo'),('Madrid'),('Málaga'),('Murcia'),('Navarra'),('Orense'),('Palencia'),('Pontevedra'),('Salamanca'),('Santa Cruz de Tenerife'),('Segovia'),('Sevilla'),('Soria'),('Tarragona'),('Teruel'),('Toledo'),('Valencia'),('Valladolid'),('Vizcaya'),('Zamora'),('Zaragoza')";
				$result = mysql_query($query) or die('Error al insertar los valores en la tabla provincias');


				// Seguimos con localidades
				$localidades='localidades';

				

				$query = "CREATE TABLE $dbname.$dbpref$localidades(id INT AUTO_INCREMENT PRIMARY KEY,id_provincia INT NOT NULL,nombre VARCHAR(50) NOT NULL,CONSTRAINT FOREIGN KEY (id_provincia) REFERENCES $dbname.$dbpref$provincias(id),CONSTRAINT UNIQUE (id_provincia,nombre))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla localidades</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$localidades;
				}

				//Empezamos con la tabla de Administradores
				$administradores='administradores';
			
				

				$query = "CREATE TABLE $dbname.$dbpref$administradores (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(20) UNIQUE,password VARCHAR(32) UNIQUE,rango INT)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla administradores</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$administradores;
				}
				
				
				$query = "INSERT INTO $dbname.$dbpref$administradores (nombre,password,rango) VALUES ('admin','f6fdffe48c908deb0f4c3bd36c032e72',1)";
				$result = mysql_query($query) or die('Error al insertar los valores en la tabla administradores');


				// Tabla con los cines
				$cines = 'cines';

				

				$query = "CREATE TABLE $dbname.$dbpref$cines (id INT AUTO_INCREMENT PRIMARY KEY,id_localidad INT NOT NULL,nombre VARCHAR(100) NOT NULL,direccion VARCHAR(100),telefono VARCHAR(10),fax VARCHAR(10),metro VARCHAR(35),autobuses VARCHAR(35),web VARCHAR(50),precio FLOAT,propietario INT NOT NULL,dia_espectador ENUM('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'),CONSTRAINT FOREIGN KEY (id_localidad) REFERENCES $dbname.$dbpref$localidades(id),CONSTRAINT FOREIGN KEY (propietario) REFERENCES $dbname.$dbpref$administradores(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla cines</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$cines;	
				}
				
				// Tabla con las salas de los cines
				$salas = 'salas';

				

				$query = "CREATE TABLE $dbname.$dbpref$salas (id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(20),x INT,y INT,id_cine INT,id_peli INT, CONSTRAINT FOREIGN KEY(id_cine) REFERENCES $dbname.$dbpref$cines(id),CONSTRAINT FOREIGN KEY(id_peli) REFERENCES $dbname.$dbpref$peliculas(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla salas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$salas;
				}
				
				// Tabla con las formas de pago de cada cine
				$fpc = 'cines_formas_de_pago';

				

				$query = "CREATE TABLE $dbname.$dbpref$fpc (id INT AUTO_INCREMENT PRIMARY KEY,id_cine INT,id_forma INT,CONSTRAINT UNIQUE (id_cine,id_forma),CONSTRAINT FOREIGN KEY(id_cine) REFERENCES $dbname.$dbpref$cines(id),CONSTRAINT FOREIGN KEY(id_forma) REFERENCES $dbname.$dbpref$fdp(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla formas de pago de cada cine</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$fpc;
				}
				
				// Tabla con las proyecciones
				$proy = 'proyecciones';

				

				$query = "CREATE TABLE $dbname.$dbpref$proy (id INT AUTO_INCREMENT PRIMARY KEY,id_sala INT,id_pelicula INT,hora_inicio VARCHAR(6),fecha_proyeccion date,CONSTRAINT FOREIGN KEY(id_sala) REFERENCES $dbname.$dbpref$salas(id),CONSTRAINT FOREIGN KEY(id_pelicula) REFERENCES $dbname.$dbpref$peliculas(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla proyecciones</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;
					$tablas=$tablas.",".$proy;
				}
				
				// Tabla historico-proyecciones
				$hp = 'historico_proyecciones';

				

				$query = "CREATE TABLE $dbname.$dbpref$hp (id INT AUTO_INCREMENT PRIMARY KEY,id_sala INT,id_pelicula INT,hora_inicio VARCHAR(6),fecha_proyeccion date)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla historico-proyecciones</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$hp;
				}
				
				// Tabla reservas
				$reservas = 'reservas';

				

				$query = "CREATE TABLE $dbname.$dbpref$reservas (id INT AUTO_INCREMENT PRIMARY KEY,id_proyeccion int,dni varchar(10),importe int,id_fp int,fecha_reserva date,CONSTRAINT FOREIGN KEY(id_proyeccion) REFERENCES $dbname.$dbpref$proy(id),CONSTRAINT FOREIGN KEY(id_fp) REFERENCES $dbname.$dbpref$fdp(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla reservas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$reservas;
				}
				
				// Tabla butacas
				$butacas = 'butacas';

				

				$query = "CREATE TABLE $dbname.$dbpref$butacas (id INT AUTO_INCREMENT PRIMARY KEY,id_reserva int,butaca int,CONSTRAINT FOREIGN KEY(id_reserva) REFERENCES $dbname.$dbpref$reservas(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla butacas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";	
					$error=$error+1;
					$tablas=$tablas.",".$butacas;
				}
				
				
				// Tabla reservas_temporal
				$reservas_temporal = 'reservas_temporal';

				$query = "CREATE TABLE $dbname.$dbpref$reservas_temporal (id INT AUTO_INCREMENT PRIMARY KEY,id_proyeccion int,fecha int,CONSTRAINT FOREIGN KEY(id_proyeccion) REFERENCES proyecciones(id))";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla reservas temporal</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$reservas;
				}
				
				
				// Tabla butacas temporal
				$butacas_temporal = 'butacas_temporal';

				$query = "CREATE TABLE $dbname.$dbpref$butacas_temporal (id INT AUTO_INCREMENT PRIMARY KEY,id_reserva int,butaca int,CONSTRAINT FOREIGN KEY(id_reserva) REFERENCES reservas_temporal(id) ON DELETE CASCADE)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla butacas temporal</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";	
					$error=$error+1;
					$tablas=$tablas.",".$butacas;
				}
				
				
				
				
				// Tabla historico_reservas
				$hr = 'historico_reservas';

				

				$query = "CREATE TABLE $dbname.$dbpref$hr (id INT AUTO_INCREMENT PRIMARY KEY,id_proyeccion int,butacas int,dni varchar(10),fecha_reserva date)";
				$result = mysql_query($query);
				echo "<tr><td><b>-Crear tabla historico-reservas</b></td>";
				if($result==true){
					echo "<td align='center'><img src='imagenes/ok.gif' height='25'></td></tr>";
				}
				else{
					echo "<td align='center'><img src='imagenes/failed.gif' height='25'></td></tr>";
					$error=$error+1;	
					$tablas=$tablas.",".$hr;
				}
				
				echo "</table>";
				
				
				if($error==0){
					echo "<h3 align='center'><b>Nº de errores: ".$error." errores.</b></h3>";
					echo "<h3 align='center'><b>La instalacion  ha finalizado de forma existosa.</b></h3>";	
				}
				else{
					echo "<h3 align='center'><b>Instalacion terminada con :".$error." errores.</b></h3>";
					echo "<h3 align='center'>Tablas con errores:".$tablas;
				}
				
				



					$cadena = '<?php';
					$cadena = $cadena."\n".'//Datos del Host';
					$cadena = $cadena."\n".'$dbhost = "'.$dbhost.'";';
					$cadena = $cadena."\n".'//Datos del nombre de la base de datos';
					$cadena = $cadena."\n".'$dbname = "'.$dbname.'";';
					$cadena = $cadena."\n".'//Datos del Prefijo';
					$cadena = $cadena."\n".'$dbpref = "'.$dbpref.'";';
					$cadena = $cadena."\n".'//Datos del Usuario';
					$cadena = $cadena."\n".'$dbuser = "'.$dbuser.'";';
					$cadena = $cadena."\n".'//Datos del password';
					$cadena = $cadena."\n".'$dbpass = "'.$dbpass.'";';
					$cadena = $cadena."\n\n\n\n".'//Creado en febrero/Marzo de 2007 por Álvaro Alcedo Moreno, Eduardo Quero Salorio y Alberto Jiménez Soria'."\n\n".'?>';
					//abre un archivo y escribe en él
					$archivo = fopen("library/config.php" , "w+");

					// Si se ha abierto con éxito
					if ($archivo) {
						fputs ($archivo, $cadena);
						echo "<h4 align='center'><b>Archivo de Configuración creado correctamente</b>";
					}
					else
						echo "<h4 align='center'><b>No se pudo crear el archivo de configuración. Consulte el manual para más información";

						fclose ($archivo);
						echo "<h3 align='center'><b>Instalacion Terminada</h3></b>";
					

					}
					}
					echo "<br><hr>";
					echo "<table align='center' border='0' width='900'><tr><td align='left'><input type='button' value='Nueva Instalacion' onclick='volver()'></td><td  align='right'><input type='button' value='Salir de la Instalacion' onclick='cerrarse()'></td></tr></table>";
		}
		
?>
<script languaje="javascript">
function cerrarse(){
window.close()
}
function volver(){
location.href="script.php"	
}
</script>		
</body>
</html>			
			
			