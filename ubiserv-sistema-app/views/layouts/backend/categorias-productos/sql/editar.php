<?php include('includes/seguridad.php'); 

$categorias_productos->editar($id);

Flight::redirect( $categorias_productos->path.'/admin/editar-categoria-producto/'.$_POST['id_proveedor'].'/'.$id.'/categoria-editada' );
