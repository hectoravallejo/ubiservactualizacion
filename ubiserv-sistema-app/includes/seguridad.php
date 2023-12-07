<?php
/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include('config/db.php');

  $administrador = $database->get("in_usuarios", [
    "id",
  ], [
    "AND" => [
      "id" => @$_COOKIE["id"],
    ]
  ]);


  if( $administrador ){

    if( $administrador ){
      // $_SESSION["id"] = $_COOKIE['id_usuario'];
      // $_SESSION["tipo_usuario"] = 'superadmin';
    }else{      
      if(Flight::request()->url != '/' && Flight::request()->url != '/mensaje/error' && Flight::request()->url != '/admin/administracion'){
        Flight::redirect('/admin/status/logout');
      }
    }


  }else{

    if(Flight::request()->url != '/' && Flight::request()->url != '/mensaje/error' && Flight::request()->url != '/admin/administracion'){
      Flight::redirect('/admin/status/logout');
    }

  }







