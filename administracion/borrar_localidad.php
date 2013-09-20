<?php
include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('','');
	tabla("Borrado de localidad");
	?>
	
	<?php if (isset($_GET['id']))
		{
		$id = $_GET['id'];

		$adm = 'localidades';
		$sentencia="DELETE FROM $dbname.$dbpref$adm WHERE id = $id";

		// Que lance la sentencia
		$res = mysql_query($sentencia);
		
		if ($res != 0 )
			echo "<center><H2>Localidad borrada con éxito</H2></center><center><H4><A HREF='locprov.php'>VOLVER</A></H4></center>";
		else
			echo "<center><H2>Error al borrar la Localidad, compruebe que no hay cines en esa localidad</H2></center><center><H4><A HREF='locprov.php'>VOLVER</A></H4></center>";
		}
}
else
	echo "<center><H3>Careces de permisos suficientes</H3></center>";

pie();
?>