<?php include('includes/seguridad.php');

$categorias_productos->nueva();

// if($categorias_productos->error){
// 	Flight::redirect( $categorias_productos->path.'/../servicios/nueva-categoria-producto/error-categoria' );
// }else{
	Flight::redirect( $categorias_productos->path.'/../servicios/editar-categoria-producto/'.$_POST['id_proveedor'].'/'.$categorias_productos->id_categoria.'/categoria-nueva' );	
// }