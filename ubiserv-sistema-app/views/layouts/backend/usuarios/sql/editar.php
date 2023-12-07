<?php include('includes/seguridad.php'); 

$usuarios->editar($id);

Flight::redirect( $usuarios->path.'/admin/editar-usuario/'.$id.'/usuario-editado' );
