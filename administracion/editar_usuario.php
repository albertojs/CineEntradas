<?php

// recojo todas las variables
		$nombre=$_GET['nombre'];
		$password=$_GET['password'];
		$tipo=$_GET['tipo'];
		$id=$_GET['id'];

include "cabeceraypie.php";
if ($_SESSION["rango"] == 1){
	cabecera('',' onload="document.nuevo.nombre.focus()"');
	tabla("Edición de usuario");
	?>
	
	
	<?php
	// Si existen TODOS los parámetros
	if ($id!='' AND $nombre!='' AND $password!='' AND $tipo!='')
		{
		$adm = 'administradores';
		$sentencia="UPDATE $dbname.$dbpref$adm SET nombre='$nombre',password='$password',rango=$tipo WHERE id=$id";
		
		$usuario = mysql_query($sentencia);
		
		if ($usuario != 0)
			echo "Edición correcta";
		else
			echo "Error al ediatar";
		}
	// Sin embargo, si sólo existe el tipo y la id y el pasword está vacío
	else if ($id!='' AND $password=='' AND $tipo!='')
		{
		$adm = 'administradores';
		$sentencia="UPDATE $dbname.$dbpref$adm SET rango=$tipo WHERE id=$id";
		$usuario = mysql_query($sentencia);
		
		if ($usuario != 0)
			echo "Edición correcta";
		else
			echo "Error al ediatar";
		}
		
	// Si sólo existe la id, que muestre el formulario	
	else if (isset($_GET['id']) AND !isset($_GET['nombre']) AND (!isset($_GET['password'])) AND (!isset($_GET['tipo']))){		
			
		$id = $_GET['id'];

		$adm = 'administradores';
		$sentencia="SELECT * FROM $dbname.$dbpref$adm WHERE id = $id";

		$usuario = mysql_query($sentencia);

		$row = mysql_fetch_row($usuario);?>
<center><H3>Edición de Usuario</H3></center>

<form action="" method="get" name="nuevo"  onSubmit="CalculaMD5()">
<input type="hidden" name="id" value ="<?php echo $row[0]; ?>">
<table width="75%"  border="0" align="center" cellspacing="5">
  <tr>
    <th width="10%">Id</td>
    <th width="35%">Nombre</td>
    <th width="35%">Password</td>
    <th width="15%">Rango</td>
    <th></td>
  </tr>
  <tr>
    <td align="center"><?php echo $row[0]; ?></td>
    <td align="center"><input type="text" name="nombre" value ="<?php echo $row[1]; ?>"></td>
    <td align="center"><input type="password" name="password" value =""></td>
    <td align="center"><select name="tipo">
        <option value="1">Administrador</option>
        <option value="2"<?php
        if ($row[3] == 2)
        	echo " selected ";
        ?>>Propietario de cine</option>
      </select></td>
    <td align="center"><input type="submit" value="Editar"></td>
  </tr>
</table>
</form>
  
		<?php }
		}
else
	echo "<center><H3>Careces de permisos suficientes</H3></center>";

pie();
?>

<script language="JavaScript" type="text/javascript" src="../js/md5.js"></script>


<script language="JavaScript" type="text/javascript">
  function CalculaMD5(){
  	// Si existe algo en el campo password, que lo envíe
  	if (document.nuevo.password.value!="")
  	document.nuevo.password.value=hex_md5(document.nuevo.nombre.value+document.nuevo.password.value)
  }
</script>