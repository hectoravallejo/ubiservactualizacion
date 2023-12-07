<?php include('includes/webservice-header.php');

$_POST = json_decode( file_get_contents("php://input"), true);

// var_dump(json_decode( file_get_contents("php://input"), true));

// var_dump($_POST);

$estadisticas->nueva_estadistica_categoria(); 

