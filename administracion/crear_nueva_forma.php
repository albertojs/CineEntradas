<?php
include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('','');
	tabla("Creación de nueva Forma de Pago");

// Si existen la variable
if (isset($_GET['nombre']) AND ($_GET['nombre'] != ''))
{
	$nombre = $_GET['nombre'];
	
	// genero la sentencia, y la ejecuto
	$fdp = 'formas_de_pago';
	$sentencia="INSERT INTO $dbname.$dbpref$fdp (nombre) VALUES ('$nombre')";

	$res = mysql_query($sentencia);

	if ($res != 0)
		echo "<center><H2>Forma de Pago Agregada correctamente</h2></center><center><h3><a href='formas_pago.php'>Volver</a></h3></center>";
	else
		echo "<center><H2>Error Al agregar la Forma de Pago</h2></center><center><h3><a href='formas_pago.php'>Compruebe si la Forma de pago ya Existe</a></h3></center>";
}
// En caso de que no haya variables/s
else
	echo "<center><H2>Error, no ha especificado la forma de pago</h2></center><center><h3><a href='formas_pago.php'>Volver</a></h3></center>";	

pie();

}

else
	echo "No está logueado en el sistema";

?>