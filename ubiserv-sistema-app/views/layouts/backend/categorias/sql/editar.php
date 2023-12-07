<?php include('includes/seguridad.php'); 

$categorias->editar($id);

Flight::redirect( $categorias->path.'/admin/editar-categoria/'.$id.'/categoria-editada' );
