<?php
include "cabeceraypie.php";

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
echo "<HTML><HEAD><TITLE>Administracion";
echo "</TITLE></HEAD>";

if ($_SESSION["rango"] == 1 OR $_SESSION["rango"] == 2)
	{
echo '<frameset rows="*" cols="25%,*" framespacing="5" frameborder="NO" border="0">' .
		'<frame src="menu.php" name="leftFrame" target="mainFrame" noresize scrolling="auto">' .
		'<frame src="grande.php" name="mainFrame">' .
		'</frameset>';
	}

else{
	echo "Lo siento, pero no está logueado en el sistema";
}

pie();
?>


