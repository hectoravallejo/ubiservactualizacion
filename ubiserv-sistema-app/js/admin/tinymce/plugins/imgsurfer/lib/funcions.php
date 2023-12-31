<?php
    
	// retorna un array con todos los nombres de
	// los ficheros del directorio de imagenes
	function llegirDir(){
		$files = glob(BASE_RUTA.'*.*');

		usort($files, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));

		$files = array_reverse($files);
		
		foreach($files as $f){
			$tmp = explode('/',$f);
			$ret[] = $tmp[count($tmp)-1];
		}
		
		return @$ret;
	}
	
	// elimina un fichero
	function deleteFile($file){
		unlink(BASE_RUTA.$file);
	}
?>
