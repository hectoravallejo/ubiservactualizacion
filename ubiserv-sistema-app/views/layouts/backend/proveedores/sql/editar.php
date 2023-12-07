<?php include('includes/seguridad.php'); 


// var_dump( date("H:i", strtotime($_POST['desde_martes'])));
// var_dump( date( "H:i", time() ) );


// if( date("H:i", strtotime($_POST['desde_martes'])) > '18:39' ){
//    echo 'mayor';
// }else{
//    echo 'menor';
// };




$proveedores->editar($id); 

Flight::redirect( $proveedores->path.'/admin/editar-proveedor/'.$id.'/proveedor-editado' );
