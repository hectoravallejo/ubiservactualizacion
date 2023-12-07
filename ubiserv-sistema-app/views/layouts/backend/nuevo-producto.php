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
              <li><a href="<?= $path; ?>/admin/productos/<?= $id_proveedor; ?>/<?= $id_categoria; ?>">Productos</a></li>
              <li><a href="<?= $path; ?>/admin/nuevo-producto/<?= $id_proveedor; ?>/<?= $id_categoria; ?>"><b>Nuevo Producto</b></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <div class="row">
              <div class="col-md-6 pull-right">
                <a href="<?= $path; ?>/admin/productos/<?= $id_proveedor; ?>/<?= $id_categoria; ?>" class="btn-nuevo btn-editar"><i class="fa fa-chevron-circle-left"></i> productos</a>
              </div>              
            </div>
          </div>
        </div>
      </div>

      
        <?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
					<?php $productos->mensaje($mensaje); ?>
					<?php $productos->ver('nuevo', array( 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria )); ?>
				<?php }else{
					$permisos->denegado();
				} ?>

	
<?php include('includes/admin-footer.php');  ?>