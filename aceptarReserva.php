<?
	include "cabecera.php";

	
	$reserva_temporal=$_SESSION['reserva_temporal'];
	$delete="Delete from butacas_temporal where id_reserva=".$reserva_temporal;
	$res=mysql_query($delete) or die ('Error en delete1');
	$delete2="Delete from reservas_temporal where id=".$reserva_temporal;
	$res=mysql_query($delete2) or die ('Error en delete2');
	
	if(isset($_SESSION['id_proy'])){
		$id_proy=$_SESSION['id_proy'];
		$sentencia="select ".$dbname.".".$dbpref."prov.nombre,".$dbname.".".$dbpref."l.nombre,".$dbname.".".$dbpref."c.nombre,".$dbname.".".$dbpref."s.nombre,".$dbname.".".$dbpref."pel.titulo,".$dbname.".".$dbpref."proy.fecha_proyeccion,".$dbname.".".$dbpref."proy.hora_inicio,".$dbname.".".$dbpref."c.precio,".$dbname.".".$dbpref."c.id
		from ".$dbname.".".$dbpref."proyecciones proy,".$dbname.".".$dbpref."cines c,".$dbname.".".$dbpref."localidades l,".$dbname.".".$dbpref."provincias prov,".$dbname.".".$dbpref."peliculas pel,".$dbname.".".$dbpref."salas s
		where ".$dbname.".".$dbpref."proy.id_sala=".$dbname.".".$dbpref."s.id and ".$dbname.".".$dbpref."c.id_localidad=".$dbname.".".$dbpref."l.id and ".$dbname.".".$dbpref."l.id_provincia=".$dbname.".".$dbpref."prov.id and ".$dbname.".".$dbpref."proy.id_pelicula=".$dbname.".".$dbpref."pel.id and ".$dbname.".".$dbpref."proy.id_pelicula=".$dbname.".".$dbpref."pel.id and ".$dbname.".".$dbpref."s.id_cine=".$dbname.".".$dbpref."c.id and ".$dbname.".".$dbpref."proy.id=".$id_proy;
		$busqueda=mysql_query($sentencia)or die ('Error en la consulta1');
	}
	if(isset($_SESSION['butacas'])){
		$butacas=$_SESSION['butacas'];
	}
	if(isset($_SESSION['array'])){
		$array=$_SESSION['array'];
	}
	if(isset($_POST['txtFp'])){
		$id_fp=$_POST['txtFp'];
		$importe=$_POST['txtImporte'];
		$dni=$_POST['txtDni'];
		
		$sentencia2="Insert into ".$dbname.".".$dbpref."reservas(id_proyeccion,dni,importe,id_fp,fecha_reserva) values(".$id_proy.",'".$dni."',".$importe.",".$id_fp.",NOW());";
		$res=mysql_query($sentencia2)or die ('Error en la sentencia2');
		
		$sentencia3="select max(id) from ".$dbname.".".$dbpref."reservas where ".$dbname.".".$dbpref."reservas.dni='".$dni."'";
		$busqueda2=mysql_query($sentencia3)or die ('Error en la consulta3');
		$row2=mysql_fetch_row($busqueda2);
		$id=$row2[0];
		for($i=0;$i<count($array);$i++){
			$sentencia4="Insert into ".$dbname.".".$dbpref."butacas(id_reserva,butaca) values(".$id.",".$array[$i].")";
			$res=mysql_query($sentencia4)or die ('Error en la consulta4');
		}
	}

		
	
		
?>
<h3><u>-Tu reserva se ha realizado con exito</u></h3><br>
<h3>-Estos son tu datos de la reserva:</h3><br>
<table align="center" border="3" width="800" bgcolor="C0C0C0">
<?
	while($row=mysql_fetch_row($busqueda)){
		echo "<tr class='tdGrid'><td><b>-Localidad :</b></td><td>".$row[1]."</td></tr>";
		echo "<tr class='tdGrid'><td><b>-Cine :</b></td><td>".$row[2]."</td></tr>";
		echo "<tr class='tdGrid'><td><b>-Sala :</b></td><td>".$row[3]."</td></tr>";
		echo "<tr class='tdGrid'><td><b>-Pelicula :</b></td><td>".$row[4]."</td></tr>";
		echo "<tr class='tdGrid'><td><b>-Fecha :</b></td><td>".$row[5]."</td></tr>";
		echo "<tr class='tdGrid'><td><b>-Sesion :</b></td><td>".$row[6]."</td></tr>";
		echo "<tr class='tdGrid'><td><b>-Butacas :</b></td><td>";
		for($i=0;$i<count($array);$i++){
			echo $array[$i].",";
		}
		echo "</td></tr>";
		$importe=$row[7]*count($array);
		echo "<tr class='tdGrid'><td><h3><b>-Precio Total :</b></td><td><b>".$importe."€</b></td></tr>";
		$id=$row[8];
		echo "<tr class='tdGrid'><td><b>-DNI :</b></td><td>".$dni."</td></tr>";
	}
?>
</td>
</tr>

</table><br>
<h3 align="center">Gracias por confiar en ©ALEDAL CINE ENTRADAS</h3><br>







<?php
	if($id_fp==1){
			echo "<script languaje='javascript'>window.print()</script>";
	}
	include "piePagina.php";
?>