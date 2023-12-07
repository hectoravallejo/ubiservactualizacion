<?php
require_once '../ubiserv-sistema-app/medoo/Medoo.php';


use Medoo\Medoo;

$entorno = 'web';


if($entorno == 'local'){

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'ubiserv_sistema_app',
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ]);

}

if($entorno == 'web'){

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'ubiservi_sistema_app',
        'server' => 'localhost',
        'username' => 'ubiservi_ubiserv2',
        'password' => '4HISQ[^f_[BB',
        'charset' => 'utf8'
    ]);

}


/*
$actualizar_ruta_imagenes = $database->replace("in_productos", "descripcion", [
    "http://localhost/kitchenzone/sitio-administrable/" => "http://kitchenzone.com.mx/demo/sitio-administrable/",
]);
*/