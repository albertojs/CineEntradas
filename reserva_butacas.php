<?include 'cabecera.php';

 $id_proy = $_GET['id_proy'];
 $id_cine = $_GET['id_cine'];
?>

<head>
<title>Venta de Entradas ALEDAL </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/cine_theme1.css">
<link rel="stylesheet" type="text/css" href="css/base.css">
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td width="28%" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="270" >
        <tbody>
          <tr> 
            <td> <table border="0" cellpadding="0" cellspacing="0" height="0" width="270">

                <tbody>
                  <tr> 
                    <td style="border-right: 1px solid rgb(156, 203, 233);" height="0" valign="top" width="25"><img src="imagenes/chair.gif" height="20" width="35"></td>
                    <td class="tdTittleProgCine" height="0" width="245">
                     <?php
                     
                     $sentencia =('select '.$dbname.'.'.$dbpref.'cines.nombre, count(salas.id)
 						from '.$dbname.'.'.$dbpref.'cines, '.$dbname.'.'.$dbpref. 'salas
 						where '.$dbname.'.'.$dbpref. 'cines.id = '.$dbname.'.'.$dbpref. 'salas.id_cine
 						AND '.$dbname.'.'.$dbpref.'cines.id = '.$id_cine.
 						' group by '.$dbname.'.'.$dbpref.'cines.nombre');
					
					$datos_cine=mysql_query($sentencia);
					if (!$datos_cine) {
   						die('Es esta primee Invalid query: ' . mysql_error());
						}
					
					 $rows = mysql_fetch_row($datos_cine);
                      echo $rows[0];
						?>                   
                      <!--Nombre cine-->
                    </td>
                  </tr>
                </tbody>
              </table></td>

          </tr>
			<!--Informacion del cine-->
          <tr class="tdGrid"> 
            <td> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                  <tr> 
                    <td height="16" width="18"><img src="imagenes/corchetes-dcha01.gif" border="0" height="16" width="19"></td>
                    <td></td>
                    <td height="16" width="18"><img src="imagenes/corchetes-dcha01.gif" border="0" height="16" width="18"></td>
                  </tr>

                  <tr> 
                    <td background="imagenes/corchetes-izq02.gif" width="18">&nbsp;</td>
                    <td valign="top"><b> <span class="lblDetailCine">Número de Salas: </span><?php echo $rows[1];?></b>
					<br> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr> 
                            <td class="txtDetailCine" width="100%"> </td>

                          </tr>
                          <tr> 
                            <td class="txtDetailCine" width="100%"> </td>
                          </tr>
                          <tr> 
                            <td class="txtDetailCine" width="100%"><b><span class="lblDetailCine">Venta 
                              telefónica:&nbsp;</span><!--numero telefono--></b></td>
                          </tr>
                          <tr> 
                            <td class="txtDetailCine" width="100%"> </td>

                          </tr>
                          <tr> 
                            <td class="txtDetailCine" width="215"><span class="lblDetailCine">Servicios:</span> 
                              <form name="frmMapa" method="post" action="">
                                <input name="direccion" value="" type="hidden">
                                <input name="numero" value="" type="hidden">
                                <input name="localidad" value="" type="hidden">
                                <input name="provincia" value="" type="hidden">
                              </form>

                              <!--MUESTRA FACILIDADES-->
                              <table border="0" cellpadding="1" cellspacing="1" width="215">
                                <tbody>
                                  <tr> 
                                    <td valign="top" width="35"> <img src="imagenes/bus.gif" alt="Cine comunicado por bus"> 
                                    </td>
                                    <td width="530"><!--nº autobuses--></td>
                                  </tr>
                                  <tr> 
                                    <td colspan="2" valign="top" width="100%"> 
                                      <img src="imagenes/parking.gif" alt="Dispone de parking"><!---->

                                    </td>
                                  </tr>
                                  <tr> 
                                    <td colspan="2" valign="top" width="100%"> 
                                      <img src="imagenes/3_4.gif" alt="Puede retirar sus entradas en Cajeros de Caja Madrid" height="31" width="32"> 
                                      <img src="imagenes/3_25.gif" alt="Puede retirar sus entradas en Cajeros de Ibercaja" height="31" width="32"> 
                                      REC. EN CAJEROS</td>
                                  </tr>
                                </tbody>
                              </table>

                              <!--FIN MUESTRA FACILIDADES-->
                            </td>
                          </tr>
                          
                        </tbody>
                      </table></td>
                    <td background="imagenes/corchetes-dcha02.gif" width="18">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td height="16" width="18"><img src="imagenes/corchetes-izq03.gif" border="0" height="16" width="18"></td>

                    <td height="16" width="220"></td>
                    <td height="16" width="18"><img src="imagenes/corchetes-izq03.gif" border="0" height="16" width="18"></td>
                  </tr>
                </tbody>
              </table></td>
          </tr>
          <tr> 
            <td> <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>

                  <tr> 
                    <td colspan="2" class="txtDetailCine" height="20" width="100%"> 
                      <img src="imagenes/espectador.gif"> Día del 
                      espectador.<br> <img src="imagenes/numerada.gif"> 
                      Sesión con butacas numeradas.<br> </td>
                  </tr>
                  <tr> </tr>
                  
                </tbody>

              </table></td>
          </tr>
        </tbody>
      </table>
      <br>
      <hr>
      
      <?php
      $sentence=('select ' .$dbname.'.'.$dbpref.'peliculas.titulo,' .$dbname.'.'.$dbpref.'salas.nombre,' .$dbname.'.'.$dbpref.'proyecciones.fecha_proyeccion,' .$dbname.'.'.$dbpref.'proyecciones.hora_inicio,' .$dbname.'.'.$dbpref.'cines.precio,' .$dbname.'.'.$dbpref.'salas.id,' .$dbname.'.'.$dbpref.'proyecciones.id
from ' .$dbname.'.'.$dbpref.'peliculas, '.$dbname.'.'.$dbpref.'salas,' .$dbname.'.'.$dbpref.'cines,' .$dbname.'.'.$dbpref.'proyecciones
where ' .$dbname.'.'.$dbpref.'proyecciones.id_sala=' .$dbname.'.'.$dbpref.'salas.id
and ' .$dbname.'.'.$dbpref.'proyecciones.id_pelicula=' .$dbname.'.'.$dbpref.'peliculas.id
and ' .$dbname.'.'.$dbpref.'salas.id_cine=' .$dbname.'.'.$dbpref.'cines.id
and ' .$dbname.'.'.$dbpref.'proyecciones.id ='.$id_proy);
   
      $info_usuario=mysql_query($sentence);
      if (!$info_usuario) 
      {
   		die(' Esta segun Invalid query: ' . mysql_error());
	  }
					
	  $rows1 = mysql_fetch_row($info_usuario);
      ?>
      
      <!--Informacion de lo seleccionado-->
      <table border="0" cellpadding="0" cellspacing="0" width="270" >
        <tbody>
          <tr>
            <td><table border="0" cellpadding="0" cellspacing="0" height="0" width="270">
                <tbody>
                  <tr>
                    <td style="border-right: 1px solid rgb(156, 203, 233);" height="0" valign="top" width="25"><img src="imagenes/chair.gif" height="20" width="35"></td>
                    <td class="tdTittleProgCine" height="0" width="245"> Informacion de su compra 
                    </td>
                  </tr>
                </tbody>
            </table></td>
          </tr>
          <tr class="tdGrid">
            <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                  <tr>
                    <td height="16" width="19"><img src="imagenes/corchetes-dcha01.gif" border="0" height="16" width="19"></td>
                    <td></td>
                    <td height="16" width="18"><img src="imagenes/corchetes-dcha01.gif" border="0" height="16" width="18"></td>
                  </tr>
                  <tr>
                    <td background="imagenes/corchetes-izq02.gif" width="19"></td>
                    <td valign="top"><b><span class="lblDetailCine">Pelicula: </span> <?php echo $rows1[0]?><br>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="txtDetailCine" width="100%"></td>
                            </tr>
                            
                            <tr>
                              <td class="txtDetailCine" width="100%"><b><span class="lblDetailCine"><b>Sala: </span><?php echo $rows1[1]?><br>
                                    <!--nombre de Sala-->
                              </b></td>
                            </tr>
                            
                            <tr>
                              <td class="txtDetailCine" width="215"><b><span class="lblDetailCine">Fecha: </span><?php echo $rows1[2]?>                                
                                  <!--FIN MUESTRA FACILIDADES--></td>
                            </tr>
                          </tbody>
                      </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="txtDetailCine" width="100%"></td>
                            </tr>
                            <tr>
                              <td class="txtDetailCine" width="100%"><b><span class="lblDetailCine">Sesion: </span><?php echo $rows1[3]?>
                              </b></td>
                            </tr>
                            <tr>
                              <td class="txtDetailCine" width="215"><b><span class="lblDetailCine">Precio: </span><?php echo $rows1[4]?>                                  
                                  <!--FIN MUESTRA Informacion--></td>
                            </tr>
                          </tbody>
                        </table>
                    </td>
                    <td background="imagenes/corchetes-dcha02.gif" width="18">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="16" width="19"><img src="imagenes/corchetes-izq03.gif" border="0" height="16" width="18"></td>
                    <td height="16" width="233"></td>
                    <td height="16" width="18"><img src="imagenes/corchetes-izq03.gif" border="0" height="16" width="18"></td>
                  </tr>
                </tbody>
            </table></td>
          </tr>
          <tr>
            <td height="19"></td>
          </tr>
        </tbody>
      </table>
      </td>
      
    <td width="100%" colspan="2" align="center">
    <b>Escoja las butacas que desee </b><br>
    <?php
    $sentencia2=('select ' .$dbname.'.'.$dbpref.'salas.x,' .$dbname.'.'.$dbpref.'salas.y 
from ' .$dbname.'.'.$dbpref.'salas 
where ' .$dbname.'.'.$dbpref.'salas.id ='.$rows1[5]);

      $xy_butacas=mysql_query($sentencia2);
      if (!$xy_butacas) 
      {
   		die(' esta tercer Invalid query: ' . mysql_error());
	  }
					
	  $rows2 = mysql_fetch_row($xy_butacas);
    $sentencia3=('select ' .$dbname.'.'.$dbpref.'butacas.butaca 
from ' .$dbname.'.'.$dbpref.'butacas,' .$dbname.'.'.$dbpref.'reservas,' .$dbname.'.'.$dbpref.'proyecciones 
where ' .$dbname.'.'.$dbpref.'proyecciones.id =' .$dbname.'.'.$dbpref.'reservas.id_proyeccion 
and ' .$dbname.'.'.$dbpref.'reservas.id =' .$dbname.'.'.$dbpref.'butacas.id_reserva 
and ' .$dbname.'.'.$dbpref.'proyecciones.id='.$rows1[6]);
    


      $butaca_reservada=mysql_query($sentencia3);
      if (!$butaca_reservada) 
      {
   		die(' o esta cuarta Invalid query: ' . mysql_error());
	  }
	  $num_result=mysql_num_rows($butaca_reservada);

	  for($z=0;$z<$num_result;$z++)
	  {	
	  $rows3 = mysql_fetch_row($butaca_reservada);
	  $array[$z]=$rows3[0];
	  }
	

	$butacas=1;
    ?>
    <form name="form2" method="POST" action="reservas.php" onSubmit="CogerSeleccion()">
    
    <input type="hidden" name="id_proy" value="<?php echo $id_proy?>">
    <input type="hidden" name="butacas" value="<?php echo ''.$rows2[0]*$rows2[1].''?>">
    
    <table width="50%"  border="0" align="center" cellspacing="5" bgcolor="#007070">
    <?php
    for($cont_filas=1;$cont_filas<=$rows2[1];$cont_filas++)
    {
	echo '<tr>';
    echo '<td>';
    echo "<b>-FILA ".$cont_filas."</b>";
    echo '</td>'; 
    
    for ($cont_columnas=1;$cont_columnas<=$rows2[0];$cont_columnas++)
    {
    	
	$seleccion=false;
	for($kk=0;$kk<$z;$kk++)
	{
	if($butacas==$array[$kk])
		$seleccion=true;	
	}
	if ($seleccion==false)
	{
    ?>
    <td><?echo $butacas;?><div align="center"><img src="imagenes/libre.png" name="asiento<?php echo ''.$butacas.''?>" width="32" height="32" title="<?echo 'fila '.$cont_filas.' butaca '.$butacas?>" onClick="CambiaImagen('asiento<?php echo ''.$butacas.''?>')"><input type="hidden" name="asiento<?php echo ''.$butacas.''?>" value="0"></div></td>
    <?php
	}//if
	else 
	{
	?>
	
    <td><?echo $butacas;?><div align="center"><img src="imagenes/ocupado.png" name="asiento<?php echo ''.$butacas.''?>" width="31" height="31" title="<?echo 'fila '.$cont_filas.' butaca '.$butacas?>" onClick="CambiaImagen('asiento<?php echo ''.$butacas.''?>')">
    <?php
	
	}//else
    $butacas=$butacas+1;
    }//for cont_columnas
    
    echo '</tr>';	

    }
    ?>

</table>

 
    <div align="center">
      <input type="submit" value="Reservar Asientos">
    </div>
  </form>

  
  <p align="center">
    <SCRIPT>
function CambiaImagen (nombre) {
	if (document[nombre].width == "32")
		{
		document[nombre].src = "imagenes/seleccionado.png";
		document[nombre].width = "33";
		document[nombre].height = "33";	
		document.form2[nombre].value=1;
		
		}
	else if (document[nombre].width == "33")
		{
		document[nombre].src = "imagenes/libre.png";
		document[nombre].width = "32";
		document[nombre].height = "32";	
		document.form2[nombre].value=0;
		}
	else
		{
		alert("El asiento está ocupado");
		}
}

function CogerSeleccion()
{
	
	
}
    </SCRIPT>
      <!--tabla con la peliculas repetir tantas veces como peliculas-->    </td>
  </tr>
</table>

</body>
</html>
<?php 
	  include 'piePagina.php';?>