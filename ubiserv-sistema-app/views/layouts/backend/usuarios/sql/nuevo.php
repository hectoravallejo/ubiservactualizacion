<?php include('includes/seguridad.php');

$usuarios->nuevo();

if($usuarios->error){
	Flight::redirect( $usuarios->path.'/admin/nuevo-usuario/error-usuario' );
}else{
	Flight::redirect( $usuarios->path.'/admin/editar-usuario/'.$usuarios->id_usuario.'/usuario-nuevo' );	
}