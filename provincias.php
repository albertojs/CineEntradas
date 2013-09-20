<?php
	include "cabecera.php";
	$_SESSION['array']=$array;

	
?>

<table width="782" height="200" cellspacing="10" background="" >
	<tr><td><h2><center>-Elige una provincia:</center></h2><br></td></tr>
	<tr class='tdGrid'><td align="center">
	<TABLE width="100%" cellpadding="0" cellspacing="10">
		<TR >
	    <TD align="center">	
	<table cellSpacing="10" cellPadding="1" align="right" width="600">
	
<?
	
	$sentencia="select ".$dbname.".".$dbpref."provincias.nombre from ".$dbname.".".$dbpref."provincias order by ".$dbname.".".$dbpref."provincias.id";
	$busqueda=mysql_query($sentencia)or die ('Error en la consulta');
	$campos=mysql_num_fields($busqueda);
	$filas=mysql_num_rows($busqueda);
	$valor=1;
		while ($row = mysql_fetch_row($busqueda)) {
   				
   				for($i=0;$i<$campos;$i++){
   					if($valor%3==0){
   						echo "<td><a href='localidades.php?id_prov=".$valor."'><img src='imagenes/flecha_azul.gif' HSPACE='15' name='flecha".$valor."'>".$row[$i]."</a></td></tr>";
   					}
   					else{
   						echo "<td><a href='localidades.php?id_prov=".$valor."'><img src='imagenes/flecha_azul.gif' HSPACE='15'>".$row[$i]."</a></td>";
   					}
   				}
   				
   				$valor=$valor+1;
			}
?>
		
			</table>
		</td></tr>
	</table>
	</td></tr>
</table>












<?php
	include "piePagina.php"
?>