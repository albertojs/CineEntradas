<?php
	include 'cabeceraypie.php';
	if ($_SESSION["rango"] == 1 OR $_SESSION["rango"] == 2){
	cabecera('',' onload="document.nuevo.x.focus()"');
	tabla('Salas');

	// Si NO existe una id de cine pasado
	// Primero listamos todos los cines de los que el usuario es
	// propietario, diciendole el número de salas que tiene cada uno
	if (!isset($_GET['id']))
		{
	echo "<h3><center>Salas de cine</center></h3>";
?>
<!--Tabla de los cines propietarios-->
<table width="90%" border="0" align="center" cellspacing="4">
  <tr>
    <th width="30%">Nombre</th>
	<th width="30%">Dirección</th>
    <th width="20%">Salas</th>
    <th width="20%">Agregar Sala</th>
  </tr>

<?php	
$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'cines WHERE propietario='.$_SESSION["id"];

  	$res  = mysql_query($sentencia);
  	$filas = mysql_num_rows($res);

  	echo "<h3><center>Lista de $filas Cines propios</center></h3>";

	for ($i=0;$i<$filas;$i++){
	$row = mysql_fetch_row($res);
?>
  <tr>
    <td align="center"><?php echo $row[2]; ?></td>
    <td align="center"><?php echo $row[3]; ?></td>
    <td align="center"><?php
    $salaspropias = 'SELECT COUNT(*) FROM '.$dbname.'.'.$dbpref.'salas WHERE id_cine='.$row[0];
    $salaspr= mysql_query($salaspropias);
    $rowdesalas = mysql_fetch_row($salaspr);
    echo $rowdesalas[0];
    ?></td>
    <td align="center"><?php echo "<A HREF='salas.php?id=".$row[0]."'><img src='../imagenes/+.gif' width='30' height='30' border=0></img></A>"; ?></td>
  </tr>

<?php
	}
	// Fin de la tabla
	echo '</table><hr align="center" width="40%">';
	
	// Fin de que NO exista la id de cine pasado
	}
	
	// Existe la id de cine pasado
	else
		{
		$iddecine=$_GET['id'];
?>

<h3><center>Nueva Sala</center></h3>
<center><H4>Los campos marcados con <sup>*</sup> son obligatorios</H4></center>

<table width="50%"  border="0" align="center" cellspacing="5"  bgcolor="#CCCC99">
 <form name="nuevo" method="get" action="crear_nueva_sala.php">
  <tr>
    <th width="40%" align="right">Nombre de la sala<sup>*</sup></th>
	<td width="60%"><input name="nombre" type="text" size="30" value="<?php
	$salaspropias = 'SELECT COUNT(*) FROM '.$dbname.'.'.$dbpref.'salas WHERE id_cine='.$iddecine;
    $salaspr= mysql_query($salaspropias);
    $rowdesalas = mysql_fetch_row($salaspr);
    echo "Sala ".($rowdesalas[0]+1);
	?>"></td>
  </tr>
  <tr>
	<th align="right">Filas<sup>*</sup></th>
	<td width="60%"><input name="x" type="text" size="30"></td>
  </tr>
  <tr>
	<th align="right">Butacas por fila<sup>*</sup></th>
	<td width="60%"><input name="y" type="text" size="30"></td>
  </tr>
    <tr>
	 <th><input name="idcine" type="hidden" value="<?php echo $iddecine; ?>"></th>
	 <td><input type="submit" value="Crear Sala"></td>
  </tr>
 </FORM>
</TABLE>


<?php
$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'salas WHERE id_cine='.$iddecine;
$res  = mysql_query($sentencia);
$filas = mysql_num_rows($res);

echo "<h3><center>Lista de $filas Salas</center></h3>";?>

<table width="90%" border="0" align="center" cellspacing="4">
  <tr>
    <th width="30%">Nombre</th>
	<th width="30%">Alto</th>
    <th width="20%">Ancho</th>
    <th>Acciones</th>
  </tr>
<?php
for ($i=0;$i<$filas;$i++){
	$row = mysql_fetch_row($res);
?>
  <tr>
    <td align="center"><?php echo $row[1]; ?></td>
    <td align="center"><?php echo $row[2]; ?></td>
    <td align="center"><?php echo $row[3]; ?></td>
	<TD align='center'><A HREF='editar_sala.php?id="<?php echo $row[0]; ?>"'><img src='../imagenes/editar.gif' width='30' height='30' border=0></img></A><A HREF='borrar_sala.php?id="<?php echo $row[0]; ?>"'><img src='../imagenes/no.gif' width='30' height='30' border=0></img></A></TD></TD>
  </tr>
<?php } ?>

</table>
<hr align="center" width="40%">

<?php
	
		}// existe la id de cine pasado
	pie();// en cialquier caso, incluyo el pie
	}

?>