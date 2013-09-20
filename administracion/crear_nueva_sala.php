<?php
include "cabeceraypie.php";
if ($_SESSION["rango"] == 2){
	cabecera('','');
	tabla("Nueva Sala");
	?>
	
	<?php if ( (isset($_GET['idcine'])) AND (isset($_GET['nombre'])) AND (isset($_GET['x'])) AND (isset($_GET['y'])))
		{
		$idcine = $_GET['idcine'];
		$nombre = $_GET['nombre'];
		$x = $_GET['x'];
		$y = $_GET['y'];

		$salas = 'salas';
		$sentencia="INSERT INTO $dbname.$dbpref$salas (nombre,x,y,id_cine) VALUES ('$nombre','$x',$y,$idcine)";
		
		$res = mysql_query($sentencia);
		
		if ($res != 0)
			echo "<center><H2>Sala insertada con éxito</H2></center><center><H4><A HREF='salas.php'>VOLVER</A></H4></center>";
		else
			echo "<center><H2>Error al crear la sala</H2></center><center><H3>Comprueba si esa sala ya existe</H3></center><center><H4><A HREF='salas.php'>VOLVER</A></H4></center>";
		}
		else
			echo "<center><H3>Faltan parámetros</H3></center>";
}
else
	echo "<center><H3>Careces de permisos suficientes</H3></center>";

pie();
?>