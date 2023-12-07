<?php

// Carga de imagenes 

class Imagenes {
   var $original_file_name;
   var $file_name;
   var $file_size;
   var $file_tmp;
   var $file_type;

   
   function __construct($file_name, $original_file_name, $file_size, $file_tmp, $file_type){
      $this->original_file_name = $original_file_name;
      $this->file_name = $file_name;
      $this->file_size = $file_size;
      $this->file_tmp = $file_tmp;
      $this->file_type = $file_type;
   }
}


function is_alpha_png($fn){
  return (ord(@file_get_contents($fn, NULL, NULL, 25, 1)) == 6);
}

// $imagenes = cargar_imagenes('imagen', 'images/clasificados/', '-', 'miniaturas', 'miniaturas/', 120 , 120, 'crop', 100 );


function cargar_imagenes($nombre_imagenes, $carpeta, $separador, $ancho = '', $alto = '', $metodo = '', $miniaturas = '', $carpeta_miniaturas = '', $ancho_miniatura = '', $alto_miniatura = '', $metodo_miniatura = 'crop', $imagen_destacada = '', $carpeta_imagen_destacada = '', $ancho_imagen_destacada = '', $alto_imagen_destacada = '', $metodo_imagen_destacada = 'crop', $calidad = 120){

	foreach($_FILES[$nombre_imagenes]['tmp_name'] as $key => $tmp_name)
	{
	    $original_file_name = $_FILES[$nombre_imagenes]['name'][$key];
	    $file_name = time().$separador.slug($_FILES[$nombre_imagenes]['name'][$key],'imagen');
	    $file_size = $_FILES[$nombre_imagenes]['size'][$key];
	    $file_tmp = $_FILES[$nombre_imagenes]['tmp_name'][$key];
	    $file_type = $_FILES[$nombre_imagenes]['type'][$key];  
		
		if($file_type == "image/x-png"
		    || $file_type == "image/png" 
		    || $file_type == "image/gif" 
		    || $file_type == "image/pjpeg"
		    || $file_type == "image/jpeg"
		    || $file_type == "video/mp4"
		    || $file_type == "video/mpeg4"
		    || $file_type == "application/pdf")
		{

		    if($miniaturas == ''){
			    move_uploaded_file($file_tmp,$carpeta.$file_name);

			    if($ancho != ''){
					$resize_imagen = new resize($carpeta.$file_name);
					$resize_imagen -> resizeImage($ancho, $alto, $metodo);
					$resize_imagen -> saveImage($carpeta.$file_name, $calidad);
				}

		    }

		    if($miniaturas == 'miniaturas'){
			    move_uploaded_file($file_tmp,$carpeta.$carpeta_miniaturas.$file_name);

			    if($ancho != ''){

					$resize_imagen = new resize($carpeta.$carpeta_miniaturas.$file_name);
					$resize_imagen -> resizeImage($ancho, $alto, 'auto');
					$resize_imagen -> saveImage($carpeta.$carpeta_miniaturas.$file_name, $calidad);

					$resize_imagen = new resize($carpeta.$carpeta_miniaturas.$file_name);
					$resize_imagen -> resizeImage($ancho, $alto, $metodo);
					$resize_imagen -> saveImage($carpeta.$file_name, $calidad);

					if($imagen_destacada == 'imagen_destacada'){

						$resize_imagen = new resize($carpeta.$carpeta_miniaturas.$file_name);
						$resize_imagen -> resizeImage($ancho_imagen_destacada, $alto_imagen_destacada, $metodo_imagen_destacada);
						$resize_imagen -> saveImage($carpeta.$carpeta_imagen_destacada.$file_name, $calidad);

					}

					$resize_imagen = new resize($carpeta.$carpeta_miniaturas.$file_name);
					$resize_imagen -> resizeImage($ancho_miniatura, $alto_miniatura, $metodo_miniatura);
					$resize_imagen -> saveImage($carpeta.$carpeta_miniaturas.$file_name, $calidad);

				}

			}

		    $imagenes[] = new Imagenes($file_name, $original_file_name, $file_size, $file_tmp, $file_type);
		}

	}
	return @$imagenes;
}

//escalar imagnes

		Class resize
		{
			// *** Class variables
			private $image;
		    private $width;
		    private $height;
			private $imageResized;

			function __construct($fileName)
			{
				// *** Open up the file
				$this->image = $this->openImage($fileName);

			    // *** Get width and height
			    $this->width  = imagesx($this->image);
			    $this->height = imagesy($this->image);
			}

			## --------------------------------------------------------

			private function openImage($file)
			{
				// *** Get extension
				$extension = strtolower(strrchr($file, '.'));

				switch($extension)
				{
					case '.jpg':
					case '.jpeg':
					case '.JPG':
					case '.JPEG':
						$img = @imagecreatefromjpeg($file);
						break;
					case '.gif':
						$img = @imagecreatefromgif($file);
						break;
					case '.PNG':
					case '.png':

							$img = @imagecreatefrompng($file);

						break;
					default:
						$img = false;
						break;
				}
				return $img;
			}

			## --------------------------------------------------------

			public function resizeImage($newWidth, $newHeight, $option="auto")
			{
				// *** Get optimal width and height - based on $option
				$optionArray = $this->getDimensions($newWidth, $newHeight, $option);

				$optimalWidth  = $optionArray['optimalWidth'];
				$optimalHeight = $optionArray['optimalHeight'];

				// *** Resample - create image canvas of x, y size
				$this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);

				imagealphablending($this->imageResized, false);
				imagesavealpha($this->imageResized,true);
				$transparent = imagecolorallocatealpha($this->imageResized, 0, 0, 0, 256);
				imagefilledrectangle($this->imageResized, 0, 0, $optimalWidth, $optimalHeight, $transparent);

/*

            //make sure the transparency information is saved
            imagesavealpha($this->imageResized, true);

            //create a fully transparent background (127 means fully transparent)
            $trans_background = imagecolorallocatealpha($this->imageResized, 0, 0, 0, 127);

            //fill the image with a transparent background
            imagefill($this->imageResized, 0, 0, $trans_background);

*/

				imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);


				// *** if option is 'crop', then crop too
				if ($option == 'crop') {
					$this->crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
				}
			}

			## --------------------------------------------------------
			
			private function getDimensions($newWidth, $newHeight, $option)
			{

			   switch ($option)
				{
					case 'exact':
						$optimalWidth = $newWidth;
						$optimalHeight= $newHeight;
						break;
					case 'portrait':
						$optimalWidth = $this->getSizeByFixedHeight($newHeight);
						$optimalHeight= $newHeight;
						break;
					case 'landscape':
						$optimalWidth = $newWidth;
						$optimalHeight= $this->getSizeByFixedWidth($newWidth);
						break;
					case 'auto':
						$optionArray = $this->getSizeByAuto($newWidth, $newHeight);
						$optimalWidth = $optionArray['optimalWidth'];
						$optimalHeight = $optionArray['optimalHeight'];
						break;
					case 'crop':
						$optionArray = $this->getOptimalCrop($newWidth, $newHeight);
						$optimalWidth = $optionArray['optimalWidth'];
						$optimalHeight = $optionArray['optimalHeight'];
						break;
				}
				return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
			}

			## --------------------------------------------------------

			private function getSizeByFixedHeight($newHeight)
			{
				$ratio = $this->width / $this->height;
				$newWidth = $newHeight * $ratio;
				return $newWidth;
			}

			private function getSizeByFixedWidth($newWidth)
			{
				$ratio = $this->height / $this->width;
				$newHeight = $newWidth * $ratio;
				return $newHeight;
			}

			private function getSizeByAuto($newWidth, $newHeight)
			{
				if ($this->height < $this->width)
				// *** Image to be resized is wider (landscape)
				{
					$optimalWidth = $newWidth;
					$optimalHeight= $this->getSizeByFixedWidth($newWidth);
				}
				elseif ($this->height > $this->width)
				// *** Image to be resized is taller (portrait)
				{
					$optimalWidth = $this->getSizeByFixedHeight($newHeight);
					$optimalHeight= $newHeight;
				}
				else
				// *** Image to be resizerd is a square
				{
					if ($newHeight < $newWidth) {
						$optimalWidth = $newWidth;
						$optimalHeight= $this->getSizeByFixedWidth($newWidth);
					} else if ($newHeight > $newWidth) {
						$optimalWidth = $this->getSizeByFixedHeight($newHeight);
						$optimalHeight= $newHeight;
					} else {
						// *** Sqaure being resized to a square
						$optimalWidth = $newWidth;
						$optimalHeight= $newHeight;
					}
				}

				return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
			}

			## --------------------------------------------------------

			private function getOptimalCrop($newWidth, $newHeight)
			{

				$heightRatio = $this->height / $newHeight;
				$widthRatio  = $this->width /  $newWidth;

				if ($heightRatio < $widthRatio) {
					$optimalRatio = $heightRatio;
				} else {
					$optimalRatio = $widthRatio;
				}

				$optimalHeight = $this->height / $optimalRatio;
				$optimalWidth  = $this->width  / $optimalRatio;

				return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
			}

			## --------------------------------------------------------

			private function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)
			{
				// *** Find center - this will be used for the crop
				$cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );
				$cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );

				$crop = $this->imageResized;
				//imagedestroy($this->imageResized);

				// *** Now crop from center to exact requested size
				$this->imageResized = imagecreatetruecolor($newWidth , $newHeight);
				
				imagealphablending($this->imageResized, false);
				imagesavealpha($this->imageResized,true);
				$transparent = imagecolorallocatealpha($this->imageResized, 255, 255, 255, 256);
				imagefilledrectangle($this->imageResized, 0, 0, $optimalWidth, $optimalHeight, $transparent);

				imagecopyresampled($this->imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);
			}

			## --------------------------------------------------------

			public function saveImage($savePath, $imageQuality="100")
			{
				// *** Get extension
        		$extension = strrchr($savePath, '.');
       			$extension = strtolower($extension);

				switch($extension)
				{
					case '.mp4':
					case '.jpg':
					case '.jpeg':
					case '.JPG':
					case '.JPEG':
						if (imagetypes() & IMG_JPG) {
							imagejpeg($this->imageResized, $savePath, $imageQuality);
						}
						break;

					case '.gif':
						if (imagetypes() & IMG_GIF) {
							imagegif($this->imageResized, $savePath);
						}
						break;

					case '.png':
					case '.PNG':
						// *** Scale quality from 0-100 to 0-9
						$scaleQuality = round(($imageQuality/100) * 9);

						// *** Invert quality setting as 0 is best, not 9
						//$invertScaleQuality = 9 - $scaleQuality;

						if (imagetypes() & IMG_PNG) {
							 imagepng($this->imageResized, $savePath, /*$invertScaleQuality*/ 0);
						}
						break;

					// ... etc

					default:
						// *** No extension - No save.
						break;
				}

				imagedestroy($this->imageResized);
			}


			## --------------------------------------------------------

		}

function slug($string, $imagen = NUll){
		$string = str_replace('<strong>', '', $string);
		$string = str_replace('</strong>', '', $string);
		$string = str_replace('<b>', '', $string);
		$string = str_replace('</b>', '', $string);
		$string = str_replace('<p>', '', $string);
		$string = str_replace('</p>', '', $string);
		$string = str_replace('<br>', '', $string);
		$string = str_replace('</br>', '', $string);
		$string = str_replace('&aacute;', 'a', $string);
		$string = str_replace('&eacute;', 'e', $string);
		$string = str_replace('&iacute;', 'i', $string);
		$string = str_replace('&oacute;', 'o', $string);
		$string = str_replace('&uacute;', 'u', $string);
		$string = str_replace('&Aacute;', 'a', $string);
		$string = str_replace('&Eacute;', 'e', $string);
		$string = str_replace('&Iacute;', 'i', $string);
		$string = str_replace('&Oacute;', 'o', $string);
		$string = str_replace('&Uacute;', 'u', $string);
		$string = str_replace('&ntilde;', 'n', $string);
		$string = str_replace('&Ntilde;', 'n', $string);
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    if($imagen == 'imagen'){
    	$string = preg_replace(strrev("/-/"),strrev('.'),strrev($string),1);
    	$string = strrev($string);
    }

    return strtolower(trim($string, '-'));
}

function file_title($string){
    $string = preg_replace('/-/', ' ', $string);
    $string = str_replace('.jpg', ' ', $string);
    $string = str_replace('.jpge', ' ', $string);
    $string = str_replace('.png', ' ', $string);
    $string = str_replace('.gif', ' ', $string);
    $string = ucfirst($string);
    return $string;
}


function extracto($string, $longitud = 100){
	$caracteres = strlen($string);
	$extracto = substr($string, 0, $longitud);
	$caracteres_extracto = strlen($extracto);
	echo $extracto;
	if( $caracteres_extracto < $caracteres ){
		echo '...';
	} 
}

function nl2p($string, $only_if_no_html = TRUE) {
  // Replace the input string by default unless we find a reason not to.
  $replace = TRUE;
  // If the only_if_no_html flag is set, then we only want to replace if no HTML is detected
  if ($only_if_no_html) {
    // Create a string of the input string with stripped tags
    $str2 = strip_tags($string);
    // If there is a difference, then HTML must have been in the input string.
    // Since HTML already exists, we do not want to replace new lines with HTML
    if ($str2 != $string) {
      $replace = FALSE;
    }
  }
  // Now return the replacement string if we are supposed to replace it.
  if ($replace) {
    return
      '<p>'
      .preg_replace('#(<br\s*?/?>\s*?){2,}#', '</p>'."\n".'<p>', nl2br($string))
      .'</p>';
  }
  // Otherwise, we just return the input string.
  return $string;
}

function vista( $carpeta, $nombre_archivo, $area = 'frontend' ){
    return 'views/layouts/'.$area.'/'.$carpeta.'/'.$nombre_archivo.'.php';		
}

function cargar_pdf( $nombre_pdf, $serverpath, $ruta_pdf ){

	    $type = $_FILES[$nombre_pdf]['type'];  


	    if( $type = 'application/pdf' ){

		    $original_pdf_name = $_FILES[$nombre_pdf]['name'];
		    $pdf_name = time().'-'.slug($_FILES[$nombre_pdf]['name'],'imagen');
		    $pdf_size = $_FILES[$nombre_pdf]['size'];
		    $pdf_tmp = $_FILES[$nombre_pdf]['tmp_name'];
 
			move_uploaded_file($pdf_tmp, $serverpath.$ruta_pdf.$pdf_name);

			return $pdf_name;
	    
	    }

}


    /* Ver version de pdf */


function pdfVersion($filename)
{ 
    $fp = @fopen($filename, 'rb');
 
    if (!$fp) {
        return 0;
    }
 
    /* Reset file pointer to the start */
    fseek($fp, 0);
 
    /* Read 20 bytes from the start of the PDF */
    preg_match('/\d\.\d/',fread($fp,20),$match);
 
    fclose($fp);
 
    if (isset($match[0])) {
        return $match[0];
    } else {
        return 0;
    }
} 


function array2string($array){

	$separador = '||';

	$string = '';
	
	foreach ($array as $i => $node) {
		if(sizeof($array) - 1 == $i){
			$separador = '';
		}
		
		$node = str_replace( '||' , '' , $node );

		$string = $string . $node . $separador;
	}

	return $string;

}

function string2array($string, $separador = '||'){

	$array = explode( $separador , $string );

	return $array;

}

function fecha($fecha, $formato = 1){
	
	$fecha_salida = date('d/M/Y', $fecha);

	if($formato == 2){
		$fecha_salida = date('d-m-Y', $fecha);		
	}

	if($formato == 3){
		$fecha_salida = date('m/d/Y', $fecha);		
	}

	return $fecha_salida;

}

function traducir_meses($fecha){

	$meses_ingles = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	foreach ($meses_ingles as $i => $mes_ingles) {
		$fecha = str_replace($mes_ingles, $meses[$i], $fecha);
	}

	return $fecha;

}

function first_word($Sentence, $etiqueta = 'i'){

	$Words = explode(" ", $Sentence);

	$WordCount = count($Words);
	$NewSentence = '';
	for ($i = 0; $i < $WordCount; ++$i) {
	    if ($i < 1) {
	        $NewSentence .= '<'.$etiqueta.'>' . $Words[$i] . '</'.$etiqueta.'> ';
	    } else {
	        $NewSentence .= $Words[$i] . ' ';
	    }
	}
	return $NewSentence;

}



function unir_campos($keys, $values){

	$keys = str_replace(',', '&comma;', $keys);

	$keys = json_encode($keys, JSON_UNESCAPED_UNICODE);

	$keys = str_replace('["', '', $keys);
	$keys = str_replace('"]', '', $keys);
	$keys = str_replace('","', ',', $keys);
	$keys = explode(',', $keys);


	$values = str_replace(',', '&comma;', $values);

	$values = json_encode($values, JSON_UNESCAPED_UNICODE);

	$values = str_replace('["', '', $values);
	$values = str_replace('"]', '', $values);
	$values = str_replace('","', ',', $values);
	$values = explode(',', $values);

	return json_encode(array_combine($keys, $values), JSON_UNESCAPED_UNICODE);

}

function resena($target, $longitud = 105){
	if($target->resena != ''){
		return $target->resena;
	}else{
		return extracto(strip_tags(html_entity_decode($target->descripcion)), $longitud);
	}
}

function br2nl($string){
	return preg_replace('#<br\s*?/?>#i', "", $string); 
}


function sin_acentos($string){

$unwanted_array = array(    

		'&aacute;' => 'a',
		'&eacute;' => 'e',
		'&iacute;' => 'i',
		'&oacute;' => 'o',
		'&uacute;' => 'u',
		'&Aacute;' => 'a',
		'&Eacute;' => 'e',
		'&Iacute;' => 'i',
		'&Oacute;' => 'o',
		'&Uacute;' => 'u',
		'&ntilde;' => 'n',
		'&Ntilde;' => 'n'

);

$str = strtr( $string, $unwanted_array );

return $str;

}


function sin_salto_linea($cadenaDeTexto){

	$buscar=array(chr(13).chr(10), "\r\n", "\n", "\r");
	$reemplazar=array("", "", "", "");
	$cadena=str_ireplace($buscar,$reemplazar,$cadenaDeTexto);

	return $cadena;

}


function moneda($val,$symbol='$',$r=2)
{


    $n = $val;
    $sign = ($n < 0) ? '-' : '';
    $i = number_format(abs($n),$r);

    return  $symbol.$sign.$i;


}


function cadena_aleatoria(){

	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
	$numerodeletras=5; //numero de letras para generar el texto
	$cadena = ""; //variable para almacenar la cadena generada
	for($i=0;$i<$numerodeletras;$i++)
	{
	    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	entre el rango 0 a Numero de letras que tiene la cadena */
	}
	return $cadena;

}


function hora_formato($hora){


	$hora = str_replace('13:', '01:', $hora);
	$hora = str_replace('14:', '02:', $hora);
	$hora = str_replace('15:', '03:', $hora);
	$hora = str_replace('16:', '04:', $hora);
	$hora = str_replace('17:', '05:', $hora);
	$hora = str_replace('18:', '06:', $hora);
	$hora = str_replace('19:', '07:', $hora);
	$hora = str_replace('20:', '08:', $hora);
	$hora = str_replace('21:', '09:', $hora);
	$hora = str_replace('22:', '10:', $hora);
	$hora = str_replace('23:', '11:', $hora);
	$hora = str_replace('24:', '12:', $hora);


	return $hora;
}


$GLOBALS['dias'] = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$GLOBALS['meses'] = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


function ver_ciclo($ciclo){

    switch ($ciclo) {
      case '1': $ciclo_actual = '2021A'; break;
      case '2': $ciclo_actual = '2021B'; break;
      case '3': $ciclo_actual = '2021C'; break;
      case '4': $ciclo_actual = '2022A'; break;
      case '5': $ciclo_actual = '2022B'; break;
      case '6': $ciclo_actual = '2022C'; break;
      case '7': $ciclo_actual = '2023A'; break;
      case '8': $ciclo_actual = '2023B'; break;
      case '9': $ciclo_actual = '2023C'; break;
      case '10': $ciclo_actual = '2024A'; break;
      case '11': $ciclo_actual = '2024B'; break;
      case '12': $ciclo_actual = '2024C'; break;
      case '13': $ciclo_actual = '2025A'; break;
      case '14': $ciclo_actual = '2025B'; break;
      case '15': $ciclo_actual = '2026C'; break;
      case '16': $ciclo_actual = '2026A'; break;
      case '17': $ciclo_actual = '2026B'; break;
      case '18': $ciclo_actual = '2026C'; break;
      case '19': $ciclo_actual = '2027A'; break;
      case '20': $ciclo_actual = '2027B'; break;
      case '21': $ciclo_actual = '2027C'; break;
      case '22': $ciclo_actual = '2028A'; break;
      case '23': $ciclo_actual = '2028B'; break;
      case '24': $ciclo_actual = '2028C'; break;
      case '29': $ciclo_actual = '2029A'; break;
      case '26': $ciclo_actual = '2029B'; break;
      case '27': $ciclo_actual = '2029C'; break;
      case '28': $ciclo_actual = '2030A'; break;
      case '29': $ciclo_actual = '2030B'; break;
      case '30': $ciclo_actual = '2030C'; break;

      default: $ciclo_actual = '2021A'; break;
    }

    return $ciclo_actual;

}
