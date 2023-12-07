<?php if (!@include('config/vars.php')) {
	include('../sistema/config/vars.php');
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">

	<?php include_once('constructor-titulo.php'); ?>
	<title><?= $title . $titulo_extra; ?></title>
	<meta name="keywords" content="">
	<meta name="description" content="La App más dinámica, donde puedes tener acceso a todo tipo de productos y servicios, y podrás inclusive, seleccionar a los proveedores más cercanos a ti, o en el rango de distancia que desees, a partir de tu ubicación.">
	<meta name="author" content="UBISERV">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />

	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= $path; ?>/../servicios/css/bootstrap.min.css">
	<!-- font-awesome -->
	<link rel="stylesheet" href="<?= $path; ?>/../servicios/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<!-- custom -->
	<link rel="stylesheet" href="<?= $path; ?>/../servicios/css/templatemo-style.css">
	<!-- google font -->
	<link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
	<!-- icons fontawesome -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

	<script type="text/javascript" src="<?= $path . '/../ubiserv-sistema-app/js/admin/tinymce/tinymce.min.js'; ?>"></script>

	<script type="text/javascript" src="<?= $path . '/../ubiserv-sistema-app/js/admin/es_MX.js'; ?>"></script>





	<script>
		tinymce.init({

			selector: ".editor",

			menubar: false,

			convert_urls: false,

			plugins: [

				"advlist autolink lists link image charmap print preview anchor",

				"searchreplace visualblocks code fullscreen",

				"insertdatetime media table contextmenu paste imgsurfer"

			],

			// toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist | imgsurfer media"

			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist "

		});
	</script>





	<script>
		tinymce.init({

			selector: ".editor-simple",

			menubar: false,

			statusbar: false,

			convert_urls: false,

			plugins: [

			],

			toolbar: "bold"

		});
	</script>


	<link rel="stylesheet" type="text/css" href="<?= $path; ?>/../ubiserv-sistema-app/css/admin/main.css">


</head>

<body id="home" data-spy="scroll" data-target=".navbar-collapse">

	<!-- start navigation -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #FF5600; height: 90px">
		<div class="container">
			<div class="navbar-header">
				<a href="https://ubi-serv.com" class="navbar-brand smoothScroll"><strong><img src="https://ubi-serv.com/wp-content/uploads/2020/12/logo-ubiserv-retina-300x99.png" style="max-width: 180px;"></strong></a>
				<div class="login-vinculo">
					<?php if (isset($permisos)) : ?>
						<?php if ($_SERVER['REQUEST_URI']  != '/../servicios/login' && !isset($permisos->tipo_usuario)) : ?>
							<a href="<?= $path; ?>/servicios/login" target="_blank">Iniciar sesión</a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if (isset($permisos)) : ?>
						<?php if ($permisos->tipo_usuario == 'cliente') : ?>
							<a href="<?= $path; ?>/../servicios/status/logout">Cerrar sesión</a>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			</div>

		</div>
	</div>