<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
 
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
		
	include 'lib/config.php';
	include 'lib/funcions.php';
	
	// si se ha seleccionado algun checkbox para eliminar la imagen
	if(!empty($_POST['nom'])){
		foreach($_POST['nom'] as $img){
			echo "<div align='center'>[Imagen eliminada: " .$img . "]</div><br>";			
			deleteFile($img);
		}
	}
	
	
	// leo las imagenes del directorio de imagenes	
	$imgs = llegirDir();
	
	// cuento el numero de imagenes	
	$num_elem = count($imgs);
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<meta http-equiv="Expires" content="0">

<meta http-equiv="Last-Modified" content="0">

<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

<meta http-equiv="Pragma" content="no-cache">

<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
body, td{
	font-family: verdana;
	font-size: 9px;
}

input{
	font-family: verdana;
	font-size: 9px;
	border: solid 1px gray;
	background-color: silver;
	padding: 2px;
}
</style>


<script type="text/javascript">
function resaltar(elem){
	elem.border = '2';
	elem.style.borderColor = 'red';
}

function no_resaltar(elem){
	elem.border = '0';
}
</script>
</head>

<body>
<table cellpadding="2" cellspacing="2" border="0" width="100%">
	<tr>
		<td>Haga click sobre una imagen para insertarla en el texto.<br>[<?= $num_elem; ?> imágenes]</td>
		<td align="right" valign="top"><input type="button" value="Eliminar imágenes seleccionadas" onClick="document.f.submit()"></td>
	</tr>
</table>
<br><br>
<form name="f" method="post" action="" style="display:inline">

<table width="100%" align="center" border="0">
	<tr>
<?php
	
	$i = 0;
	
	if (is_array($imgs)){
		foreach($imgs as $img){
		
			if(!($i % 5) && ($i != 0)) echo '<tr>';
		
			echo '<td align="center" valign="middle"><a href="javascript:parent.insertUrl(\''.BASE_RUTA_HTTP.$img.'\')" title="'.$img.'"><img src="' . BASE_RUTA_HTTP.$img . '" style="width: 75px; height: 75px" border="0" onmouseover="resaltar(this)" onmouseout="no_resaltar(this)"></a><br><div align="center"><input name="nom[]" type="checkbox" value="'.$img.'"></div></td>';
		
			$i++;
			if(!($i % 5) && ($i != 0)) echo '</tr>';
					
		}
	}
					

?>
</table>
</form>
</body>
</html>
