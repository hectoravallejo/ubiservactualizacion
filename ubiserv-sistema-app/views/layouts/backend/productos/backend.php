      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <table class="tabla">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Orden</th>
                  <th>Precio</th>
                  <th>Imagen</th>
                  <th>Edición</th>
                </tr>
              </thead>


              <?php foreach ($this->productos as $i => $producto) { ?>

                <?php $producto = (object)$producto; ?>

                <tr <?= ($i % 2 != 0) ? 'class="par"' : ''; ?>>
                  <td><?= $producto->nombre; ?></td>
                  <td><?= $producto->orden; ?></td>
                  <td><?= moneda( $producto->precio ); ?></td>
                  <td><img src="<?= $this->path.$this->ruta_imagen.$producto->imagen; ?>" class="img-responsive" style="max-width: 100px"></td>
                  <td class="text-center">

                    <a href="<?= $this->path . '/admin/editar-producto/' . $data['id_proveedor'] . '/' . $data['id_categoria'] . '/' . $producto->id; ?>" class="btn-editar">Editar</a>

                    <form action="<?php echo $this->path; ?>/admin/eliminar-producto" method="POST" data-id="<?php echo $producto->id; ?>">
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

            <?php $this->paginacion->ver('paginacion', array('url' => '/admin/productos/', 'numero_registros' => $this->numero_productos, 'por_pagina' => $this->por_pagina)); ?>

            <div class="col-md-6">
              <a href="<?= $this->path; ?>/admin/nuevo-producto/<?= $data['id_proveedor']; ?>/<?= $data['id_categoria'] ?>" class="btn-nuevo">Nuevo producto</a>
            </div>

          </div>

        </div>
      </div>