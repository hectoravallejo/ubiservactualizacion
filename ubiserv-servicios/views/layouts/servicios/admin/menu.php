<?php include('includes/seguridad.php');
include('includes/header.php');  ?>

<div class="pagina-servicios-admin">


  <?php $categorias_productos->orden_categorias = ['nombre' => 'ASC']; ?>
  <?php $categorias_productos->ver(NULL, array('paginacion' => TRUE, 'id_proveedor' => $id)); ?>

  <div class="row">
    <div class="container">
      <div class="col-md-11 centrado">

        <a href="<?= $path; ?>/../servicios/admin/administracion" class="btn btn-danger"><i class="fa fa-angle-left"></i> Anuncios</a>
        <hr>

        <table class="tabla">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Imagen</th>
              <th>Orden</th>
              <th>Edición</th>
            </tr>
          </thead>


          <?php foreach ($categorias_productos->categorias as $i => $categoria) { ?>

            <?php $categoria = (object)$categoria; ?>

            <tr <?= ($i % 2 != 0) ? 'class="par"' : ''; ?>>
              <td><?= $categoria->nombre; ?></td>
              <td><img src="<?= $categorias_productos->path . $categorias_productos->ruta_imagen . $categoria->imagen ?>" style="max-width: 100px"></td>
              <td><?= $categoria->orden; ?></td>
              <td class="text-center">

                <a href="<?= $proveedores->path . '/../servicios/productos/' . $id . '/' . $categoria->id; ?>" class="btn btn-sm btn-warning">Productos</a>

                <a href="<?= $proveedores->path . '/../servicios/editar-categoria-producto/' . $id . '/' . $categoria->id; ?>" class="btn-editar">Editar</a>

                <form action="<?= $proveedores->path ?>/../servicios/eliminar-categoria-producto" method="POST" data-id="<?php echo $categoria->id; ?>">
                  <a href="#" class="btn-eliminar borrar">Eliminar <i class="fa fa-times"></i></a>
                </form>

              </td>
            </tr>

          <?php } ?>


        </table>


      </div>
    </div>
  </div>


  <div class="row">
    <div class="container">

      <div class="col-md-11 centrado no-padding">

        <div class="col-md-12">
          <a href="<?= $proveedores->path ?>/../servicios/nueva-categoria-producto/<?= $id; ?>" class="btn-nuevo">Nueva categoria</a>
        </div>

      </div>

    </div>
  </div>


</div>


<?php include('includes/footer.php');  ?>