<?		
		session_start();
		include "library/config.php";
		include "library/opendb.php";
?>		
		

<html>
	<head><title>ALEDAL CINE ENTRADAS - tu portal de venta de entradas</title>
		<LINK REL="stylesheet" TYPE="text/css" HREF="css/base.css">
		<LINK REL="stylesheet" TYPE="text/css" HREF="css/pastilla.css">
		<LINK REL="stylesheet" TYPE="text/css" HREF="css/cine_theme1.css">
		<?
		if(isset($regenerar)&&$regenerar==1){
			echo '<meta http-equiv="refresh" content="119998;URL=index.php" >';
		}
		?>
	</head>
		
	<body style="background-image:url(imagenes/gnome.png); background-attachment:fixed;">
		<br>
		
		<center><img src="imagenes/AEA.jpg" width="686" height="100"></center>
		<center><hr>
		

