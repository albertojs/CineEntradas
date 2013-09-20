<?php
include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('','');
	tabla("Borrado de usuario");
	?>
	
	<?php if (isset($_GET['id']))
		{
		$id = $_GET['id'];

		$adm = 'administradores';
		$sentencia="DELETE FROM $dbname.$dbpref$adm WHERE id = $id";

		// Si la id para borrar no es la misma que la suya propia
		if ($id != $_SESSION["id"])
			// Que lance la sentencia
			$res = mysql_query($sentencia);
		
		if ($res != 0 )
			echo "<center><H2>Usuario borrado con éxito</H2></center><center><H4><A HREF='usuarios.php'>VOLVER</A></H4></center>";
		else
			echo "<center><H2>Error al borrar el Usuario, compruebe que no sea propietario de algún cine</H2></center><center><H4><A HREF='usuarios.php'>VOLVER</A></H4></center>";
		}
}
else
	echo "<center><H3>Careces de permisos suficientes</H3></center>";

pie();
?>