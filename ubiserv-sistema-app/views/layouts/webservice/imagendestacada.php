<?php include('includes/webservice-header.php'); ?>

<?php $imagendestacada->ver(NULL, array('webservice' => TRUE)); 

$imagendestacada->imagendestacada[0]['url_imagen'] = $imagendestacada->path.$imagendestacada->ruta_imagen;

echo json_encode($imagendestacada->imagendestacada); 

?>

