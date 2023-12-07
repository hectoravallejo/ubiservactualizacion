<?php include('includes/webservice-header.php'); ?>


<?php $categorias->orden_categorias = ['orden' => 'ASC', 'id' => 'ASC'] ?>

<?php $categorias->ver(); 

$url = $categorias->path.$categorias->ruta_imagen;

foreach($categorias->categorias as $i => $categoria){

  $categoria = (object)$categoria;
  $categorias->categorias[$i]['url'] = $url;

}


echo json_encode($categorias->categorias); 

?>

