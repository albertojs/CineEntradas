<?php
	include 'cabeceraypie.php';
	cabecera('','');

	if ($_SESSION["rango"] == 1){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Menu de la izquierda</title>
<link href="../css/cssadmin.css" rel="stylesheet" type="text/css">
<BASE target="mainFrame">
</head>

<body>
<div align="center">
  <p class="title">ADMINISTRACI&Oacute;N</p>
  <table width="75%"  border="0" cellspacing="5">
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="grande.php" class="dingbat">Inicio</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%"><div align="center"><a href="usuarios.php" class="dingbat">Usuarios</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="locprov.php" class="dingbat">Localidades y Provincias</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="cines.php" class="dingbat">Cines</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="peliculas.php" class="dingbat">Películas</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="formas_pago.php" class="dingbat">Formas de Pago</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="salir.php" class="dingbat">Salir</a></div></td>
    </tr>
  </table>
  <p><img src="../imagenes/starfish.gif" width="120" height="120" border=0> </p>
</div>
</body>
</html>
<?php echo'';
}

	else if ($_SESSION["rango"] == 2){
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Menu de la izquierda</title>
<link href="../css/cssadmin.css" rel="stylesheet" type="text/css">
<BASE target="mainFrame">
</head>
<body>
<div align="center">
  <p class="title">ADMINISTRACI&Oacute;N</p>
  <table width="75%"  border="0" cellspacing="5">
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="grande.php" class="dingbat">Inicio</a></div></td>
    </tr>
    <tr>
      <td><hr width="50%">
          <div align="center"><a href="cines.php" class="dingbat">Cines</a></div></td>
    </tr>
        <tr>
      <td><hr width="50%">
          <div align="center"><a href="salas.php" class="dingbat">Salas</a></div></td>
    </tr>
        <tr>
      <td><hr width="50%">
          <div align="center"><a href="calendario.php" class="dingbat">Calendario</a></div></td>
    </tr>
        <tr>
      <td><hr width="50%">
          <div align="center"><a href="salir.php" class="dingbat">Salir</a></div></td>
    </tr>
  </table>
  <p><img src="../imagenes/starfish.gif" width="120" height="120" border=0> </p>
</div>
</body>
</html>

<?php echo'';
}
	else
		echo "No estás logueado en el sistema";
?>