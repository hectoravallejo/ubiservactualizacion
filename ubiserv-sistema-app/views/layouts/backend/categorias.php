<?php include('includes/seguridad.php'); ?>
<?php include('includes/admin-header.php');  ?>
<?php include('includes/admin-head.php');  ?>
<?php include('includes/menu-admin.php'); ?>



      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <ul class="rutas list-inline">
              <li>Inicio</li>
              <li><a href="<?= $path; ?>/admin/administracion">Sistema de administración</a></li>
              <li><a href="<?= $path; ?>/admin/categorias"><b>Categorías</b></a></li>
            </ul>
          </div>
        </div>
      </div>


			<?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
				<?php $categorias->mensaje($mensaje); ?>
        <?php $categorias->por_pagina = 100; ?>
        <?php $categorias->orden_categorias = ['orden' => 'ASC', 'nombre' => 'ASC'] ?>
        <?php $categorias->pagina_actual = $pagina_actual; ?>


				<?php $categorias->ver('backend', array( 'paginacion' => TRUE )); ?>
			
      <?php }else{
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>