<?php include('includes/seguridad.php'); 



$proveedores->editar($id); 

Flight::redirect( $proveedores->path.'/../servicios/editar-servicio/'.$id.'/servicio-editado' );
