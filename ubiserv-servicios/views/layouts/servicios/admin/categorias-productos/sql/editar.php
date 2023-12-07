<?php include('includes/seguridad.php'); 

$categorias_productos->editar($id);

Flight::redirect( $categorias_productos->path.'/../servicios/editar-categoria-producto/'.$_POST['id_proveedor'].'/'.$id.'/categoria-editada' );
