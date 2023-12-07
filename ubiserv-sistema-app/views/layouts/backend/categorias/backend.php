      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <table class="tabla">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Orden</th>
                  <th>Edición</th>
                </tr>
              </thead>

                <?php foreach ($this->categorias as $i => $categoria) { ?>
    
                  <?php $categoria = (object)$categoria; ?>

                  <tr <?= ($i%2 != 0)? 'class="par"' : ''; ?>>
                    <td><?= $categoria->nombre; ?></td>
                    <td><?= $categoria->orden; ?></td>
                    <td class="text-center">
                      <a href="<?= $this->path.'/admin/editar-categoria/'.$categoria->id; ?>" class="btn-editar">Editar</a>

                        <form action="<?php echo $this->path; ?>/admin/eliminar-categoria" method="POST" data-id="<?php echo $categoria->id; ?>">
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
            
            <?php $this->paginacion->ver( 'paginacion', array( 'url' => '/admin/categorias/', 'numero_registros' => $this->numero_categorias, 'por_pagina' => $this->por_pagina )); ?>

            <div class="col-md-6">
              <a href="<?= $this->path; ?>/admin/nueva-categoria" class="btn-nuevo">Nueva categoria</a>
            </div>

          </div>

        </div>
      </div>