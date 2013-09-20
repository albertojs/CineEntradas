<?php
include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('','');
	tabla("Nuevo Usuario");
	?>
	
	<?php if (isset($_GET['nombre']) AND isset($_GET['password']) AND isset($_GET['tipo']) AND $_GET['nombre']!=""  AND $_GET['password']!="")
		{
		$nombre = $_GET['nombre'];
		$passwo = $_GET['password'];
		$privil = $_GET['tipo'];

		$adm = 'administradores';
		$sentencia="INSERT INTO $dbname.$dbpref$adm (nombre,password,rango) VALUES ('$nombre','$passwo',$privil)";
		
		$res = mysql_query($sentencia);
		
		if ($res != 0)
			echo "<center><H2>Usuario insertado con éxito</H2></center><center><H4><A HREF='usuarios.php'>VOLVER</A></H4></center>";
		else
			echo "<center><H2>Error al crear el Usuario</H2></center><center><H3>Comprueba si ese usuario ya existe</H3></center><center><H4><A HREF='usuarios.php'>VOLVER</A></H4></center>";
		}
	else
		echo "<center><H3>Faltan parámetros</H3></center><center><H4><A HREF='usuarios.php'>VOLVER</A></H4></center>";
}
else
	echo "<center><H3>Careces de permisos suficientes</H3></center>";

pie();
?>