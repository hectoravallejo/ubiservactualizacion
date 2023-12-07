<?php include('includes/webservice-header.php'); ?>

<?php $proveedores->ver_proveedor_webservice($id); 

$categorias->ver_categoria($proveedores->proveedor_actual[0]['id_categoria']);

if($categorias->categoria_actual->restaurante == 1){
   $proveedores->proveedor_actual[0]['es_restaurante'] = TRUE;
}else{
   $proveedores->proveedor_actual[0]['es_restaurante'] = FALSE;
}


echo json_encode($proveedores->proveedor_actual); 

?>

