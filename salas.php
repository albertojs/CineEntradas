<?php
 include 'cabecera.php';

 $campo = $_GET['id_cine'];
 
 ?>

<head>
<title>Venta de Entradas ALEDAL </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/cine_theme1.css">
<link rel="stylesheet" type="text/css" href="css/base.css" />
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
                      
                      $sentencias=('select '.$dbname.'.'.$dbpref.'cines.nombre, count('.$dbname.'.'.$dbpref.'salas.id), '.$dbname.'.'.$dbpref.'cines.telefono, '.$dbname.'.'.$dbpref.'cines.autobuses, '.$dbname.'.'.$dbpref.'cines.metro, '.$dbname.'.'.$dbpref.'cines.dia_espectador
 						from '.$dbname.'.'.$dbpref.'cines, '.$dbname.'.'.$dbpref. 'salas
 						where '.$dbname.'.'.$dbpref. 'cines.id = '.$dbname.'.'.$dbpref. 'salas.id_cine
 						AND '.$dbname.'.'.$dbpref.'cines.id = '.$campo.
 						' group by '.$dbname.'.'.$dbpref.'cines.nombre');
 						
 									
 					$cine = mysql_query($sentencias);
                      if (!$cine) {
   						die('Invalid query: ' . mysql_error());
						}
					
					 $rows = mysql_fetch_row($cine);
                      echo $rows[0];
                      
					
                      ?>
                      
                      <!--Nombre cine-->
                    </td>
                  </tr>
                </tbody>
              </table></td>
          </tr>

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
                    <td valign="top"> <span class="lblDetailCine">Número de Salas: </span><?php echo  $rows[1];?><!--select count(*) from salas where cines.id=id_cine-->
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
                              telefónica:</span><?php echo  $rows[2];?><!--numero telefono--></b></td>
                          </tr>
                          <tr>
                                      <td colspan="2" class="txtDetailCine" height="20" width="100%"> 
                      					<img src="imagenes/espectador.gif"><b><span class="lblDetailCine" > Día del 
                     					 espectador:</span>  <?php echo  $rows[5];?>  
                     </td>
                                  </tr>
                          <tr> 
                            <td class="txtDetailCine" width="100%"> </td>
                          </tr>
                          <tr> 
                            <td class="txtDetailCine" width="215"><span class="lblDetailCine">Servicios:</span> 
                              
                              <!--MUESTRA FACILIDADES-->
                              <table border="0" cellpadding="1" cellspacing="1" width="215">
                                <tbody>
                                  <tr> 
                                    <td valign="top" width="35"> <img src="imagenes/bus.gif" alt="Cine comunicado por bus"><?php echo  $rows[3].', Metro:'.$rows[4];?> 
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
                  
                  
                </tbody>
              </table></td>
          </tr>
        </tbody>
      </table></td>
    <td width="100%" colspan="2" valign="top">
      <!--tabla con la peliculas repetir tantas veces como peliculas-->
      <?php 
		
		$sentencia=( 'select distinct('.$dbname.'.'.$dbpref.'cines.nombre),'.$dbname.'.'.$dbpref.'peliculas.titulo,'.$dbname.'.'.$dbpref.'peliculas.descripcion,'.$dbname.'.'.$dbpref.'salas.nombre,'.$dbname.'.'.$dbpref.'salas.id,'.$dbname.'.'.$dbpref.'peliculas.id
 from '.$dbname.'.'.$dbpref.'cines,'.$dbname.'.'.$dbpref.'salas,'.$dbname.'.'.$dbpref.'peliculas,'.$dbname.'.'.$dbpref.'proyecciones
 where '.$dbname.'.'.$dbpref.'cines.id='.$dbname.'.'.$dbpref.'salas.id_cine 
 and '.$dbname.'.'.$dbpref.'salas.id='.$dbname.'.'.$dbpref.'proyecciones.id_sala 
 and '.$dbname.'.'.$dbpref.'proyecciones.id_pelicula='.$dbname.'.'.$dbpref.'peliculas.id 
 and '.$dbname.'.'.$dbpref.'cines.id='.$campo.'');

		$result = mysql_query($sentencia);
		if (!$result) {
   			die('O falta id_cine o Invalid query: ' . mysql_error());
				}
		$filas = mysql_num_rows($result);
  		
  		for ($cont_result=0;$cont_result<$filas;$cont_result++){
		
			$row = mysql_fetch_row($result);
      echo'<table border="0" cellpadding="0" cellspacing="0" width="670">';
       echo' <!--una fila para cada pelicula (cada pelicula es una tabla-->';
        echo'<tbody>';
          echo'<tr>'; 
            echo'<td> <!--franja naranja--><table border="0" cellpadding="0" cellspacing="0" width="670">';
                echo'<tbody>';
                  echo'<tr>'; 
                    echo'<td colspan="4" class="tdGridHeaderSubr" align="left" height="25">'.$row[1].'<!--nombre peli-->';
                    echo'<td colspan="3" class="tdGridHeaderSubr" align="right"></td>';
                    echo'<td colspan="3" class="tdGridHeaderSubr" align="right"></td>';
                  echo'</tr>';
                  echo'<tr>'; 
                    echo'<td class="tdGrid" align="center" height="25" width="244">Especificaciones'; 
                      echo'</td>';
                 			
					
                 
                      for($j=0;$j<7;$j++)
                      {	
                      
                      $fecha = mysql_query('SELECT ADDDATE(curdate(), '.$j.')');
                      	
                      	if (!$fecha) {
   						die('Es en la primera Invalid query: ' . mysql_error());
						}
						$numero_fecha = mysql_fetch_row($fecha);
									
                      	$dia = mysql_query('SELECT DAYNAME("'.$numero_fecha[0].'")');
                      	if (!$dia) {
   						die('Es en la segunda Invalid query: ' . mysql_error());
						}
						$columns = mysql_fetch_row($dia);
						if ($columns[0]=='Monday')
							{
							$dia_spn='Lunes';
								
							}else if ($columns[0]=='Tuesday')
									  {
									  $dia_spn='Martes';
									  }else if ($columns[0]=='Wednesday')
									  			{
									  			$dia_spn='Miercoles';
									  			}else if ($columns[0]=='Thursday')
									  					{
									  					$dia_spn='Jueves';
									  					}else if ($columns[0]=='Friday')
									  							{
									  							$dia_spn='Viernes';	
									  							}else if ($columns[0]=='Saturday')
									  									{
									  									$dia_spn='Sabado';	
									  									}else if ($columns[0]=='Sunday')
									  											{
									  											$dia_spn='Domingo';	
									  											}
						if ($rows[5]==$dia_spn)
						{
						
						echo'<td class="tdGrid" align="center" height="25" width="71"><img src="imagenes/espectador.gif"></img>'.$dia_spn.'</td>';
						}else
						{
						
						echo'<td class="tdGrid" align="center" height="25" width="71"><img src="imagenes/blank.gif" height="1" width="1">'.$dia_spn.'</td>';	
						}
                      }
                                      
                  echo'</tr>';
                  echo'<!--fila para el detall de la pelicula-->';
                  echo'<tr>'; 
                    echo'<td width="670" height="151" colspan="9" class="tdGridEnd">'; 
                      echo'<div id="film_cine11791" >'; 
                        echo'<table border="0" cellpadding="0" cellspacing="0" height="72" width="667">';
                          echo'<tbody>';
                            echo'<tr>'; 
                              echo'<td rowspan="2" height="70" width="61"><!--foto pelicula--><img src="ver_imagen.php?id='.$row[5].'" border="0" height="100" width="70"></td>';
                               echo'<td class="txtDetailGrid" valign="top" width="178">'; 
                                echo'<span class="lblDetailGrid">Detalles: </span><br>'.$row[2]; 
                                
                                echo'<br><br> <span class="lblDetailGrid">Calificación: </span><br>'; 
                                echo'</td>';
                                for($j=0;$j<7;$j++)
                      			{
                      			$date = mysql_query('SELECT ADDDATE(curdate(), '.$j.')');
                      	
                      			if (!$date) {
   								die('Es en la primera Invalid query: ' . mysql_error());
									}
								$fecha_funcion = mysql_fetch_row($date);	
                      			$my= 'select '.$dbname.'.'.$dbpref.'proyecciones.hora_inicio,'.$dbname.'.'.$dbpref.'proyecciones.id
 									from '.$dbname.'.'.$dbpref.'proyecciones
 									where '.$dbname.'.'.$dbpref. 'proyecciones.id_sala='.$row[4].'
									and '.$dbname.'.'.$dbpref.'proyecciones.id_pelicula='.$row[5].'
									and '.$dbname.'.'.$dbpref.'proyecciones.fecha_proyeccion="'.$fecha_funcion[0].'"'; 

                      			$horas_sesiones = mysql_query($my);
                      			
                      			if (!$horas_sesiones) {
   								die('Invalid query: ' . mysql_error());
								}
								
								$filas_sesiones = mysql_num_rows($horas_sesiones);
								
								
                      			
                      			
                      			
                      			
                      			
                      			echo'<td class="txtDetailGrid" align="left" valign="top" width="71">';
                      			for ($cont_horas_sesiones=0;$cont_horas_sesiones<$filas_sesiones;$cont_horas_sesiones++){
		
								$s = mysql_fetch_row($horas_sesiones);
                      			echo '<a href="reserva_butacas.php?id_proy='.$s[1].'&id_cine='.$campo.'">'.$s[0].'</a><br>';
                      			}
                      			echo '</td>';
                      			}
                            echo'</tr>';
                           echo'</tbody>';
                        echo'</table>';
                      echo'</div></td>';
                  echo'</tr>';
                  echo'<!--FIN fila para el detall de la pelicula-->';
                echo'</tbody>';
              echo'</table></td>';
          echo'</tr>';
        echo'</tbody>';
      echo'</table>';
                      
      	}
?>
</td>
</tr>
</table>


</body>
<?php 
		include 'piePagina.php';?>
