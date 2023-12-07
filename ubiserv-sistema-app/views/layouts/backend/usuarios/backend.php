      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <table class="tabla">
              <thead>
                <tr>
                  <th>Correo</th>
                  <th>Edición</th>
                </tr>
              </thead>

              <?php foreach ($this->usuarios as $i => $usuario) { ?>
  
                <?php $usuario = (object)$usuario; ?>

                <tr <?= ($i%2 != 0)? 'class="par"' : ''; ?>>
                  <td><?= $usuario->email; ?></td>
                  <td class="text-center">
                    <a href="<?= $this->path.'/admin/editar-usuario/'.$usuario->id; ?>" class="btn-editar">Editar</a>

                    <?php if($usuario->id != $_COOKIE["id"]): ?>

                      <form action="<?php echo $this->path; ?>/admin/eliminar-usuario" method="POST" data-id="<?php echo $usuario->id; ?>">
                        <a href="#" class="btn-eliminar borrar">Eliminar <i class="fa fa-times"></i></a>
                      </form>


                    <?php endif; ?>

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
            
            <?php $this->paginacion->ver( 'paginacion', array( 'url' => '/admin/usuarios/', 'numero_registros' => $this->numero_usuarios, 'por_pagina' => $this->por_pagina )); ?>

            <div class="col-md-6">
              <a href="<?= $this->path; ?>/admin/nuevo-usuario" class="btn-nuevo">Nuevo usuario</a>
            </div>

          </div>

        </div>
      </div>