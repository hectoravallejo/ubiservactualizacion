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
              <li><a href="<?= $path; ?>/admin/usuarios"><b>Usuarios</b></a></li>
            </ul>
          </div>
        </div>
      </div>


			<?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
				<?php $usuarios->mensaje($mensaje); ?>
        <?php $usuarios->pagina_actual = $pagina_actual; ?>


				<?php $usuarios->ver('backend', array( 'paginacion' => TRUE )); ?>
			
      <?php }else{
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>