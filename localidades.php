<?	
	include"cabecera.php";

	
	if(isset($_GET['id_prov'])){
		$id_prov=$_GET['id_prov'];
		$sentencia="select * from ".$dbname.".".$dbpref."localidades where ".$dbname.".".$dbpref."localidades.id_provincia=".$id_prov;
		
		$busqueda=mysql_query($sentencia)or die ('Error en la consulta 1');
		$campos=mysql_num_fields($busqueda);
		$filas=mysql_num_rows($busqueda);
		$sentencia3="select * from ".$dbname.".".$dbpref."provincias where ".$dbname.".".$dbpref."provincias.id=".$id_prov;
		$busqueda3=mysql_query($sentencia3) or die ('Error en la consulta 2');
		$row3= mysql_fetch_row($busqueda3);
		
	}
	
?>
<h2><center><u>-Elige una localidad de <?echo $row3[1];?>:</u></center></h2>
<table width="850" height="400" cellspacing="10" border="0">
	
	<?
	while ($row = mysql_fetch_row($busqueda)) {
   				
   		echo "<tr><td><h3><br><u><font color='black'>-".$row[2].":</h3><hr><br></td></tr>";
   			
   		$sentencia2="select * from ".$dbname.".".$dbpref."cines,".$dbname.".".$dbpref."localidades,".$dbname.".".$dbpref."provincias where ".$dbname.".".$dbpref."cines.id_localidad=".$dbname.".".$dbpref."localidades.id and ".$dbname.".".$dbpref."localidades.id_provincia=".$dbname.".".$dbpref."provincias.id and id_provincia=".$id_prov." and cines.id_localidad=".$row[0];
		$busqueda2=mysql_query($sentencia2)or die ('Error en la consulta 3');
		$campos2=mysql_num_fields($busqueda2);
		$filas2=mysql_num_rows($busqueda);
		echo "<tr>";
		$valor=1;
		while($row2=mysql_fetch_row($busqueda2)){
			if($valor%4==0){
				echo "<td><table align='center' border='2' width='230'><tr class='tdGrid'><td><b><a href='salas.php?id_cine=".$row2[0]."'><font size='2'>".$row2[2]."</a></td></b></tr>" .
					"<tr class='tdGridHeader'><td><b>DIR :</b>".$row2[3]."<br><b>TLF :</b>".$row2[4]."</td></tr>" .
					"</table></td></tr>";
			}
			else{
				echo "<td><table align='center' border='2' width='230'><tr class='tdGrid'><td><b><a href='salas.php?id_cine=".$row2[0]."'><font size='2'>".$row2[2]."</a></td></b></tr>" .
					"<tr class='tdGridHeader'><td><b>DIR :</b>".$row2[3]."<br><b>TLF :</b>".$row2[4]."</td></tr>" .
					"</table></td>";
			
			}
			$valor=$valor+1;
		}
   		echo "</td></tr>";
   				
   				
	}
		
	?>
	
	

</table>
<?php
	include "piePagina.php";
?>
