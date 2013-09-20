<?	
	$regenerar=1;
	include "cabecera.php";
	
	
	
	$delete="Delete from ".$dbname.".".$dbpref."reservas_temporal where ".$dbname.".".$dbpref."reservas_temporal.fecha<(Select TIME_TO_SEC(NOW())-12000)";
	mysql_query($delete) or die('Error en delete de now()');
	$valor2=1;
	
	if(isset($_GET['valor'])){
		$valor=1;
		
	}
	else{
		$valor=0;	
	}


	if(isset($_GET['id_proy'])){
		$id_proy=$_GET['id_proy'];
		
		$sentencia="select ".$dbname.".".$dbpref."prov.nombre,".$dbname.".".$dbpref."l.nombre,".$dbname.".".$dbpref."c.nombre,".$dbname.".".$dbpref."s.nombre,".$dbname.".".$dbpref."pel.titulo,".$dbname.".".$dbpref."proy.fecha_proyeccion,".$dbname.".".$dbpref."proy.hora_inicio,".$dbname.".".$dbpref."c.precio,".$dbname.".".$dbpref."c.id
		from ".$dbname.".".$dbpref."proyecciones proy,".$dbname.".".$dbpref."cines c,".$dbname.".".$dbpref."localidades l,".$dbname.".".$dbpref."provincias prov,".$dbname.".".$dbpref."peliculas pel,".$dbname.".".$dbpref."salas s
		where ".$dbname.".".$dbpref."proy.id_sala=".$dbname.".".$dbpref."s.id and ".$dbname.".".$dbpref."c.id_localidad=".$dbname.".".$dbpref."l.id and ".$dbname.".".$dbpref."l.id_provincia=".$dbname.".".$dbpref."prov.id and ".$dbname.".".$dbpref."proy.id_pelicula=".$dbname.".".$dbpref."pel.id and ".$dbname.".".$dbpref."proy.id_pelicula=".$dbname.".".$dbpref."pel.id and ".$dbname.".".$dbpref."s.id_cine=".$dbname.".".$dbpref."c.id and ".$dbname.".".$dbpref."proy.id=".$id_proy;
		$busqueda=mysql_query($sentencia)or die ('Error en la consulta 1');
		$campos=mysql_num_fields($busqueda);
		$filas=mysql_num_rows($busqueda);
		$_SESSION['id_proy']=$id_proy;
	}
	if(isset($_GET['butacas'])){
		$butacas=$_GET['butacas'];
		$_SESSION['butacas']=$butacas;
		
		$j=0;
		for($i=1;$i<=$butacas;$i++){
			
			if(isset($_GET["asiento".$i])&&$_GET["asiento".$i]==1){
				$array[$j]=$i;
				$j=$j+1;
				$_SESSION['array']=$array;
				$valor=1;
			}
			
		}
		
	}
	
	
	if(isset($_POST['id_proy'])){
		$id_proy=$_POST['id_proy'];
		
		$sentencia="select ".$dbname.".".$dbpref."prov.nombre,".$dbname.".".$dbpref."l.nombre,".$dbname.".".$dbpref."c.nombre,".$dbname.".".$dbpref."s.nombre,".$dbname.".".$dbpref."pel.titulo,".$dbname.".".$dbpref."proy.fecha_proyeccion,".$dbname.".".$dbpref."proy.hora_inicio,".$dbname.".".$dbpref."c.precio,".$dbname.".".$dbpref."c.id
		from ".$dbname.".".$dbpref."proyecciones proy,".$dbname.".".$dbpref."cines c,".$dbname.".".$dbpref."localidades l,".$dbname.".".$dbpref."provincias prov,".$dbname.".".$dbpref."peliculas pel,".$dbname.".".$dbpref."salas s
		where ".$dbname.".".$dbpref."proy.id_sala=".$dbname.".".$dbpref."s.id and ".$dbname.".".$dbpref."c.id_localidad=".$dbname.".".$dbpref."l.id and ".$dbname.".".$dbpref."l.id_provincia=".$dbname.".".$dbpref."prov.id and ".$dbname.".".$dbpref."proy.id_pelicula=".$dbname.".".$dbpref."pel.id and ".$dbname.".".$dbpref."proy.id_pelicula=".$dbname.".".$dbpref."pel.id and ".$dbname.".".$dbpref."s.id_cine=".$dbname.".".$dbpref."c.id and ".$dbname.".".$dbpref."proy.id=".$id_proy;
		$busqueda=mysql_query($sentencia)or die ('Error en la consulta 2');
		$campos=mysql_num_fields($busqueda);
		$filas=mysql_num_rows($busqueda);
		$_SESSION['id_proy']=$id_proy;
	}
	if(isset($_POST['butacas'])){
		$butacas=$_POST['butacas'];
		$_SESSION['butacas']=$butacas;
		$h=0;
		$j=0;
		for($i=1;$i<=$butacas;$i++){
			
			if(isset($_POST["asiento".$i])&&$_POST["asiento".$i]==1){
				$array[$j]=$i;
				$j=$j+1;
				$_SESSION['array']=$array;
				$valor=1;
				
				$temp="select ".$dbname.".".$dbpref."r.id_proyeccion,".$dbname.".".$dbpref."b.butaca from ".$dbname.".".$dbpref."reservas_temporal r,".$dbname.".".$dbpref."butacas_temporal b where ".$dbname.".".$dbpref."r.id=".$dbname.".".$dbpref."b.id_reserva and ".$dbname.".".$dbpref."r.id_proyeccion=".$id_proy." and ".$dbname.".".$dbpref."b.butaca=".$i;
				
				$temp2="select ".$dbname.".".$dbpref."r.id_proyeccion,".$dbname.".".$dbpref."b.butaca from ".$dbname.".".$dbpref."reservas r,".$dbname.".".$dbpref."butacas b where ".$dbname.".".$dbpref."r.id=".$dbname.".".$dbpref."b.id_reserva and ".$dbname.".".$dbpref."r.id_proyeccion=".$id_proy." and ".$dbname.".".$dbpref."b.butaca=".$i;
			
				$ocupado2=mysql_query($temp2) or die ('Error en temp');
				$ocupado=mysql_query($temp) or die ('Error en temp2');
				if(mysql_num_rows($ocupado)>0 || mysql_num_rows($ocupado2)>0){
					$valor2=0;
					$butacas_ocupadas[$h]=$i;
					$h=$h+1;
				}
				
			}
			
			
		}
		
	}
	
	
	$array=	$_SESSION['array'];
if($valor2==0){
	echo"<h3><center>-Algunas de las butacas seleccionadas han sido seleccionadas o reservadas por un cliente anterior</center></h3><br>";
	echo "<h3><center>Las butacas en conflicto son las nº:</center></h3><br>";
	for($i=0;$i<count($butacas_ocupadas);$i++){
	?>
	<b><?echo $butacas_ocupadas[$i];?>,</b>
	<?
	}
	echo "<br><br><center><h2><b><input type='button' value='Volver a elegir Butacas' onclick='window.history.back()'></b></h2></center><br>";
}
else{
	
	if(!isset($_GET['valor'])){
		$butacas_temp="Insert into ".$dbname.".".$dbpref."reservas_temporal(id_proyeccion,fecha) values(".$id_proy.",TIME_TO_SEC(TIME(NOW())))";
		
		mysql_query($butacas_temp)or die ('Error en reservas_temp');
		$select="select max(id) from ".$dbname.".".$dbpref."reservas_temporal";
		$select2=mysql_query($select);
		$select=mysql_fetch_row($select2);
		$_SESSION['reserva_temporal']=$select[0];
		
		for($i=0;$i<count($array);$i++){
			$insert="Insert into ".$dbname.".".$dbpref."butacas_temporal(id_reserva,butaca) values(".$select[0].",".$array[$i].")";
			mysql_query($insert)or die ('Error en butacas_temp');
		}
	}
if($valor==1){
	
	?> 

<h2 align="center"><u>-Datos de la reserva</u></h2><br>
<table align="center" border="3" width="800" bgcolor="C0C0C0">

<?
	while($row=mysql_fetch_row($busqueda)){
		echo "<tr  class='tdGrid'><td><b>-Localidad :</b></td><td>".$row[1]."</td></tr>";
		echo "<tr  class='tdGrid'><td><b>-Cine :</b></td><td>".$row[2]."</td></tr>";
		echo "<tr  class='tdGrid'><td><b>-Sala :</b></td><td>".$row[3]."</td></tr>";
		echo "<tr  class='tdGrid'><td><b>-Pelicula :</b></td><td>".$row[4]."</td></tr>";
		echo "<tr  class='tdGrid'><td><b>-Fecha :</b></td><td>".$row[5]."</td></tr>";
		echo "<tr  class='tdGrid'><td><b>-Sesion :</b></td><td>".$row[6]."</td></tr>";
		echo "<tr  class='tdGrid'><td><b>-Numero de las Butacas:</b></td><td>";
		for($i=0;$i<count($array);$i++){
			echo $array[$i].",";
		}
		
		echo "</td></tr>";
		$importe=$row[7]*count($array);
		echo "<tr class='tdGrid'><td><h3><b>-Precio Total :</b></td><td><b>".$importe."€</b></td></tr>";
		
		$id=$row[8];
	}
?>
</td>
</tr>
</table><br>

<table align="center" border="0" width="800" >
<tr><td>
<?
		$sentencia2="select ".$dbname.".".$dbpref."fp.id,".$dbname.".".$dbpref."fp.nombre from ".$dbname.".".$dbpref."cines_formas_de_pago cfp,".$dbname.".".$dbpref."formas_de_pago fp,".$dbname.".".$dbpref."cines c
			where ".$dbname.".".$dbpref."cfp.id_cine=".$dbname.".".$dbpref."c.id and ".$dbname.".".$dbpref."cfp.id_forma=".$dbname.".".$dbpref."fp.id and ".$dbname.".".$dbpref."c.id=".$id;
		$busqueda2=mysql_query($sentencia2)or die ('Error en la consulta 3');
		
		echo "<table align='left' border='0'>";
		echo "<tr><td><h3><u>-Elige una opcion de pago:</h3><br></td></tr>";
		
		echo "<tr><td><select name='id_fp' onchange='location.href=this.value'>";
		echo "<option value='reservas.php?id_proy=".$id_proy."&butacas=".$butacas."&id_fp='0'&valor=".$valor."'></option>";
	
		while($row2=mysql_fetch_row($busqueda2)){
			echo "<option value='reservas.php?id_proy=".$id_proy."&butacas=".$butacas."&id_fp=".$row2[0]."&valor=".$valor."'>".$row2[1]."</option>";
		}
		echo "</select></td></tr>";
		echo "</table></td>";
?>

<?	if(isset($_GET['id_fp'])){
		$id_fp=$_GET['id_fp'];
		if($id_fp==1){
			echo "<form name='form1' onsubmit='return validar()' action='aceptarReserva.php' method='POST'>";
			echo "<input type='hidden' name='txtImporte' value='".$importe."'>";
			echo "<input type='hidden' name='txtFp' value='1'>";
			echo "<td><br><br><table border='3' align='right'><tr class='tdGrid'><td><table align='right' border='0' width='370'>";
			echo "<tr><td align='center'><b><u>-EFECTIVO:</b></u></td></tr>";
			echo "<tr><td align='center'><b>-Al aceptar la reserva se imprimira una factura que debera ser entregada en el cine a la hora de pagar para que le sean entregadas las entradas.</b></td></tr>" .
					"<tr><td align='center'><br><b>-DNI :  </b><input type='text' name='txtDni' maxlength='9' size='10'></td></tr><br><tr><td align='center'><br><input type='submit' size='20' value='Aceptar Reserva de Entradas'></td></tr>";
			echo "</table></td></tr></table></td></tr>";
			echo "</form>";
		}
		else if($id_fp==2){
			echo "<form name='form2' onsubmit='return validar2()' action='aceptarReserva.php' method='POST'>";
			echo "<input type='hidden' name='txtImporte' value='".$importe."'>";
			echo "<input type='hidden' name='txtFp' value='2'>";
			echo "<td><br><br><table border='3' align='right'><tr class='tdGrid'><td><table align='right' border='0' width='370'>";
			echo "<tr><td align='center'><b><u>-VISA :</b></u></td></tr>";
			echo "<tr><td><b>-DNI :</b></td><td><input type='text' name='txtDni' maxlength='9' size='10'></td></tr>";
			echo "<tr><td><b>-Numero Tarjeta :</b></td><td><input type='text' name='txtTarjeta1' maxlength='4' size='5'>" .
					"<input type='text' name='txtTarjeta2' maxlength='4' size='5'>" .
					"<input type='text' name='txtTarjeta3' maxlength='4' size='5'>" .
					"<input type='text' name='txtTarjeta4' maxlength='4' size='5'></td></tr>" .
					"<tr><td></td><td><br><input type='submit' size='20' value='Aceptar Reserva de Entradas'></td></tr>";
			echo "</table></td></tr></table></td></tr>";
			echo "</form>";
		}
		else if($id_fp==3){
			echo "<form name='form3' onsubmit='return validar3()' action='aceptarReserva.php' method='POST'>";
			echo "<input type='hidden' name='txtImporte' value='".$importe."'>";
			echo "<input type='hidden' name='txtFp' value='3'>";
			echo "<td><br><br><table border='3' align='right'><tr class='tdGrid'><td><table align='right' border='0' width='370'>";
			echo "<tr><td align='center'><b><u>-MASTERCARD :</b></u></td></tr>";
			echo "<tr><td><b>-DNI :</b></td><td><input type='text' name='txtDni' maxlength='9' size='10'></td></tr>";
			echo "<tr><td><b>-Numero Tarjeta :</b></td><td><input type='text' name='txtTarjeta1' maxlength='4' size='5'>" .
					"<input type='text' name='txtTarjeta2' maxlength='4' size='5'>" .
					"<input type='text' name='txtTarjeta3' maxlength='4' size='5'>" .
					"<input type='text' name='txtTarjeta4' maxlength='4' size='5'></td></tr>" .
					"<tr><td></td><td><br><input type='submit' size='20' value='Aceptar Reserva de Entradas'></td></tr>";
			echo "</table></td></tr></table></td></tr>";
			echo "</form>";
		}
		else if($id_fp==4){
			echo "<form name='form4' onsubmit='return validar4()' action='aceptarReserva.php' method='POST'>";
			echo "<input type='hidden' name='txtImporte' value='".$importe."'>";
			echo "<input type='hidden' name='txtFp' value='4'>";
			echo "<td><br><br><table border='3' align='right'><tr class='tdGrid'><td><table align='right' border='0' width='370'>";
			echo "<tr><td align='center'><b><u>-PAYPAL :</b></u></td></tr>";
			echo "<tr><td><b>-DNI :</b></td><td><input type='text' name='txtDni' maxlength='9' size='10'></td></tr>";
			echo "<tr><td><b>-Correo Electronico :</b></td><td><input type='text' name='txtEmail' maxlength='50' size='35'></td></tr>" .
					"<tr><td></td><td><br><input type='submit' size='20' value='Aceptar Reserva de Entradas'></td></tr>";
			echo "</table></td></tr></table></td></tr>";
			echo "</form>";
		}
		else if($id_fp==5){
			echo "<form name='form5' onsubmit='return validar5()' action='aceptarReserva.php' method='POST'>";
			echo "<input type='hidden' name='txtImporte' value='".$importe."'>";
			echo "<input type='hidden' name='txtFp' value='5'>";
			echo "<td><br><br><table border='3' align='right'><tr class='tdGrid'><td><table align='right' border='0' width='370'>";
			echo "<tr><td align='center'><b><u>-MOBIPAY :</b></u></td></tr>";
			echo "<tr><td><b>-DNI :</b></td><td><input type='text' name='txtDni' maxlength='9' size='10'></td></tr>";
			echo "<tr><td><b>-Numero Telefono :</b></td><td><input type='text' name='txtTlf' maxlength='9' size='10'></td></tr>" .
					"<tr><td></td><td><br><input type='submit' size='20' value='Aceptar Reserva de Entradas'></td></tr>";
			echo "</table></td></tr></table></td></tr>";
			echo "</form>";
		}
	}
?>
</table>
<script languaje="javascript" type="text/javascript">
	function validar(){
		if(document.form1.txtDni.value==""){
			alert("Es Necesario rellenar todos los campos")
			return false
		}
		else{
			return true
		}
	}
	
	function validar2(){
		if(document.form2.txtDni.value==""||document.form2.txtTarjeta1.value==""||document.form2.txtTarjeta2.value==""||document.form2.txtTarjeta3.value==""||document.form2.txtTarjeta4.value==""){
			alert("Es Necesario rellenar todos los campos")
			return false
		}
		else{
			return true
		}
		
	}
	function validar3(){
		if(document.form3.txtDni.value==""||document.form3.txtTarjeta1.value==""||document.form3.txtTarjeta2.value==""||document.form3.txtTarjeta3.value==""||document.form3.txtTarjeta4.value==""){
			alert("Es Necesario rellenar todos los campos")
			return false
		}
		else{
			return true
		}
		
	}
	function validar4(){
		if(document.form4.txtDni.value==""||document.form4.txtEmail.value==""){
			alert("Es Necesario rellenar todos los campos")
			return false
		}
		else{
			return true
		}
		
		
	}
	function validar5(){
		if(document.form5.txtDni.value==""||document.form5.txtTlf.value==""){
			alert("Es Necesario rellenar todos los campos")
			return false
		}
		else{
			return true
		}
	}
</script>
<?
}
else{
	echo"<br><center><h2><b>Para hacer una reserva es necesario elegir al menos una butaca</b></h2></center><br>";
	echo "<center><h2><b><input type='button' value='Volver a elegir Butacas' onclick='window.history.back()'></b></h2></center><br>";
	
}
}
?>
<?php
	include "piePagina.php";
?>