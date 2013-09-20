<?
	include "cabecera.php";
	

?>
<table width="682" height="412" cellspacing="10">
	<tr><td><center><h2><u>Bienvenidos a ALEDAL</u></h2><br>
	<a href="provincias.php"><center><h1>ENTRAR</h1></a></td></tr>
	<tr><td align="center">
		<embed src="imagenes/cine.swf" quality="high" bgcolor="#0099ff" width="680" height="300" name="cine" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />

<script language="JavaScript">
	<!--
	// Javascript encontrado en MundoJavascript.com 
	// Intrucciones de uso 
	// debes poner este código en el Cuerpo (BODY) de la página

	var moji;
	moji="Proyecto: Cine Entradas      Realizado por: Alvaro Alcedo, Alberto Jiménez, Eduardo Quero      Curso: 2ºDAI  (Instituto Lázaro Cárdenas)      Creado en lenguaje: PHP      BD: MySQL       Version: 1.0      Fecha de Creacion: 20 de Febrero de 2007       ";
	moji=moji+moji;
	function hyouji(){
	setTimeout("hyouji()",200);
	moji=moji.substring(2,moji.length)+moji.substring(0,2);
	document.MojiForm.MojiInput.value=moji;
	}
	//-->
</script>
	<form name="MojiForm">
  	<font class="samp"><div align="center"><center><p></font> <input name="MojiInput" type="text" size="132"> </p>
  	</center></div>
	</form>
<script language="JavaScript">
	<!--
	hyouji();
	//-->
</script>
</td></tr>
</table>

<?
	include "piePagina.php"
?>