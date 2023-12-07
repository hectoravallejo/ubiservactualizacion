<?php include('includes/seguridad.php');

$proveedores->nuevo();

if($proveedores->error){
	Flight::redirect( $proveedores->path.'/admin/nuevo-proveedor/error-proveedor' );
}else{
	Flight::redirect( $proveedores->path.'/admin/editar-proveedor/'.$proveedores->id_proveedor.'/proveedor-nuevo' );	
}