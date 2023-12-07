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
              <li><a href="<?= $path; ?>/admin/categorias-productos/<?= $id_proveedor; ?>"><b>Categorías Productos</b></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">
            <div class="row">
              <div class="col-md-6 pull-right">
                <a href="<?= $path; ?>/admin/proveedores" class="btn-nuevo btn-editar"><i class="fa fa-chevron-circle-left"></i> proveedores</a>
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
          </div>
        </div>
      </div>


			<?php if( $permisos->tipo_usuario(array('superadmin')) ){ ?>
				<?php $categorias_productos->mensaje($mensaje); ?>
        <?php $categorias_productos->por_pagina = 100; ?>
        <?php $categorias_productos->orden_categorias = ['orden' => 'ASC', 'nombre' => 'ASC'] ?>
        <?php $categorias_productos->pagina_actual = $pagina_actual; ?>


				<?php $categorias_productos->ver('backend', array( 'paginacion' => TRUE, 'id_proveedor' => $id_proveedor )); ?>
			
      <?php }else{
				$permisos->denegado();
			} ?>


<?php include('includes/admin-footer.php');  ?>