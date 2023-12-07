<?php include('includes/header.php'); ?>

<?php 

	$proveedores->por_pagina = 21; 
	if(!isset($pagina_actual)){
		$proveedores->pagina_actual = 1;
	} else{
		$proveedores->pagina_actual = $pagina_actual;
	}

	$proveedores->ver_por_slug($categoria); 
	$categorias->ver_por_slug($categoria); 

?>

<!-- start gallery -->


<section id="gallery" class="templatemo-section templatemo-light-gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center text-uppercase"><?= @$categorias->categoria->nombre; ?></h2>
				<hr>
			</div>
			<?php foreach ($proveedores->proveedores as $i => $proveedor) : ?>
				<?php $proveedor = (object)$proveedor; ?>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<a href="/servicios/<?= $categoria; ?>/<?= $proveedor->slug; ?>">
							<?php if ($proveedor->imagen != '') : ?>
								<div class="contenedor-imagen-galeria">
									<img src="<?= $proveedores->path . $proveedores->ruta_imagen . $proveedor->imagen; ?>" class="img-responsive gallery-img">
								</div>
							<?php endif; ?>
							<div class="gallery-des">
								<h3><?= $proveedor->nombre; ?></h3>
								<h5>
									<?= extracto(strip_tags($proveedor->descripcion), 200); ?>
								</h5>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- end gallery -->

<div class="clearfix"></div>
<section>
	
	<?php

	$url_paginacion = '/../servicios/'.$categoria.'/';
	

	$proveedores->paginacion->ver('paginacion-servicios', array(
		
		'url' => $url_paginacion,
		'numero_registros' => $proveedores->numero_proveedores,
		'por_pagina' => $proveedores->por_pagina
		
	));
	?>

</section>

<div class="clearfix"></div>

<?php include('includes/footer.php'); ?>