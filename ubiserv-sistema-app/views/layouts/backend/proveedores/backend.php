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

        <?php foreach ($this->proveedores as $i => $proveedor) { ?>

          <?php $proveedor = (object)$proveedor; ?>

          <tr <?= ($i % 2 != 0) ? 'class="par"' : ''; ?>>
            <td><?= $proveedor->nombre; ?></td>
            <td class="text-center">
              <?php $this->categorias->ver_categoria($proveedor->id_categoria); ?>
              <?php if ($this->categorias->categoria_actual->restaurante == 1) : ?>
                <a href="<?= $this->path; ?>/admin/categorias-productos/<?= $proveedor->id; ?>" class="btn btn-success">Menú de productos</a>
              <?php endif; ?>

              <a href="<?= $this->path . '/admin/editar-proveedor/' . $proveedor->id; ?>" class="btn-editar">Editar</a>

              <form action="<?php echo $this->path; ?>/admin/eliminar-proveedor" method="POST" data-id="<?php echo $proveedor->id; ?>">
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

      <?php

        if(isset($data['id_categoria'])){
          $url_paginacion = '/admin/proveedores-categoria/'.$data['id_categoria'].'/';
        }elseif(isset($data['aprobar_anuncios'])){
          $url_paginacion = '/admin/autorizar-anuncios/';
        }else{
          $url_paginacion = '/admin/proveedores/';
        }

        $this->paginacion->ver('paginacion', array(

          'url' => $url_paginacion,
          'numero_registros' => $this->numero_proveedores,
          'por_pagina' => $this->por_pagina

        ));

      ?>

      <div class="col-md-6">
        <a href="<?= $this->path; ?>/admin/nuevo-proveedor" class="btn-nuevo">Nuevo proveedor</a>
      </div>

    </div>

  </div>
</div>