<?php include('includes/seguridad.php'); ?>
<?php include('includes/admin-header.php');  ?>
<?php include('includes/admin-head.php');  ?>
<?php include('includes/menu-admin.php'); ?>






			<?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
				<?php $estadisticas->mensaje($mensaje); ?>

				<?php $estadisticas->ver('backend', array('fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta)); ?>
			
      <?php }else{
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>