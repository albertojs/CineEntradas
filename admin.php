<?php
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
echo "<HTML><HEAD><TITLE>Administracion</TITLE></HEAD>" .
		"<link href='css/cssadmin.css' rel='stylesheet' type='text/css'>" .
		"<BODY onLoad='document.form.nombre.focus()'>";
?>

<div align="center"><h1>Bienvenido a la Suite de Administraci&oacute;n de los cines</h1>
<h3>Por favor introduce tus credenciales abajo</h3></div>
<br>
<hr width="52%" align="center">
<table width="50%"  border="0" align="center" cellspacing="5">
<form name="form" method="get" action="administracion/credenciales.php" onSubmit="CalculaMD5()">
  <tr>
    <th width="50%"><div align="right">Nombre de usuario</div></th>
    <td><div align="left"><input type="text" name="nombre"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">Contrase&ntilde;a</div></th>
    <td><div align="left"><input type="password" name="password"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right"></div></th>
    <td><div align="left"><input type="submit" value="Conectar"></div></td>
  </tr>
</form>
</table>
<hr width="52%" align="center">
</body>
</html>

<script language="JavaScript" type="text/javascript" src="js/md5.js"></script>


<script language="JavaScript" type="text/javascript">
  function CalculaMD5(){
  	document.form.password.value=hex_md5(document.form.nombre.value+document.form.password.value)
  }
</script>
  