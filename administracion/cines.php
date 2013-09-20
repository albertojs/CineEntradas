<?php
	include 'cabeceraypie.php';
	if ($_SESSION["rango"] == 1 OR $_SESSION["rango"] == 2){
	cabecera('',' onload="document.nuevo.nombre.focus()"');
	tabla('Cines');
?>


  <h3><center>Nuevo Cine</center></h3>
  <center><H4>Los campos marcados con <sup>*</sup> son obligatorios</H4></center>

<table width="50%"  border="0" align="center" cellspacing="5"  bgcolor="#CCCC99">
 <form name="nuevo" method="get" action="crear_nuevo_cine.php">
  <tr>
    <th width="40%" align="right">Nombre<sup>*</sup></th>
	<td width="60%"><input name="nombre" type="text" size="30"></td>
  </tr>
  <tr>
	<th align="right">Dirección</th>
	<td width="60%"><input name="direccion" type="text" size="30"></td>
  </tr>
  <tr>
    <th align="right">Localidad<sup>*</sup></th>
	<td width="60%"><select name='localidad'>
	
	<?php
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'localidades,'.$dbname.'.'.$dbpref.'provincias WHERE '.$dbname.'.'.$dbpref.'provincias.id = '.$dbname.'.'.$dbpref.'localidades.id_provincia ORDER BY id_provincia';
	$todas = mysql_query($sentencia);
	$filas = mysql_num_rows($todas);
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($todas);
	echo '<option value="'.$row[0].'">'.$row[2].', '.$row[4].'</option>';
	}
	?>
	
	</select></td>
  </tr>
  <tr>
	<th align="right">Precio Entrada</th>
	<td width="60%"><input name="precio" type="text" size="30"></td>
  </tr>
  <tr>
	<th align="right">Día Espectador</th>
	<td width="60%">
	<select name="dia_esp">
	<?php
	// Consultamos todos los posibles valores de la columna ENUM
	$tabla = $dbname.'.'.$dbpref.'cines';
	$query = mysql_query("SHOW COLUMNS FROM $tabla LIKE 'dia_espectador'");

	// Creamos un Array con el resultado de la consulta
	$result = mysql_fetch_array($query);
	$result = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2",$result[1]));

	// Para cada resultado, creamos una opcion para el menu desplegable ;)
	foreach ($result AS $key) echo "<option value='$key'>$key</option>";
	?>
	</select>
	</td>
  </tr>

  <tr>
    <th align="right">Web</th>
	<td width="60%"><input name="web" type="text" size="30"></td>
  <tr>
    <th align="right">Tel&eacute;fono</th>
	<td width="60%"><input name="telefono" type="text" size="20" maxlength="9"></td>
  </tr>
  <tr>
	<th align="right">Fax</th>
	<td width="60%"><input name="fax" type="text" size="20" maxlength="9"></td>
  </tr>
  <tr>
     <th align="right">Autob&uacute;s</th>
	 <td width="60%"><input name="buses" type="text" size="30"></td>
  </tr>
    </tr>
     <th align="right">Metro</th>
	 <td width="60%"><input name="metro" type="text" size="30"></td>
  </tr>
  <tr>
	 <th align="right">Propietario<sup>*</sup></th>
	 <td width="60%"><?php
	 if ($_SESSION["rango"] == 1)
	 	{
	 		
	 	echo "<select name='propietario'>";
	 
	
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'administradores WHERE '.$dbname.'.'.$dbpref.'administradores.rango = 2';
	$propietarios = mysql_query($sentencia);
	$filas = mysql_num_rows($propietarios);
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($propietarios);
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	
	 echo "</select>";
	 	}// Administrador de cine
	 else if ($_SESSION["rango"] == 2)
	 	{
	 	echo '<input value="'.$_SESSION['nombre'].'" type="text" size=30 readonly="true">';
	 	echo '<input name="propietario" value="'.$_SESSION['id'].'" type="hidden">';
	 	}	 
	 ?></td>
  </tr>
  <tr>
     <th align="right">Formas de pago aceptadas</th>
	 <td width="60%"><?php
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'formas_de_pago';
	$fdp = mysql_query($sentencia);
	$filas = mysql_num_rows($fdp);
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($fdp);
	echo '<input name="formas_pago[]" type="checkbox" value="'.$row[0].'" checked> '.$row[1].'<br>';
	}
	?></td>
  </tr>
  <tr>
	 <th></th>
	 <td><input type="submit" value="Crear Cine"></td>
  </tr>
 </form>
</table>

<br>
<hr align="center" width="52%"><br>
    
  <?php

if ($_SESSION["rango"] == 1)
$sentencia = 'SELECT '.$dbname.'.'.$dbpref.'cines.id,'.$dbname.'.'.$dbpref.'cines.nombre,'.$dbname.'.'.$dbpref.'administradores.nombre AS adm,'.$dbname.'.'.$dbpref.'localidades.nombre AS loca,'.$dbname.'.'.$dbpref.'cines.direccion,'.$dbname.'.'.$dbpref.'cines.telefono,'.$dbname.'.'.$dbpref.'cines.fax,'.$dbname.'.'.$dbpref.'cines.metro,'.$dbname.'.'.$dbpref.'cines.autobuses,'.$dbname.'.'.$dbpref.'cines.web,'.$dbname.'.'.$dbpref.'cines.precio,'.$dbname.'.'.$dbpref.'provincias.nombre,'.$dbname.'.'.$dbpref.'cines.dia_espectador
FROM '.$dbname.'.'.$dbpref.'cines,'.$dbname.'.'.$dbpref.'provincias,'.$dbname.'.'.$dbpref.'administradores,'.$dbname.'.'.$dbpref.'localidades
WHERE '.$dbname.'.'.$dbpref.'cines.propietario='.$dbname.'.'.$dbpref.'administradores.id
AND '.$dbname.'.'.$dbpref.'cines.id_localidad='.$dbname.'.'.$dbpref.'localidades.id
AND '.$dbname.'.'.$dbpref.'localidades.id_provincia='.$dbname.'.'.$dbpref.'provincias.id';
else
$sentencia = 'SELECT '.$dbname.'.'.$dbpref.'cines.id,'.$dbname.'.'.$dbpref.'cines.nombre,'.$dbname.'.'.$dbpref.'administradores.nombre AS adm,'.$dbname.'.'.$dbpref.'localidades.nombre AS loca,'.$dbname.'.'.$dbpref.'cines.direccion,'.$dbname.'.'.$dbpref.'cines.telefono,'.$dbname.'.'.$dbpref.'cines.fax,'.$dbname.'.'.$dbpref.'cines.metro,'.$dbname.'.'.$dbpref.'cines.autobuses,'.$dbname.'.'.$dbpref.'cines.web,'.$dbname.'.'.$dbpref.'cines.precio,'.$dbname.'.'.$dbpref.'provincias.nombre,'.$dbname.'.'.$dbpref.'cines.dia_espectador
FROM '.$dbname.'.'.$dbpref.'cines,'.$dbname.'.'.$dbpref.'provincias,'.$dbname.'.'.$dbpref.'administradores,'.$dbname.'.'.$dbpref.'localidades
WHERE '.$dbname.'.'.$dbpref.'cines.propietario='.$dbname.'.'.$dbpref.'administradores.id
AND '.$dbname.'.'.$dbpref.'cines.id_localidad='.$dbname.'.'.$dbpref.'localidades.id
AND '.$dbname.'.'.$dbpref.'localidades.id_provincia='.$dbname.'.'.$dbpref.'provincias.id
AND '.$dbname.'.'.$dbpref.'cines.propietario = '.$_SESSION["id"];
				
  	$res  = mysql_query($sentencia);
  	$filas = mysql_num_rows($res);

  	echo "<h3><center>Lista de $filas Cines</center></h3>";

	for ($i=0;$i<$filas;$i++){
	$row = mysql_fetch_row($res);
?>

<table width="90%" border="2" align="center" cellspacing="4" bordercolor="#666666">
  <tr>
    <th width="30%">Nombre</th>
	<th width="30%">Dirección</th>
    <th width="20%">Localidad</th>
	<th width="10%">Precio</th>
    <th width="10%">Dueño</th>
    <th width="10%">Web</th>
  </tr>
  <tr>
    <td align="center"><?php echo $row[1]; ?></td>
    <td align="center"><?php echo $row[4]; ?></td>
    <td align="center"><?php echo $row[3].", ".$row[11]; ?></td>
    <td align="center"><?php echo $row[10]; ?></td>
    <td align="center"><?php echo $row[2]; ?></td>
    <td align="center"><?php echo $row[9]; ?></td>
  </tr>
  <tr>
    <th>Tel&eacute;fono</th>
	<th>Fax</th>
    <th>Día esp.</th>
	<th>Autobús</th>
	<th>Metro</th>
    <th>Acciones</th>
  </tr>
  <tr>
    <td align="center"><?php echo $row[5]; ?></td>
    <td align="center"><?php echo $row[6]; ?></td>
    <td align="center"><?php echo $row[12]; ?></td>
    <td align="center"><?php echo $row[7]; ?></td>
	<TD align='center'><?php echo $row[8]; ?></TD>
	<TD align='center'><A HREF='editar_cine.php?id="<?php echo $row[0]; ?>"'><img src='../imagenes/editar.gif' width='30' height='30' border=0></img></A><A HREF='borrar_cine.php?id="<?php echo $row[0]; ?>"'><img src='../imagenes/no.gif' width='30' height='30' border=0></img></A></TD></TD>
  </tr>
</table>
<hr align="center" width="40%">
<?php

	}
	pie();
	}

?>