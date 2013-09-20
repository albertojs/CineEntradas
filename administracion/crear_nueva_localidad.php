<?php

include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('','');
	tabla("Creación de nueva Localidad");
	?>

<?php
// Si existen las dos variables
if (isset($_GET['id_provincia']) && isset($_GET['nueva_localidad']) AND $_GET['id_provincia']!= '' AND $_GET['nueva_localidad'] != '')
{

	// Lo primero que hacemos es coger las dos variables que me envían
	$id_provincia = $_GET['id_provincia'];
	$nueva_localidad = $_GET['nueva_localidad'];
	
	// genero la sentencia, y la ejecuto
	$loc = 'localidades';
	$sentencia="INSERT INTO $dbname.$dbpref$loc (id_provincia,nombre) VALUES ($id_provincia,'$nueva_localidad')";
	$res = mysql_query($sentencia);

	if ($res != 0)
		echo "<center><H2>Localidad Agregada correctamente</h2></center><center><h3><a href='locprov.php?loc_sel=$id_provincia'>Volver</a></h3></center>";
	else
		echo "<center><H2>Error Al agregar la Localidad</h2></center><center><h3><a href='locprov.php?loc_sel=$id_provincia'>Compruebe si la localidad ya Existe</a></h3></center>";
	}
// En caso de que no haya variables/s
else
	echo "<center><H2>Error, no ha especificado localidad o provincia</h2></center><center><h3><a href='locprov.php?loc_sel=$id_provincia'>Volver</a></h3></center>";	
?>

<?php echo ''; } pie(); ?>