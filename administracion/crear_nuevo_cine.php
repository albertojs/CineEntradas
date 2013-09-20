<?php
include "cabeceraypie.php";
if ($_SESSION["rango"] == 1 OR $_SESSION["rango"] == 2){
	cabecera('','');
	tabla("Nuevo Cine");

	 if (isset($_GET['nombre']) AND $_GET['nombre'] != '')
		{
		$nombre= $_GET['nombre'];
		$direccion= $_GET['direccion'];
		$precio= $_GET['precio'];
		if ($precio == '')
			$precio = 0;
		$web= $_GET['web'];
		$telefono= $_GET['telefono'];
		$fax= $_GET['fax'];
		$buses= $_GET['buses'];
		$metro= $_GET['metro'];
		$localidad= $_GET['localidad'];
		$propietario= $_GET['propietario'];
		$dia_esp= $_GET['dia_esp'];
		
		$cine = 'cines';
		$sentencia="INSERT INTO $dbname.$dbpref$cine" .
		" (id_localidad,nombre,direccion,telefono,fax,metro,autobuses,web,dia_espectador,precio,propietario) VALUES" .
		"($localidad,'$nombre','$direccion','$telefono','$fax','$metro','$buses','$web','$dia_esp',$precio,$propietario)";
		
		$res = mysql_query($sentencia);
		
		echo $sentencia;
		
		if ($res != 0)
			echo "<center><H2>Cine creado con éxito</H2></center><center><H4><A HREF='cines.php'>VOLVER</A></H4></center>";
		else
			echo "<center><H2>Error al crear el Cine</H2></center><center><H3>Comprueba si ese cine ya existe</H3></center><center><H4><A HREF='cines.php'>VOLVER</A></H4></center>";
		
		// Ahora tenemos que hacer las formas de pago que acepta ese cine
		// Cojo el Array con los números (id) de las distintas formas
		$fdp = $_GET["formas_pago"];
		
		// Selecciono la última fila que hemos metido en cines
		$sentencia = "SELECT * FROM $dbname.$dbpref$cine ORDER BY id DESC LIMIT 1";
		$res = mysql_query($sentencia);
		$row = mysql_fetch_row($res);
		//$filas = mysql_num_rows($res);
		
		echo "<br>$res[2]<br>";
		for($i = 0; $i < sizeof($fdp); $i++)
		{
			// $fdp[$i] contiene la id de la forma de pago
			$formas = 'cines_formas_de_pago';
			$sentencia="INSERT INTO $dbname.$dbpref$formas (id_cine,id_forma) VALUES ($row[0],$fdp[$i])";
			$res = mysql_query($sentencia);
			if ($res == 0)
				echo "<center><H4>Error al crear la Forma de pago</H4></center>";
		}
  		
		
		
		}
		else
			echo "<center><H2>El campo nombre es obligatorio</h2><h3><a href='cines.php'>Volver</a></h3></center>";

}
else
	echo "<center><H3>Careces de permisos suficientes</H3></center>";

pie();
?>