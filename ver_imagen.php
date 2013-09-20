<?
	// Si se le pasa un id
	if(isset($_GET['id'])) 
	{ 
		include 'library/config.php'; 
	    include 'library/opendb.php'; 

    	$id     = $_GET['id']; 

		$peliculas="peliculas";
    	$query  = "SELECT imagen,size,tipo,content FROM $dbname.$dbpref$peliculas WHERE id = '$id'"; 


    	$result = mysql_query($query) or die('Error, query failed'); 
		
    	list($name, $type, $size, $content) = mysql_fetch_array($result); 

    	echo $content; 

    	include 'library/closedb.php';     
    	exit; 
	} 
?>