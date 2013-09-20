<?php
	include 'cabeceraypie.php';
	cabecera('','');

	if ($_SESSION["rango"] == 1 OR $_SESSION["rango"] == 2){

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/cssadmin.css" rel="stylesheet" type="text/css">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<div align="center">
  <table width="75%"  border="0" cellspacing="5">
    <tr>
      <td width="40%"><div align="center"><img src="../imagenes/logo.gif" width="162" height="96"></div></td>
      <td width="10%"><div align="center"></div></td>
      <td width="40%"><p align="center" class="subtitle">Administraci&oacute;n de<br>
        Entradas De Cine AlEdAl</p>
      </td>
    </tr>
  </table>
  <p></p>
  <p><H3>Usted es <?php
  if ($_SESSION["rango"] == 1)
  	echo "Administrador del sistema";
  else
  	echo "Propietario de Cine";?></H3></p>
  <p>
    <embed src="../flash/cine.swf" quality="high" bgcolor="#0099ff" width="250" height="200" name="cine" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />    
</p>
</div>
</body>
</html><?php 
echo'';
}

else {echo"No está logueado en el sistema";}
?>