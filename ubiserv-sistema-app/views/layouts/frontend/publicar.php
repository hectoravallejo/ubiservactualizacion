<?php //include('includes/seguridad.php'); ?>
<?php include('includes/frontend-header.php');  ?>
<?php include('includes/frontend-head.php');  ?>

         <?php $proveedores->mensaje($mensaje); ?>

         <?php $proveedores->ver('publicar', array('mensaje' => $mensaje)); ?>

<?php include('includes/admin-footer.php');  ?>