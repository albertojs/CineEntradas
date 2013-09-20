<?php

// recojo todas las variables
		$nombre=$_GET['nombre'];
		$id_provincia=$_GET['id_provincia']; 
		$id=$_GET['id'];

include "cabeceraypie.php";

if ($_SESSION["rango"] == 1){
	cabecera('',' onload="document.provincia.nombre.focus()"');
	tabla("Edición de localidad");
	?>
	
	<center><H3>Edición de Localidades</H3></center>
	
	<?php
	// Si sólo existe la id, que muestre el formulario	
	if (isset($_GET['id']) AND !isset($_GET['nombre']) AND !isset($_GET['id_provincia'])){
			
	$id = $_GET['id'];

	// Buscamos todas las provincias
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'provincias';
	$provincias = mysql_query($sentencia);
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'localidades WHERE id='.$id.'';
	$localidad =  mysql_query($sentencia);
	
	// Y las generamos en una etiqueta SELECT
	echo '<table width="60%" border="0" align="center" cellspacing="5" bgcolor="#CCCC99">';
	echo '<tr><td width="50%" align="center">';
	echo "<form name='provincia' method='get' action=''>";
	echo "<input type='hidden' name='id' value='$id'><select name='id_provincia'>";    
  
	$filas = mysql_num_rows($provincias);
	$loca = mysql_fetch_row($localidad);
		
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($provincias);
		// Si la localidad anterior es la misma que i, es la selected
		if ($loca[1] == $row[0])
			echo '<option value="'.$row[0].'" selected>'.$row[1].'</option>';
		// Si no, no está seleccionada
		else
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}

	echo "</select><input type='text' name='nombre' value='$loca[2]'><input type='submit' value='Guardar'>";
	echo "</table>";
	}
	
	// Existen nombre , id_provincia y la id
	if (isset($_GET['id']) AND isset($_GET['nombre']) AND isset($_GET['id_provincia']))
	{

	$loc = 'localidades';
	$sentencia="UPDATE $dbname.$dbpref$loc SET nombre='$nombre',id_provincia=$id_provincia WHERE id=$id";
	$res = mysql_query($sentencia);
		
		if ($res != 0)
			echo "Edición correcta";
		else
			echo "Edición incorrecta";
	}
	
	
pie();
}
?>