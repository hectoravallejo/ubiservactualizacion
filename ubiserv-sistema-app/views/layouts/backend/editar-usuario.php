<?php include('includes/seguridad.php'); ?>
<?php include('includes/admin-header.php');  ?>
<?php include('includes/admin-head.php');  ?>
<?php include('includes/menu-admin.php') ?>


      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <ul class="rutas list-inline">
              <li>Inicio</li>
              <li><a href="<?= $path; ?>/admin/administracion">Sistema de administración</a></li>
              <li><a href="<?= $path; ?>/admin/usuarios">Usuarios</a></li>
              <li><a href="<?= $path; ?>/admin/editar-usuario/<?= $id; ?>"><b>Editar Usuario</b></a></li>
            </ul>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <div class="row">
              <div class="col-md-6 pull-right">
                <a href="<?= $path; ?>/admin/usuarios" class="btn-nuevo btn-editar"><i class="fa fa-chevron-circle-left"></i> Usuarios</a>
              </div>              
            </div>
          </div>
        </div>
      </div>


        <?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
          <?php $usuarios->mensaje($mensaje); ?>
          <?php $usuarios->ver('editar', array('id' => $id)); ?>
        <?php }else{
          $permisos->denegado();
        } ?>

	
<?php include('includes/admin-footer.php');  ?>