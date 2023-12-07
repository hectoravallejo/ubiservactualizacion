<?php 	
if(file_exists('config/db.php')){
	include('config/db.php');
}else{
	include('../ubiserv-sistema-app/config/db.php');
	$seccion_clientes = TRUE;
}



if($_POST){

	$email = $_POST['email']; 
	// $clave = md5($_POST['Pasword']); 
	$clave = md5( $_POST['clave'] ); 


	// ------------- administradores

	$administrador = $database->get("in_usuarios", [
		"id",
		"email",
		"clave",
		"tipo_usuario",
	], [
		"AND" => [
			"email" => $email,
			"clave" => $clave,
		]
	]);
	

	// ------------- administradores

	if(isset($administrador['email'])){


		if( $administrador['email'] != '' && $administrador['clave'] != '' && $administrador['email'] == $email && $administrador['clave'] == $clave ){


			// $token = openssl_random_pseudo_bytes(16);
			// $token = bin2hex($token);

			setcookie("id", $administrador['id'] , time()+(60*60*24*365), '/');
			setcookie("email", $administrador['email'] , time()+(60*60*24*365), '/');
			setcookie("tipo_usuario", $administrador['tipo_usuario'], time()+(60*60*24*365), '/');

		}

	    Flight::redirect('/admin/administracion');


	}else{
		if(isset($seccion_clientes)){
			Flight::redirect('/mensaje-cliente/error');
		}else{
			Flight::redirect('/mensaje/error');
		}
	}

	if(isset($seccion_clientes)){
		Flight::redirect('/mensaje-cliente/error');
	}else{
		Flight::redirect('/mensaje/error');
	}

}