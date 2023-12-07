<?php include('includes/seguridad.php'); ?>
<?php include('includes/admin-header.php');  ?>
<?php include('includes/admin-head.php');  ?>
<?php include('includes/menu-admin.php'); ?>






			<?php if ($permisos->tipo_usuario(array('superadmin'))) { ?>
				<?php $imagendestacada->mensaje($mensaje); ?>

				<?php $imagendestacada->ver('backend'); ?>
			
      <?php } else {
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>