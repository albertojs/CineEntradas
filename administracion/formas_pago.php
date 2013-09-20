<?php
	include 'cabeceraypie.php';
	if ($_SESSION["rango"] == 1){
	cabecera('',' onload="document.nuevo.nombre.focus()"');
	tabla('Formas de Pago');
?>


  <h3><center>Nueva Forma de pago</center></h3>
  <center><H4>Los campos marcados con <sup>*</sup> son obligatorios</H4></center>
<!-- Tabla de Nuevo Usuario-->

  
  <table width="50%"  border="0" align="center" cellspacing="5"  bgcolor="#CCCC99">
  <form name="nuevo" method="get" action="crear_nueva_forma.php">
    <tr>
      <th width="50%">Nombre<sup>*</sup></td>
      <th width="50%"></td>
    </tr>
    <tr>
      <td align="center"><input type="text" name="nombre" value=""></td>
      <td align="left"><input type="submit" value="Nuevo"></td>
    </tr>
	</form>
  </table>
<br>
<hr align="center" width="52%"><br>
    <h3><center>Lista de Formas de Pago</center></h3>
  <?php
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'formas_de_pago ORDER BY id';
  	$res  = mysql_query($sentencia);
  	$filas = mysql_num_rows($res);
  	
	echo '<table width="75%" border="0" align="center" cellspacing="5">' .
		'<tr>' .
		'<th width="10%">id</td>' .
		'<th width="50%">Nombre</td>' .
		'<th width="15%">Editar</td>' .
		'<th width="15%">Borrar</td>' .
		'</tr>';
	
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($res);
		echo "<TR>" .
				"<TD align='center'>".$row[0]."</TD>" .
				"<TD align='center'>".$row[1]."</TD>" .
				"<TD align='center'><A HREF='editar_forma.php?id=".$row[0]."'><img src='../imagenes/editar.gif' width='30' height='30' border=0></img></A></TD>" .
				"<TD align='center'><A HREF='borrar_forma.php?id=".$row[0]."'><img src='../imagenes/no.gif' width='30' height='30' border=0></img></A></TD></TD>";
			
		echo "</TR>";
	}
	echo '</TABLE>';
	echo ''; } 
	pie();

?>
