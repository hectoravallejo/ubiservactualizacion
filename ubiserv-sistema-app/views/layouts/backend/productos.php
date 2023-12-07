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
              <li><a href="<?= $path; ?>/admin/productos/<?= $id_proveedor; ?>/<?= $id_categoria; ?>"><b>Productos</b></a></li>
            </ul>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <div class="row">
              <div class="col-md-6 pull-right">
                <a href="<?= $path; ?>/admin/categorias-productos/<?= $id_proveedor; ?>" class="btn-nuevo btn-editar"><i class="fa fa-chevron-circle-left"></i> categorías</a>
              </div>              
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado text-center">
            <?php $proveedores->ver_proveedor($id_proveedor); ?>
            <h2><?= $proveedores->proveedor_actual->nombre; ?></h2>
            <?php $categorias_productos->ver_categoria($id_categoria); ?>
            <h3><?= $categorias_productos->categoria_actual->nombre; ?></h3>
          </div>
        </div>
      </div>


			<?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
				<?php $productos->mensaje($mensaje); ?>
        <?php $productos->por_pagina = 100; ?>
        <?php $productos->orden_productos = ['orden' => 'ASC', 'nombre' => 'ASC'] ?>
        <?php $productos->pagina_actual = $pagina_actual; ?>


				<?php $productos->ver('backend', array( 'paginacion' => TRUE, 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria )); ?>
			
      <?php }else{
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>