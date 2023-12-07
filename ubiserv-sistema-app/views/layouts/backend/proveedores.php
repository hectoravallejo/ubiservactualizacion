<?php include('includes/seguridad.php'); ?>
<?php include('includes/admin-header.php');  ?>
<?php include('includes/admin-head.php');  ?>
<?php include('includes/menu-admin.php'); ?>



      <!-- <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <ul class="rutas list-inline">
              <li>Inicio</li>
              <li><a href="<?= $path; ?>/admin/administracion">Sistema de administración</a></li>
              <li><a href="<?= $path; ?>/admin/proveedores"><b>Categorías</b></a></li>
            </ul>
          </div>
        </div>
      </div> -->


      <br><br><br>

			<?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
				<?php $proveedores->mensaje($mensaje); ?>
        <?php $proveedores->pagina_actual = $pagina_actual; ?>


        <?php if(isset($id_categoria)): ?>
			  	<?php $proveedores->ver('backend', array( 'id_categoria' => $id_categoria, 'paginacion' => TRUE )); ?>
        <?php elseif( isset($aprobar_anuncios)): ?>
			  	<?php $proveedores->ver('backend', array( 'aprobar_anuncios' => TRUE, 'paginacion' => TRUE )); ?>
        <?php else: ?>
			  	<?php $proveedores->ver('backend', array( 'paginacion' => TRUE )); ?>
        <?php endif; ?>
			
      <?php }else{
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>