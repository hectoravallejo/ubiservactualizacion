<?php include('includes/seguridad.php');

$productos->nuevo();

	Flight::redirect( $productos->path.'/../servicios/editar-producto/'.$_POST['id_proveedor'].'/'.$_POST['id_categoria_producto'].'/'.$productos->id_producto.'/producto-nuevo' );	
