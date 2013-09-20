<?php
	include "cabecera.php";
	$_SESSION['array']=$array;
	if(isset($_GET['id_cine'])){
		$id_cine=	$_GET['id_cine'];
	}
	$sentencia="select proy.id,pel.titulo
				from proyecciones proy,salas s,cines c,peliculas pel
				where proy.id_sala=s.id and proy.id_pelicula=pel.id and s.id_cine=c.id and c.id=".$id_cine.";";
	$busqueda=mysql_query($sentencia);
?>
<table align="center"><tr>
<td>
<form name="form2" action="reservas.php" method="POST">
<h4>-PELICULA: </h4></td></tr>
<tr><td><select name="id_proy"><?while($row = mysql_fetch_row($busqueda)){echo "<option value='".$row[0]."'>".$row[1]."</option>";}?></select></td></tr>

<p align="center">&nbsp;</p>
  <form name="form2" method="POST" action="reservas.php">
<table width="200"  border="0" align="center" cellspacing="0" bgcolor="#007070">
 	<br><tr>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento0" width="25" height="25" onClick="CambiaImagen('asiento0')"><input type="hidden" name="asiento0" value="0"></div></td>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento1" width="25" height="25" onClick="CambiaImagen('asiento1')"><input type="hidden" name="asiento1" value="0"></div></td>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento2" width="25" height="25" onClick="CambiaImagen('asiento2')"><input type="hidden" name="asiento2" value="0"></div></td>
  </tr>
  <tr>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento3" width="25" height="25" onClick="CambiaImagen('asiento3')"><input type="hidden" name="asiento3" value="0"></div></td>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento4" width="25" height="25" onClick="CambiaImagen('asiento4')"><input type="hidden" name="asiento4" value="0"></div></td>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento5" width="25" height="25" onClick="CambiaImagen('asiento5')"><input type="hidden" name="asiento5" value="0"></div></td>
  </tr>
    <tr>
    <td><div align="center"><img src="imagenes/ocupado.png" name="asiento6" width="24" height="24" onClick="CambiaImagen('asiento6')"></div></td>
    <td><div align="center"><img src="imagenes/ocupado.png" name="asiento7" width="24" height="24" onClick="CambiaImagen('asiento7')"></div></td>
    <td><div align="center"><img src="imagenes/libre.png" name="asiento8" width="25" height="25" onClick="CambiaImagen('asiento8')"><input type="hidden" name="asiento8" value="0"></div></td>
  </tr>
</table>
    <div align="center">
		<input type="hidden" name="butacas" value="9">
      
   </div>
 
 <p>&nbsp;</p>
 <p align="center">
</p>

<br>
<tr><td><input type ="submit" value="Enviar"></td></tr>
</form>
</table>
<SCRIPT languaje="javascript" type="text/javascript">
	function CambiaImagen (nombre) {
		if (document[nombre].width == "25"){
			document[nombre].src = "imagenes/seleccionado.png";
			document[nombre].width = "26";
			document[nombre].height = "26";	
			document.form2[nombre].value=1;
		}
		else if (document[nombre].width == "26"){
			document[nombre].src = "imagenes/libre.png";
			document[nombre].width = "25";
			document[nombre].height = "25";	
			document.form2[nombre].value=0;
		}
		else{
			alert("El asiento está ocupado");
		}
	}
</SCRIPT>
<?php
	include "piePagina.php";
?>