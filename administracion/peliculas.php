<?php
	include 'cabeceraypie.php';
	if ($_SESSION["rango"] == 1){
	cabecera('',' onload="document.nuevo.nombre.focus()"');
	tabla('Películas');
?>


  <h3><center>Nueva Película</center></h3>
  <center><H4>Los campos marcados con <sup>*</sup> son obligatorios</H4></center>


<table width="50%"  border="0" align="center" cellspacing="5"  bgcolor="#CCCC99">
 <form name="nuevo" method="POST" action="crear_nueva_peli.php" enctype="multipart/form-data">
  <tr>
    <th width="40%" align="right">Título<sup>*</sup></th>
	<td width="60%"><input name="nombre" type="text" size="30"></td>
  <tr>
  </tr>
	<th align="right">Imagen</th>
	<td width="60%"><input type='file' name='userfile'></td>
  <tr>
  </tr>
    <th align="right">Género<sup>*</sup></th>
	<td width="60%"><select name='genero'>
	
	<?php
	// Consultamos todos los posibles valores de la columna ENUM
	$tabla = $dbname.'.'.$dbpref.'peliculas';
	$query = mysql_query("SHOW COLUMNS FROM $tabla LIKE 'genero'");

	// Creamos un Array con el resultado de la consulta
	$result = mysql_fetch_array($query);
	$result = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2",$result[1]));

	// Para cada resultado, creamos una opcion para el menu desplegable ;)
	foreach ($result AS $key) echo "<option value='$key'>$key</option>";
	?>
	
	</select></td>
  <tr>
  </tr>
	<th align="right">Descripción</th>
	<td width="60%"><input name="descripcion" type="text" size="30"></td>
  <tr>
  </tr>
	<th align="right">Duración (min.)</th>
	<td width="60%"><input name="duracion" type="text" size="25"></td>
  <tr>
    </tr>
	<th align="right">En cartelera</th>
	<td width="60%"><input name="activa" type="checkbox" value="si" checked></td>
  <tr>
  </tr>
	 <th></th>
	 <td><input type="submit" name="upload" value="Crear Película"></td>
  </tr>
 </form>
</table>

<br>
<hr align="center" width="52%"><br>

<?php

	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'peliculas ORDER BY activa DESC,id DESC';
  	$todas  = mysql_query($sentencia);
  	$filas = mysql_num_rows($todas);
  	
  	echo "<h3><center>Lista de $filas Películas</center></h3>";
  
  	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($todas);
  ?>
  
  
  <table width="95%" border="2" align="center" cellspacing="4" bordercolor="#666666">
  <tr>
    <th width="50%">T&iacute;tulo</th>
    <th width="25%">G&eacute;nero</th>
    <th width="15%">Duraci&oacute;n</th>
    <th width="10%">Editar</th>
  </tr>
  <tr>
    <td align="center"><?php echo $row[1]; ?></td>
    <td align="center"><?php echo $row[7]; ?></td>
	<td align="center"><?php echo $row[8]; ?></td>
    <td align="center"><A HREF='editar_.php?id=<? echo $row[0]; ?>'><img src='../imagenes/editar.gif' width='30' height='30' border=0></img></A></td>
  </tr>
  <tr>
    <th>Descripci&oacute;n</th>
    <th>Imagen</th>
    <th>En cartelera</th>
    <th>Borrar</th>
  </tr>
  <tr>
    <td align="center"><?php echo $row[6]; ?></td>
        <td align="center"><?php
    if ($row[2] != '') 
    	echo "<a href='../ver_archivo.php?id=.$row[0].'><img src='ver_imagen.php?id=".$row[0]."' width='50' heigth='100'></img></a>" 
    ?></td>
    <td align="center"><?php
    if ($row[9]==1)
    	echo "Sí";
    else
    	echo "No";?></td>
    <td align="center"><A HREF='borrar_.php?id="<? echo $row[0]; ?>"'><img src='../imagenes/no.gif' width='30' height='30' border=0></img></A></td>
  </tr>
  </TABLE><hr align="center" width="40%">
	
<?php
  }


pie();
?>


<?}?>