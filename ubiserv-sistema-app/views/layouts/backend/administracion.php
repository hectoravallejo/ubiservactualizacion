<?php include('includes/seguridad.php'); ?>
<?php include('includes/admin-header.php'); ?>
<?php include('includes/admin-head.php'); ?>
<?php include('includes/menu-admin.php'); ?>

      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <ul class="rutas list-inline">
              <li>Inicio</li>
              <li><a href="<?= $path; ?>/admin/administracion"><b>Sistema de administración</b></a></li>
            </ul>
          </div>
        </div>
      </div>


        <div class="row">
          <div class="col-md-11 centrado text-center">
            <div>
              <h1>Bienvenido</h1>
              <h2>Al sistema de administración</h2>
            </div>
          </div>
        </div>


<?php include('includes/admin-footer.php') ?>