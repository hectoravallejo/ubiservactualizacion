<?php


$entorno = 'web';


if($entorno == 'local'){

	$path = 'http://localhost/ubiserv-sistema-app';
	$serverpath = $_SERVER['DOCUMENT_ROOT'].'/ubiserv-sistema-app';
	$menu_activo = 'class="actual"';
	$nombre_sitio = 'Ubiserv';
	$url_uploads = 'http://localhost/ubiserv-sistema-app/uploads/';
	date_default_timezone_set('Mexico/General');
	$dir_uploads = 'C:/xampp/htdocs/ubiserv-sistema-app/uploads/';

}

if($entorno == 'web'){

	( preg_match('/www/', $_SERVER['HTTP_HOST']) ) ? $www = 'www.' : $www = '';

	$path = 'https://'.$www.'ubi-serv.com/ubiserv-sistema-app';
	$serverpath = $_SERVER['DOCUMENT_ROOT'].'/ubiserv-sistema-app';
	$menu_activo = 'class="actual"';
	$nombre_sitio = 'Ubiserv';
	$url_uploads = 'https://'.$www.'ubi-serv.com/ubiserv-sistema-app/uploads/';
	date_default_timezone_set('Mexico/General');
	$dir_uploads = '/home4/acuatica/cujalico.com/ubiserv-sistema-app/uploads/';

}

