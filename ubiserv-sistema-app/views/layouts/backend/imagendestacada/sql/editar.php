<?php include('includes/seguridad.php'); 

$imagendestacada->editar();

Flight::redirect( $imagendestacada->path.'/admin/imagendestacada' );
