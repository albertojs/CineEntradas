<?PHP
// Cogemos los datos y los metemos en una estructura v�lida


$cadena = '<?php';
$cadena = $cadena."\n".'//Datos del Host';
$cadena = $cadena."\n".'$dbhost = "'.$dbhost.'";';
$cadena = $cadena."\n".'//Datos del nombre de la base de datos';
$cadena = $cadena."\n".'$dbname = "'.$dbname.'";';
$cadena = $cadena."\n".'//Datos del Prefijo';
$cadena = $cadena."\n".'$dbpref = "'.$dbpref.'";';
$cadena = $cadena."\n".'//Datos del Usuario';
$cadena = $cadena."\n".'$dbuser = "'.$dbuser.'";';
$cadena = $cadena."\n".'//Datos del password';
$cadena = $cadena."\n".'$dbpass = "'.$dbpass.'";';
$cadena = $cadena."\n\n\n\n".'//Creado en febrero/Marzo de 2007 por �lvaro Alcedo Moreno, Eduardo Quero Salorio y Alberto Jim�nez Soria'."\n\n".'?>';
//abre un archivo y escribe en �l
$archivo = fopen("library/config.php" , "w+");

// Si se ha abierto con �xito
if ($archivo) {
fputs ($archivo, $cadena);
	echo "<h4 align='center'><b>Archivo de Configuraci�n creado correctamente</b>";
}
else
	echo "<h4 align='center'><b>No se pudo crear el archivo de configuraci�n. Consulte el manual para m�s informaci�n";

fclose ($archivo);
	echo "<h3 align='center'><b>Instalacion Terminada</h3></b>";
?>