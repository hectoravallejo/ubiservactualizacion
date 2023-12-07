<?php include('includes/seguridad.php');

$categorias->nueva();

if($categorias->error){
	Flight::redirect( $categorias->path.'/admin/nueva-categoria/error-categoria' );
}else{
	Flight::redirect( $categorias->path.'/admin/editar-categoria/'.$categorias->id_categoria.'/categoria-nueva' );	
}