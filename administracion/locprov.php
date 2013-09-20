<?php

include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('',' onLoad="document.provincia.nueva_localidad.focus()"');
	tabla("Localidades Y Provincias");
	?>

<center><h3>Nueva Localidad</h3></center>

<?php

// cojo la variable loc_pas si existe
if (isset($_GET['loc_sel']))
	$loc_pasada = $_GET['loc_sel'];
else if (isset($_POST['loc_sel']))
	$loc_pasada = $_POST['loc_sel'];
else
	$loc_pasada = 1;

// Buscamos todas las provincias
$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'provincias';
$provincias = mysql_query($sentencia);

// Y las generamos en una etiqueta SELECT
echo '<table width="75%"  border="0" align="center" cellspacing="5" bgcolor="#CCCC99">';
echo '<tr><td width="50%" align="right">';
echo "<form name='provincia' method='get' action='crear_nueva_localidad.php'>";
echo "<select name='id_provincia' onChange='GeneraLocalidades()'>";    
  
	$filas = mysql_num_rows($provincias);
		
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($provincias);
		// Si la localidad anterior es la misma que i, es la selected
		if ($loc_pasada == $i+1)
			echo '<option value="'.$row[0].'" selected>'.$row[1].'</option>';
		// Si no, no está seleccionada
		else
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
	}

	echo "</select>";

// Ahora genero todas las localidades de esa provincia
$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'localidades WHERE '.$dbname.'.'.$dbpref.'localidades.id_provincia = '.$loc_pasada;
$localidades = mysql_query($sentencia);

	echo "<p>Agregar Localidad <input type='text' name='nueva_localidad'></p>" .
			"<p><input type='submit' value='Crear Localidad'></p></form></td>";


	echo "<td valign='top'><form name='localidades' method='get' action='locprov.php'>";
	echo "<input type='submit' value='Ver Localidades'><select>";
	
	$filas = mysql_num_rows($localidades);
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($localidades);
		echo '<option value="'.$row[1].'">'.$row[2].'</option>';
	}
	
	echo "</select><input type='hidden' name='loc_sel' value='1'>";
	echo "</form></td></tr></table>";?>

<hr width="52%" align="center"><center><h3>Lista de Provincias con Localidades</h3></center>

<?php

	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'localidades,'.$dbname.'.'.$dbpref.'provincias WHERE '.$dbname.'.'.$dbpref.'localidades.id_provincia = '.$dbname.'.'.$dbpref.'provincias.id ORDER BY id_provincia,localidades.nombre';
  	$todas  = mysql_query($sentencia);
  	$filas = mysql_num_rows($todas);
  	
	echo '<table width="75%" border="0" align="center" cellspacing="5">' .
		'<tr>' .
		'<th width="10%">Provincia</td>' .
		'<th width="50%">Localidad</td>' .
		'<th width="15%">Editar</td>' .
		'<th width="15%">Borrar</td>' .
		'</tr>';
	
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($todas);
		echo "<TR>" .
				"<TD align='center'>".$row[4]."</TD>" .
				"<TD align='center'>".$row[2]."</TD>" .
				"<TD align='center'><A HREF='editar_localidad.php?id=".$row[0]."'><img src='../imagenes/editar.gif' width='30' height='30' border=0></img></A></TD>" .
				"<TD align='center'>";
		echo "<A HREF='borrar_localidad.php?id=".$row[0]."'><img src='../imagenes/no.gif' width='30' height='30' border=0></img></A></TD>";
		echo "</TR>";
	}
	echo '</TABLE>';
  ?>
  
  
<?php
pie();
?>

<script language="JavaScript" type="text/javascript">
function GeneraLocalidades()
{
	document.localidades.loc_sel.value=document.provincia.id_provincia.value
}
</script><?php echo''; } ?>
  