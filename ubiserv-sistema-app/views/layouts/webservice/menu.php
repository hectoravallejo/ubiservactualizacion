<?php include('includes/webservice-header.php'); ?>


<?php $categorias_productos->orden_categorias = ['orden' => 'ASC', 'id' => 'ASC'] ?>

<?php $categorias_productos->ver(NULL, array('id_proveedor' => $id));

$url = $categorias_productos->path . $categorias_productos->ruta_imagen;
$url_producto = $productos->path . $productos->ruta_imagen;

$proveedores->ver_proveedor($id);

foreach ($categorias_productos->categorias as $i => $categoria) {

   $categoria = (object)$categoria;
   $categorias_productos->categorias[$i]['url'] = $url;


   if( $proveedores->proveedor_actual->lada_whatsapp == '' ){ 
      $proveedores->proveedor_actual->lada_whatsapp = '52'; 
   }

   $categorias_productos->categorias[$i]['whatsapp'] = $proveedores->proveedor_actual->whatsapp;

   $categorias_productos->categorias[$i]['lada_whatsapp'] = $proveedores->proveedor_actual->lada_whatsapp;


   $productos->ver(NULL, array( 'paginacion' => TRUE, 'id_proveedor' => $categoria->id_proveedor, 'id_categoria' => $categoria->id ));

   $categorias_productos->categorias[$i]['url_producto'] = $url_producto;
   
   $categorias_productos->categorias[$i]['productos'] = array();

   $categorias_productos->categorias[$i]['productos'] = $productos->productos;





}


echo json_encode($categorias_productos->categorias);
