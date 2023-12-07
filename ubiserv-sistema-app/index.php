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

require_once 'config/functions.php'; 
require_once 'flight/Flight.php';
require 'models/models.php';

// $GLOBALS['prefijo'] = 'in_';

Flight::before('render', function(&$params, &$output){
    include('config/vars.php');
    include('config/db.php');


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


});


Flight::set('flight.views.path', 'views/layouts');

// ADMINISTRADOR //

Flight::route('(/mensaje(/@mensaje))', function($mensaje){
    Flight::render('backend/index', array('title' => 'Login', 'mensaje' => $mensaje));
});

Flight::route('(/recuperar-clave(/@mensaje))', function($mensaje){
    Flight::render('backend/recuperar-clave', array('title' => 'Login', 'mensaje' => $mensaje));
});

Flight::route('(/recuperar(/@mensaje))', function($mensaje){
    Flight::render('recuperar', array('title' => 'Login', 'mensaje' => $mensaje));
});

Flight::route('/admin/administracion', function(){
    include('models/administradores.php');
    Flight::render('backend/administracion', array('menu_actual' => '', 'title' => 'Administración'));
});

// - ADMIN - //

// ------- Usuarios -------- //

Flight::route('/admin/nuevo-usuario(/@mensaje)', function($mensaje){
    Flight::render('backend/nuevo-usuario', array('title' => 'Nuevo Usuario', 'menu_actual' => 'usuarios', 'mensaje' => $mensaje ));
});

Flight::route('/admin/usuarios/nuevo', function(){
    Flight::render('backend/usuarios/sql/nuevo');
});

Flight::route('/admin/editar-usuario(/@id(/@mensaje))', function($id, $mensaje){
    Flight::render('backend/editar-usuario', array('title' => 'Editar Usuario', 'menu_actual' => 'usuarios', 'id' => $id, 'mensaje' => $mensaje ));
});

Flight::route('/admin/usuarios/editar/@id', function($id){
    Flight::render('backend/usuarios/sql/editar', array('id' => $id));
});

Flight::route('/admin/usuarios(/@pagina_actual(/@mensaje))', function($pagina_actual, $mensaje){

    Flight::render('backend/usuarios', array('title' => 'Usuarios', 'menu_actual' => 'usuarios', 'pagina_actual' => $pagina_actual, 'mensaje' => $mensaje ));

});

Flight::route('/admin/eliminar-usuario', function(){
    Flight::render('backend/usuarios/sql/eliminar');
});

Flight::route('/admin/usuarios(/@mensaje)', function($mensaje){
    Flight::render('backend/usuarios', array('title' => 'Usuarios', 'menu_actual' => 'usuarios', 'mensaje' => $mensaje ));
});

Flight::route('/admin/agregar-anuncio-asociado', function(){
    Flight::render('backend/usuarios/ajax/anuncio-asociado');
});

Flight::route('/admin/eliminar-anuncio-asociado', function(){
    Flight::render('backend/usuarios/ajax/eliminar-anuncio-asociado');
});

Flight::route('/admin/select_proveedor_categoria/@id_categoria', function($id_categoria){
    Flight::render('backend/usuarios/ajax/select-categoria', array( 'id_categoria' => $id_categoria ) );
});


// ------- proveedores -------- //

Flight::route('/admin/nuevo-proveedor(/@mensaje)', function($mensaje){
    Flight::render('backend/nuevo-proveedor', array('title' => 'Nuevo proveedor', 'menu_actual' => 'proveedores', 'mensaje' => $mensaje ));
});

Flight::route('/admin/proveedores/nuevo', function(){
    Flight::render('backend/proveedores/sql/nuevo');
});

Flight::route('/admin/editar-proveedor(/@id(/@mensaje))', function($id, $mensaje){
    Flight::render('backend/editar-proveedor', array('title' => 'Editar proveedor', 'menu_actual' => 'proveedores', 'id' => $id, 'mensaje' => $mensaje ));
});

Flight::route('/admin/proveedores/editar/@id', function($id){
    Flight::render('backend/proveedores/sql/editar', array('id' => $id));
});

Flight::route('/admin/proveedores(/@pagina_actual(/@mensaje))', function($pagina_actual, $mensaje){

    Flight::render('backend/proveedores', array('title' => 'proveedores', 'menu_actual' => 'proveedores', 'pagina_actual' => $pagina_actual, 'mensaje' => $mensaje ));

});

Flight::route('/admin/eliminar-proveedor', function(){
    Flight::render('backend/proveedores/sql/eliminar');
});


Flight::route('/admin/proveedores-categoria/@id_categoria(/@pagina_actual(/@mensaje))', function($id_categoria, $pagina_actual, $mensaje){

    Flight::render('backend/proveedores', array('title' => 'proveedores', 'menu_actual' => 'proveedores', 'id_categoria' => $id_categoria, 'pagina_actual' => $pagina_actual, 'mensaje' => $mensaje ));

});

Flight::route('/admin/autorizar-anuncios(/@pagina_actual(/@mensaje))', function($pagina_actual, $mensaje){

    Flight::render('backend/proveedores', array('title' => 'Autorizar anuncios', 'menu_actual' => 'autorizaranuncios', 'aprobar_anuncios' => TRUE, 'pagina_actual' => $pagina_actual, 'mensaje' => $mensaje ));

});



// ------- categorias -------- //

Flight::route('/admin/nueva-categoria(/@mensaje)', function($mensaje){
    Flight::render('backend/nueva-categoria', array('title' => 'Nueva categoria', 'menu_actual' => 'categorias', 'mensaje' => $mensaje ));
});

Flight::route('/admin/categorias/nueva', function(){
    Flight::render('backend/categorias/sql/nueva');
});

Flight::route('/admin/editar-categoria(/@id(/@mensaje))', function($id, $mensaje){
    Flight::render('backend/editar-categoria', array('title' => 'Editar categoria', 'menu_actual' => 'categorias', 'id' => $id, 'mensaje' => $mensaje ));
});

Flight::route('/admin/categorias/editar/@id', function($id){
    Flight::render('backend/categorias/sql/editar', array('id' => $id));
});

Flight::route('/admin/categorias(/@pagina_actual(/@mensaje))', function($pagina_actual, $mensaje){

    Flight::render('backend/categorias', array('title' => 'categorias', 'menu_actual' => 'categorias', 'pagina_actual' => $pagina_actual, 'mensaje' => $mensaje ));

});

Flight::route('/admin/eliminar-categoria', function(){
    Flight::render('backend/categorias/sql/eliminar');
});




// ------- estadisticas -------- //

Flight::route('/admin/estadisticas(/@fecha_desde(/@fecha_hasta(/@mensaje)))', function($fecha_desde, $fecha_hasta, $mensaje){
    Flight::render('backend/estadisticas', array('title' => 'estadisticas', 'menu_actual' => 'estadisticas', 'fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta, 'mensaje' => $mensaje ));
});

Flight::route('/admin/estadisticas-descargar(/@fecha_desde(/@fecha_hasta(/@mensaje)))', function($fecha_desde, $fecha_hasta, $mensaje){
    Flight::render('backend/estadisticas', array('title' => 'estadisticas', 'menu_actual' => 'estadisticas', 'fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta, 'mensaje' => $mensaje ));
});


// --------------- categorias productos -------------- //


Flight::route('/admin/nueva-categoria-producto(/@id_proveedor(/@mensaje))', function($id_proveedor, $mensaje){
    Flight::render('backend/nueva-categoria-producto', array('title' => 'Nueva categoria', 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'mensaje' => $mensaje ));
});

Flight::route('/admin/categorias-productos/nueva', function(){
    Flight::render('backend/categorias-productos/sql/nueva');
});

Flight::route('/admin/editar-categoria-producto(/@id_proveedor(/@id(/@mensaje)))', function($id_proveedor, $id, $mensaje){
    Flight::render('backend/editar-categoria-producto', array('title' => 'Editar categoria', 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'id' => $id, 'mensaje' => $mensaje ));
});

Flight::route('/admin/categorias-productos/editar/@id', function($id){
    Flight::render('backend/categorias-productos/sql/editar', array('id' => $id));
});

Flight::route('/admin/categorias-productos/@id_proveedor(/@pagina_actual(/@mensaje))', function($id_proveedor, $pagina_actual, $mensaje){
    Flight::render('backend/categorias-productos', array('title' => 'Menú de productos', 'pagina_actual' => $pagina_actual, 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'mensaje' => $mensaje ));
});

Flight::route('/admin/eliminar-categoria-producto', function(){
    Flight::render('backend/categorias-productos/sql/eliminar');
});



// --------------- productos -------------- //


Flight::route('/admin/nuevo-producto(/@id_proveedor/@id_categoria(/@mensaje))', function($id_proveedor, $id_categoria, $mensaje){
    Flight::render('backend/nuevo-producto', array('title' => 'Nueva categoria', 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria, 'mensaje' => $mensaje ));
});

Flight::route('/admin/productos/nuevo', function(){
    Flight::render('backend/productos/sql/nuevo');
});


Flight::route('/admin/editar-producto(/@id_proveedor(/@id_categoria/@id(/@mensaje)))', function($id_proveedor, $id_categoria, $id, $mensaje){
    Flight::render('backend/editar-producto', array('title' => 'Editar categoria', 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'id' => $id, 'id_categoria' => $id_categoria, 'mensaje' => $mensaje ));
});

Flight::route('/admin/productos/editar/@id', function($id){
    Flight::render('backend/productos/sql/editar', array('id' => $id));
});

Flight::route('/admin/productos/@id_proveedor/@id_categoria(/@pagina_actual(/@mensaje))', function($id_proveedor, $id_categoria, $pagina_actual, $mensaje){
    Flight::render('backend/productos', array('title' => 'Menú de productos', 'pagina_actual' => $pagina_actual, 'menu_actual' => 'proveedores', 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria, 'mensaje' => $mensaje ));
});

Flight::route('/admin/eliminar-producto', function(){
    Flight::render('backend/productos/sql/eliminar');
});


// --------------- imagen destacadas -------------

Flight::route('/admin/imagendestacada(/@mensaje)', function($mensaje){
    Flight::render('backend/imagendestacada', array('title' => 'Editar imagen destacada', 'menu_actual' => 'imagendestacada', 'mensaje' => $mensaje ));
});

Flight::route('/admin/editar-imagendestacada', function(){
    Flight::render('backend/imagendestacada/sql/editar');
});


// ------------ Autopublicación -------------- //


Flight::route('/publicar(/@mensaje)', function($mensaje){
    Flight::render('frontend/publicar', array('title' => 'Nueva publicación', 'mensaje' => $mensaje ));
});


Flight::route('/publicar-anuncio', function(){
    Flight::render('frontend/proveedores/sql/nuevo');
});


Flight::route('/terminos(/@mensaje)', function($mensaje){
    Flight::render('frontend/terminos', array('title' => 'Nueva publicación', 'mensaje' => $mensaje ));
});

// WEBSERVICE //


Flight::route('/webservice/categorias', function(){
    Flight::render('webservice/categorias');
});

Flight::route('/webservice/proveedores(/@id_categoria(/@longitud/@latitud/@distancia_usuario))', function($id_categoria, $longitud, $latitud, $distancia_usuario){
    Flight::render('webservice/proveedores', array( 'id_categoria' => $id_categoria, 'longitud' => $longitud, 'latitud' => $latitud, 'distancia_usuario' => $distancia_usuario ));
});

Flight::route('/webservice/proveedor(/@id)', function($id){
    Flight::render('webservice/proveedor', array('id' => $id));
});

Flight::route('/webservice/menu(/@id)', function($id){
    Flight::render('webservice/menu', array('id' => $id));
});

Flight::route('/webservice/agregar-visita-proveedor', function(){
    Flight::render('webservice/agregar-visita-proveedor');
});

Flight::route('/webservice/agregar-visita-categoria', function(){
    Flight::render('webservice/agregar-visita-categoria');
});

Flight::route('/webservice/imagendestacada', function(){
    Flight::render('webservice/imagendestacada');
});




// CERRAR SESIÓN //

Flight::route('/admin/status/logout', function(){


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
       Flight::redirect('/');
    // }

});



// desactivar errores.

//Flight::map('error', function(Exception $ex){ });


Flight::start();