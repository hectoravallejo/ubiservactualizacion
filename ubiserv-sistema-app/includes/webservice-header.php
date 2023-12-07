<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, application/x-www-form-urlencoded, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Content-type: application/json; charset=utf-8");


// header("Accept : application/json");


// header('Access-Control-Allow-Headers: Content-Type');


$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    // die();
}
?>