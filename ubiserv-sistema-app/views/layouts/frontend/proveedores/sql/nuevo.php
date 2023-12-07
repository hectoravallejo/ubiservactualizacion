<?php 
	include('recaptchalib.php');

	// your secret key
	$secret = "6LeysnscAAAAAPiwVQf6-Dsq2MCAUS8_BbZ0P8wU";
	
	// empty response
	$response = null;
	
	// check secret key
	$reCaptcha = new ReCaptcha($secret);


	// if submitted check response
	if ($_POST["g-recaptcha-response"]) {
		$response = $reCaptcha->verifyResponse(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
		);
	}

	if ($response != null && $response->success) {

        $proveedores->publicar();

        Flight::redirect( $proveedores->path.'/publicar/anuncio-creado' );	

    }else{

        Flight::redirect( $proveedores->path.'/publicar/error-captcha' );	        
    }

