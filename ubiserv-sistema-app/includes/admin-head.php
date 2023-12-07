<div class="row barra-top">
  <div class="container">
    <div class="col-md-12">
      <b><?php echo @$_COOKIE["Email"]; ?>
      <div class="pull-right" id="control-usuarios-menu">
        <a href="#">Control de usuarios</a>
        <ul id="control-usuarios">
        	<li><a href="<?= $path; ?>/admin/usuarios"><i class="fa fa-user"></i> Usuarios</a></li>
        	<li><a href="<?= $path; ?>/admin/nuevo-usuario"><i class="fa fa-user-plus"></i> Nuevo usuario</a></li>
          <li class="menu-rojo"><a href="<?php echo $path; ?>/admin/status/logout"><i class="fa fa-close"></i> Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </div>  
</div>