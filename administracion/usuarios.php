<?php
	include 'cabeceraypie.php';
	if ($_SESSION["rango"] == 1){
	cabecera('',' onload="document.nuevo.nombre.focus()"');
	tabla('Administración de Usuarios');
?>


  <h3><center>Nuevo Usuario</center></h3>
  <center><H4>Los campos marcados con <sup>*</sup> son obligatorios</H4></center>
<!-- Tabla de Nuevo Usuario-->

  <form name="nuevo" method="get" action="crear_nuevo_usuario.php" onSubmit="CalculaMD5()">
  <table width="75%"  border="0" align="center" cellspacing="5">
    <tr>
      <th width="40%">Nombre<sup>*</sup></td>
      <th width="40%">Password<sup>*</sup></td>
      <th width="10%">Rango<sup>*</sup></td>
      <th width="10%"></td>
    </tr>
    <tr>
      <td align="center"><input type="text" name="nombre" value=""></td>
      <td align="center"><input type="password" name="password" value=""></td>
      <td align="center"><select name="tipo">
        <option value="1">Administrador</option>
        <option value="2">Propietario de cine</option>
      </select></td>
      <td align="center"><input type="submit" value="Nuevo"></td>
    </tr>
  </table>
</form><br>
<hr align="center" width="52%"><br>
    
  <?php
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'administradores ORDER BY rango,id';
  	$usuarios  = mysql_query($sentencia);
  	$filas = mysql_num_rows($usuarios);
  	
  	echo "<h3><center>Lista de $filas usuarios</center></h3>";
  	
	echo '<table width="75%" border="0" align="center" cellspacing="5">' .
		'<tr>' .
		'<th width="10%">id</td>' .
		'<th width="50%">Nombre</td>' .
		'<th width="10%">Rango</td>' .
		'<th width="15%">Editar</td>' .
		'<th width="15%">Borrar</td>' .
		'</tr>';
	
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($usuarios);
		echo "<TR>" .
				"<TD align='center'>".$row[0]."</TD>" .
				"<TD align='center'>".$row[1]."</TD>" .
				"<TD align='center'>";
				if ($row[3] == 1)
					echo "Administrador";
				else
					echo "Propietario";
				echo "</TD>" .
				"<TD align='center'><A HREF='editar_usuario.php?id=".$row[0]."'><img src='../imagenes/editar.gif' width='30' height='30' border=0></img></A></TD>" .
				"<TD align='center'>";
		if ($_SESSION["nombre"] != $row[1])
			echo "<A HREF='borrar_usuario.php?id=".$row[0]."'><img src='../imagenes/no.gif' width='30' height='30' border=0></img></A></TD>";
		else
			echo "</TD>";
			
		echo "</TR>";
	}
	echo '</TABLE>';
  ?>


<script language="JavaScript" type="text/javascript" src="../js/md5.js"></script>


<script language="JavaScript" type="text/javascript">
  function CalculaMD5(){
  	document.nuevo.password.value=hex_md5(document.nuevo.nombre.value+document.nuevo.password.value)
  }
</script>

<?php echo ''; } pie(); ?>
