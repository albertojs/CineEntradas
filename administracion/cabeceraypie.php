<?php

// Iniciamos la sesion, bases de datos, etc.
session_start();
include '../library/config.php';
include '../library/opendb.php';

function cabecera($titulo,$onload){
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
echo "<HTML><HEAD><TITLE>Administracion - ";
echo $titulo;
echo "</TITLE></HEAD>" .
		"<link href='../css/cssadmin.css' rel='stylesheet' type='text/css'>" .
		"<BASE target='mainFrame'>" .
		"<BODY";
if (isset ($onload))
	echo "".$onload;
echo ">";
}

function pie(){
echo "<hr><H5><center>Administración de Entradas de cine</center></H5>";
echo "<H5><center>Powered by PhP & MySQL</center></H5>";
echo "<H5><center>Por Álvaro, Eduardo y Alberto</center></H5>";
echo "</BODY></HTML>";
}

function tabla($titulo)
{
echo '<table width="75%"  border="0" align="center" cellspacing="5">' .
		'<tr>' .
		'<td width="40%"><div align="center"><img src="../imagenes/logo.gif" width="80" height="50"></div></td>' .
		'<td width="10%"></td>' .
		'<td width="40%"><h3>'.$titulo.'</h3></td>' .
		'</tr>' .
		'</table>' .
		'<hr width="52%" align="center">';
}
?>