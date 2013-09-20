<?php

function rellena ($numero)
{
if ((strlen($numero)) == 1)
	$numero= "0".$numero;
return $numero;
}

	include 'cabeceraypie.php';
	if ($_SESSION["rango"] == 2){
	cabecera('',' onload="document.nuevo.x.focus()"');
	tabla('Calendario');

	// Si NO existe una id de cine pasado ni de sala ni el botón de opcion
	if (!isset($_GET['idcine']) AND !isset($_GET['idsala']) AND !isset($_GET['opcion']))
		{
		echo "<h3><center>Cines propios</center></h3>";
		?>
		<!--Tabla de los cines propietarios-->
<table width="90%" border="0" align="center" cellspacing="4">
  <tr>
    <th width="30%">Nombre</th>
	<th width="30%">Dirección</th>
    <th width="20%">Salas</th>
  </tr>

<?php	
$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'cines WHERE propietario='.$_SESSION["id"];

  	$res  = mysql_query($sentencia);
  	$filas = mysql_num_rows($res);

  	echo "<h3><center>Paso 1 de 3 - Seleccione uno de los $filas cines</center></h3>";

	for ($i=0;$i<$filas;$i++){
	$row = mysql_fetch_row($res);
	$salaspropias = 'SELECT COUNT(*) FROM '.$dbname.'.'.$dbpref.'salas WHERE id_cine='.$row[0];
    $salaspr= mysql_query($salaspropias);
    $rowdesalas = mysql_fetch_row($salaspr);
?>
  <tr>
  <?php
    if ($rowdesalas[0] > 0)
    	{
    	echo "<td align='center'><A HREF='calendario.php?idcine=$row[0]'>$row[2]</A></TD>";
    	echo "<td align='center'><A HREF='calendario.php?idcine=$row[0]'>$row[3]</A></TD>";
    	echo "<td align='center'><A HREF='calendario.php?idcine=$row[0]'>$rowdesalas[0]</A></TD>";
    	}    
    else
    	{
    	echo "<td align='center'>$row[2]</TD>";
    	echo "<td align='center'>$row[3]</TD>";
    	echo "<td align='center'>$rowdesalas[0]</TD>";
    	}
    ?>
  </tr>

<?php
	}
	// Fin de la tabla
	echo '</table><hr align="center" width="40%">';
	
	}//NO existe una id de cine pasado ni de sala


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


	// Si existe idcine pero NO existe idsala
	else if (isset($_GET['idcine']) AND !isset($_GET['idsala']))
	{
	$idcine=$_GET['idcine'];
	
	// Cojo los datos del cine
	$sentencia = 'SELECT * from '.$dbname.'.'.$dbpref.'cines WHERE id = '.$idcine;
	$lanzada   = mysql_query ($sentencia);
	$datoscine = mysql_fetch_row ($lanzada);

	echo "<h3><center>Salas del cine '".$datoscine[2]."'</center></h3>";
	$sentencia = 'SELECT * FROM '.$dbname.'.'.$dbpref.'salas WHERE id_cine='.$idcine;
	$res  = mysql_query($sentencia);
	$filas = mysql_num_rows($res);
	
	echo "<h3><center>Paso 2 de 3 - Seleccione una de las $filas salas</center></h3>"; ?>
	
	<table width="90%" border="0" align="center" cellspacing="4">
	  <tr>
	    <th width="30%">Nombre</th>
		<th width="30%">Filas</th>
	    <th width="20%">Butacas</th>
	  </tr>
	<?php
	for ($i=0;$i<$filas;$i++){
		$row = mysql_fetch_row($res);
	?>
	  <tr>
	    <td align="center"><A HREF="calendario.php?idcine=<?php echo $idcine; ?>&idsala=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></A></td>
	    <td align="center"><A HREF="calendario.php?idcine=<?php echo $idcine; ?>&idsala=<?php echo $row[0]; ?>"><?php echo $row[2]; ?></A></td>
	    <td align="center"><A HREF="calendario.php?idcine=<?php echo $idcine; ?>&idsala=<?php echo $row[0]; ?>"><?php echo $row[3]; ?></A></td>
	  </tr>
	<?php } ?>
	
	</table>
	<hr align="center" width="40%">
<?php		
		
	}// Si existe idcine pero NO existe idsala
	
	
	
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////	
	
	
	
	// Existe idcine e idsala pero no opcion
	else if (!isset($_GET['opcion']))
		{
			
		$idcine = $_GET['idcine'];
		$idsala = $_GET['idsala'];
		
	// Cojo los datos del cine y de la sala
	$sentencia = 'SELECT * from '.$dbname.'.'.$dbpref.'cines WHERE id = '.$idcine;
	$lanzada   = mysql_query ($sentencia);
	$datoscine = mysql_fetch_row ($lanzada);
	$sentencia = 'SELECT * from '.$dbname.'.'.$dbpref.'salas WHERE id = '.$idsala;
	$lanzada   = mysql_query ($sentencia);
	$datossala = mysql_fetch_row ($lanzada);		
		
		
	echo "<h3><center>Películas en sala '".$datossala[1]."' del cine '".$datoscine[2]."'</center></h3>";


	// Miramos todas las pelis que hay en esa sala
	$sentencia = 'SELECT DISTINCT (id_pelicula) FROM '.$dbname.'.'.$dbpref.'proyecciones WHERE id_sala='.$idsala;
	$res  = mysql_query($sentencia);
	$filas = mysql_num_rows($res);

	echo "<h3><center>Paso 3 de 3 - Ubicación de las películas en la sala (Ya hay $filas sesiones)</center></h3>"; ?>
	
	<table width="90%" border="0" align="center" cellspacing="4">
	  <tr>
	    <th width="50%">Película</th>
		<th width="25%">Hora de inicio</th>
		<th width="25%">En cartel hasta</th>
	  </tr>
	<?php
	for ($i=0;$i<$filas;$i++){
		// Por cada película, ponemos los datos
		$row = mysql_fetch_row($res);
		$query="SELECT * FROM proyecciones,peliculas WHERE proyecciones.id_pelicula=peliculas.id AND proyecciones.id_pelicula=".$row[0]." ORDER BY fecha_proyeccion DESC LIMIT 1";
		$respuesta  = mysql_query($query);	
		$lanzo = mysql_fetch_row($respuesta);
	?>
	  <tr>
	    <td align="center"><?php echo $lanzo[6]; ?></td>
	    <td align="center"><?php echo $lanzo[3]; ?></td>
	    <td align="center"><?php echo $lanzo[4]; ?></td>
	  </tr>


	<?php } ?>
	<tr>
	    <td align="center"></td>
	    <td align="center"><form name="nuevo" method="get"><input type="hidden" name="idcine" value="<?php echo $idcine; ?>"><input type="hidden" name="idsala" value="<?php echo $idsala; ?>"><input type="Submit" value="Editar Calendario" name="opcion"></form></td>
	    <td align="center"></td>
	  </tr>
	</table>
	<hr align="center" width="40%">
		<?php
		}//Existe idcine e idsala



////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


	// Existe idcine, idsala y la opción de editar
	else
	{
	$idcine = $_GET['idcine'];
	$idsala = $_GET['idsala'];
	
	
	// Cojo los datos del cine y de la sala
	$sentencia = 'SELECT * from '.$dbname.'.'.$dbpref.'cines WHERE id = '.$idcine;
	$lanzada   = mysql_query ($sentencia);
	$datoscine = mysql_fetch_row ($lanzada);
	$sentencia = 'SELECT * from '.$dbname.'.'.$dbpref.'salas WHERE id = '.$idsala;
	$lanzada   = mysql_query ($sentencia);
	$datossala = mysql_fetch_row ($lanzada);		

	echo "<h3><center>Películas en sala '".$datossala[1]."' del cine '".$datoscine[2]."'</center></h3>";


	// Miramos todas las pelis que hay en esa sala
	$sentencia = 'SELECT (id) FROM '.$dbname.'.'.$dbpref.'proyecciones WHERE id_sala='.$idsala.' GROUP BY (hora_inicio)';
	$res  = mysql_query($sentencia);
	$filas = mysql_num_rows($res);
	
	echo "<h3><center>Paso 3 de 3 - Ubicación de las películas en la sala (Máximo 4 sesiones)</center></h3>"; ?>
	<table width="90%" border="0" align="center" cellspacing="4">
	<form name="adf" action="editar_calendario.php" method="GET">
	<input type="hidden" name="idcine" value="<?php echo $idcine; ?>">
	<input type="hidden" name="idsala" value="<?php echo $idsala; ?>">
	  <tr>
	    <th width="33%">Película</th>
		<th width="33%">Hora de inicio</th>
		<th width="33%">En cartel hasta</th>
	  </tr>
	<?php
	for ($i=0;$i<$filas;$i++)
	{
	// Por cada película, ponemos los datos
	$row = mysql_fetch_row($res);
	$query="SELECT * FROM ".$dbname.".".$dbpref."proyecciones,".$dbname.".".$dbpref."peliculas WHERE ".$dbname.".".$dbpref."proyecciones.id_pelicula=".$dbname.".".$dbpref."peliculas.id AND ".$dbname.".".$dbpref."proyecciones.id=".$row[0]." ORDER BY fecha_proyeccion DESC LIMIT 1";
	$respuesta  = mysql_query($query);	
	$lanzo = mysql_fetch_row($respuesta);

	// Y de esa última película, cojo la fecha, mediante subcadenas
	$ano=substr($lanzo[4],0,4);
	$mes=substr($lanzo[4],5,2);
	$dia=substr($lanzo[4],8,2);
	?>
	  <tr>
	  	<input type="hidden" name="sesion[]" value="<?php echo "$lanzo[0]"; ?>">
	    <td align="center"><?php
	    
	    $pelis = 'SELECT * FROM '.$dbname.'.'.$dbpref.'peliculas WHERE activa=1';
	    $senpel  = mysql_query($pelis);
		$numpelis = mysql_num_rows($senpel);
		echo "<select name='peli[]'>";
		
		for ($j=0;$j<$numpelis;$j++){

			$peliactual = mysql_fetch_row($senpel);
			echo "<option value='$peliactual[0]'";
			if ($lanzo[2]==$peliactual[0])
				{
				echo " selected ";
				$activada = true; 
				}
			echo ">$peliactual[1]</option>";
		}
		
	    echo "<option";
	    	if ($activada != true)
	    		echo " selected ";
		echo "></option></select>";
	    ?></td>
	    <td align="center"><?php echo $lanzo[3]; ?></td>
	    <td align="center"><?php echo $lanzo[4]; ?></td>	   
	  </tr>
	  
	<? } ?>
	
	  <tr>
	    <th>Película</th>
		<th>Hora de inicio</th>
		<th>En cartel hasta</th>
	  </tr>
		  <tr>
	  
<td align="center">
	    <?php
	    $pelis = 'SELECT * FROM '.$dbname.'.'.$dbpref.'peliculas WHERE activa=1';
	    $senpel  = mysql_query($pelis);
		$numpelis = mysql_num_rows($senpel);
		echo "<select name='pelicula_nuevo'>";
		$activada=false;
		for ($j=0;$j<$numpelis;$j++){
			
			$peliactual = mysql_fetch_row($senpel);
			echo "<option value='$peliactual[0]'";
			if ($row[2]==$peliactual[0])
				{
				echo " selected ";
				$activada = true; 
				}
			echo ">$peliactual[1]</option>";
			
		}
		
	    echo "<option";
	    	if ($activada != true)
	    		echo " selected ";
		echo "></option></select></td>";

	    ?></td>
	  
	  <td align="center"><?php
	    echo "<select name='horas_nuevo'>";
	    for ($contador=15;$contador<25;$contador++)
	    	{
	    	$escribe = $contador;	
	    	if ($contador == 24)
	    		$escribe = 00;

    		echo "<option value='".rellena($escribe)."'";
    			if ($hora == $escribe)
    				echo " selected ";
			echo">".rellena($escribe)."</option>";

	    	}
	    echo "<option";
	    	if ($activada != true)
	    		echo " selected ";
		echo "></option>";

		
	    echo "</select><b>:</b><select name='minutos_nuevo'>";
	    for ($contador=00;$contador<60;$contador++)
	    	{
    		echo "<option value='".rellena($contador)."'";
    			if ($minuto == $contador)
    				echo " selected ";
			echo">".rellena($contador)."</option>";
	    	}
	    echo "<option";
	    	if ($activada == false)
	    		echo " selected ";
		echo "></option></select>";
	    
	    ?></td>
	  
	  	<td align="center">
	<?
  	// fecha
  	
	$dia=date('d');
	$mes=date('m');
	$ano=date('Y');
	$dia=$dia+7;

	// si el dia es mayor de 25
	if ($dia >30)
		{
		if ($mes != 12 )	
			{
			$dia = 1;
			$mes++;
			}
		else
			{
			$dia = 5;
			$mes = 1;
			$ano++;
			}
		}
	  
	  ?>
		
	    <select name="ano_nuevo">
	    <?php for ($cont=$ano;$cont<$ano+2;$cont++)
	    		{	    
	    		echo "<option value='$cont'";
	    		if ($ano == $cont)
	    			echo " selected ";
	    		echo ">$cont</option>"; }?>
	    </select>
	    
	    <select name="mes_nuevo">
	    <?php for ($cont=1;$cont<13;$cont++)
	    		{	    
	    		echo "<option value='$cont'";
	    		if ($mes == $cont)
	    			echo " selected ";
	    		echo ">$cont</option>"; }?>
	    </select>
	    
	    <select name="dia_nuevo">
	    <?php for ($cont=1;$cont<32;$cont++)
	    		{	    
	    		echo "<option value='$cont'";
	    		if ($dia == $cont)
	    			echo " selected ";
	    		echo ">$cont</option>"; }?>
	    </select>
		</td>
	  
	  
	  </td>
	  
	  </tr>
	
	
	<!-- Último campo de guardar-->
	<tr>
	    <td align="center"></td>
	    <td align="center">
	    <input type="Submit" value="Guardar Calendario" name="opcion"></td>
	    <td align="center"></td>
	  </tr>
	</form>
	</table>
	<hr align="center" width="40%">

		<?php
	}//opcion actual

  }//rango 2
	
	else
		echo "Careces de permisos para administrar esta sección";

pie();
?>