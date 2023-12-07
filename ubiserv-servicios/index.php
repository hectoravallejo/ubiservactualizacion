<?php

define( 'MAX_SESSION_TIME', 3600 * 12 ); // 12 hora   

session_set_cookie_params(86400 * 7); 
ini_set('session.gc_maxlifetime', 86400 * 7);
ini_set('session.cookie_lifetime', 86400 * 7);
ini_set('session.cache_expire', 86400 * 7);
date_default_timezone_set('America/Mexico_City');





    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

// if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
//     $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     header('HTTP/1.1 301 Moved Permanently');
//     header('Location: ' . $redirect);
//     exit();
// }

require_once '../ubiserv-sistema-app/config/functions.php'; 
require_once '../ubiserv-sistema-app/flight/Flight.php';
require '../ubiserv-sistema-app/models/models.php';

// $GLOBALS['prefijo'] = 'in_';

Flight::before('render', function(&$params, &$output){
    include('../ubiserv-sistema-app/config/vars.php');
    include('../ubiserv-sistema-app/config/db.php');


    if(isset($_COOKIE['id'])){
        $permisos = new Permisos(@$_COOKIE['id'], @$_COOKIE['tipo_usuario'], @$_COOKIE['email']);
        $params[1]['permisos'] = $permisos;
    }


        $models = new Models($database, $path, $serverpath);

        $params[1]['usuarios'] = $models->usuarios;
        $params[1]['proveedores'] = $models->proveedores;
        $params[1]['categorias'] = $models->categorias;
        $params[1]['categorias_productos'] = $models->categorias_productos;
        $params[1]['estadisticas'] = $models->estadisticas;

        $params[1]['productos'] = $models->productos;

        $params[1]['imagendestacada'] = $models->imagendestacada;

        $params[1]['anuncios'] = $models->anuncios;
        $params[1]['qr'] = $models->qr;

});


Flight::set('flight.views.path', 'views/layouts');

// ADMINISTRADOR //

Flight::route('/', function(){
    // Flight::render('restaurantes/index', array('title' => 'Restaurantes'));
});

Flight::route('/login', function(){
    Flight::render('servicios/login', array('title' => 'Ubiserv'));
});



Flight::route('/mensaje-cliente(/@error)', function($error){
    Flight::render('servicios/login', array('title' => 'Ubiserv', 'error' => $error ));
});

Flight::route('/admin/administracion', function(){
    include('../ubiserv-sistema-app/models/administradores.php');
    Flight::render('servicios/admin/cuenta', array('title' => 'Ubiserv', 'titulo_seccion' => TRUE));
});

Flight::route('/editar-servicio/@id(/@mensaje)', function($id, $mensaje){
    Flight::render('servicios/admin/editar-servicio', array('title' => 'Ubiserv', 'id' => $id, 'mensaje' => $mensaje ));
});

Flight::route('/menu/@id', function($id){
    Flight::render('servicios/admin/menu', array('title' => 'Ubiserv', 'id' => $id ));
});

Flight::route('/nueva-categoria-producto/@id', function($id){
    Flight::render('servicios/admin/nueva-categoria-producto', array('title' => 'Ubiserv', 'id' => $id ));
});

Flight::route('/editar-categoria-producto/@id_proveedor/@id_categoria(/@mensaje)', function($id_proveedor, $id_categoria, $mensaje){
    Flight::render('servicios/admin/editar-categoria-producto', array('title' => 'Ubiserv', 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria, 'mensaje' => $mensaje ));
});

Flight::route('/nuevo-producto(/@id_proveedor/@id_categoria(/@mensaje))', function($id_proveedor, $id_categoria, $mensaje){
    Flight::render('servicios/admin/nuevo-producto', array('title' => 'Nuevo producto', 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria, 'mensaje' => $mensaje ));
});

Flight::route('/productos/nuevo', function(){
    Flight::render('servicios/admin/productos/sql/nuevo');
});

Flight::route('/editar-producto(/@id_proveedor(/@id_categoria/@id(/@mensaje)))', function($id_proveedor, $id_categoria, $id, $mensaje){
    Flight::render('servicios/admin/editar-producto', array('title' => 'Editar categoria', 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'id' => $id, 'id_categoria' => $id_categoria, 'mensaje' => $mensaje ));
});

Flight::route('/productos/editar/@id', function($id){
    Flight::render('servicios/admin/productos/sql/editar', array('id' => $id));
});

Flight::route('/eliminar-producto', function(){
    Flight::render('servicios/admin/productos/sql/eliminar');
});

Flight::route('/categorias-productos/editar/@id', function($id){
    Flight::render('servicios/admin/categorias-productos/sql/editar', array('id' => $id));
});

Flight::route('/productos/@id_proveedor/@id_categoria', function($id_proveedor, $id_categoria){
    Flight::render('servicios/admin/productos', array('title' => 'Ubiserv', 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria ));
});


// CERRAR SESIÓN //

Flight::route('/status/logout', function(){


    // if(isset($_SESSION['id_cliente'])){
    //     $tipo_usuario = 'cliente';
    // }


	function logout() { 

        session_unset(); session_destroy(); session_start(); session_regenerate_id(true); 
      
        setcookie("id", '' , time()+(60*60*24*365), '/');
        setcookie("email", '' , time()+(60*60*24*365), '/');
        setcookie("tipo_usuario", '' , time()+(60*60*24*365), '/');


    }
	logout();
    


    // if($tipo_usuario == 'cliente'){
	   // Flight::redirect('/iniciar-sesion');
    // }else{
       Flight::redirect('/login');
    // }


});




Flight::route('/proveedores/editar/@id', function($id){
    Flight::render('servicios/admin/proveedores/sql/editar', array('id' => $id));
});

Flight::route('/categorias-productos/nueva', function(){
    Flight::render('servicios/admin/categorias-productos/sql/nueva');
});

Flight::route('/eliminar-categoria-producto', function(){
    Flight::render('servicios/admin/categorias-productos/sql/eliminar');
});

// Front servicios

Flight::route('/folleto/@slug', function($slug){
    Flight::render('servicios/folleto', array('title' => 'folleto', 'slug' => $slug));
});

Flight::route('/@categoria(/@pagina_actual:[0-9])', function($categoria, $pagina_actual){
    Flight::render('servicios/index', array('title' => 'Restaurantes', 'categoria' => $categoria, 'pagina_actual' => $pagina_actual));
});

Flight::route('/@categoria/@slug', function($categoria, $slug){
    Flight::render('servicios/servicio', array('title' => 'Ubiserv', 'titulo_seccion' => TRUE, 'categoria' => $categoria, 'slug' => $slug));
});













// desactivar errores.

//Flight::map('error', function(Exception $ex){ });


Flight::start();