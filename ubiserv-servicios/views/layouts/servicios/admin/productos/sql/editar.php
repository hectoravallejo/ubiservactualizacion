<?php include('includes/seguridad.php'); 

$productos->editar($id);

Flight::redirect( $productos->path.'/../servicios/editar-producto/'.$_POST['id_proveedor'].'/'.$_POST['id_categoria_producto'].'/'.$id.'/producto-editado' );
