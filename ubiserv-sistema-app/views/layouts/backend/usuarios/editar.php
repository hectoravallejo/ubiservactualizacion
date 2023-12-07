      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <form action="<?= $this->path . '/admin/usuarios/editar/' . $this->usuario->id; ?>" method="POST" class="col-md-12 no-padding">

              <table class="tabla">
                <thead>
                  <tr>
                    <th colspan="2">Agregar usuario</th>
                  </tr>
                </thead>


                <tr>
                  <td class="etiqueta">Email</td>
                  <td><input class="input-tabla" type="email" value="<?= $this->usuario->email; ?>" name="email" required></td>
                </tr>

                <tr>
                  <td class="etiqueta">Tipo usuario</td>
                  <td>
                    <select name="tipo_usuario" class="input-tabla">
                      <option value="superadmin" <?= ($this->usuario->tipo_usuario == 'superadmin') ? 'selected' : ''; ?>>Administrador</option>
                      <option value="cliente" <?= ($this->usuario->tipo_usuario == 'cliente') ? 'selected' : ''; ?>>Cliente</option>
                    </select>
                  </td>
                </tr>


                <tr>
                  <td class="etiqueta">Contraseña</td>
                  <td>
                    <div class="mostrar-oculto">
                      <a href="#" class="btn btn-warning col-md-12 form-control">Cambiar</a>
                      <a href="#" class="icono-input"><i class="fa fa-close"></i></a>
                      <input type="password" name="clave" class="form-control col-md-12" required disabled>
                    </div>
                  </td>
                </tr>

                <?php if ($this->usuario->tipo_usuario == 'cliente') : ?>

                  <tr class="par" id="">
                    <td class="etiqueta">Anuncios asociados al cliente</td>
                    <td>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="agregar-anuncio">

                            <div class="col-md-4">
                              <select class="form-control" id="id_categoria">
                                <?php
                                $this->categorias->ver();
                                foreach ($this->categorias->categorias as $categoria) :
                                  $categoria = (object)$categoria;
                                ?>
                                  <option value="<?= $categoria->id; ?>"><?= $categoria->nombre; ?></option>
                                <?php endforeach; ?>

                              </select>
                            </div>
                            <div class="col-md-4">
                              <select class="form-control" id="id_proveedor">
                                <?php
                                $this->proveedores->ver(NULL, array('id_categoria' => $this->categorias->categorias[0]['id']));
                                foreach ($this->proveedores->proveedores as $proveedor) :
                                  $proveedor = (object)$proveedor;
                                ?>
                                  <option value="<?= $proveedor->id; ?>"><?= $proveedor->nombre; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <input type="hidden" value="<?= $data['id']; ?>" id="id_cliente">
                              <a href="#" id="boton-agregar-anuncio" class="btn btn-primary col-md-12">Agregar anuncios asociados <i class="fa fa-plus"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-ms-12">
                        <h3 class="text-center">Anuncios asociados</h3>
                      </div>

                      <div class="row anuncios-asociados">

                        <?php $this->anuncios->ver(NULL, array('id_cliente' => $data['id'])); ?>

                        <?php foreach ($this->anuncios->anuncios as $anuncio) : ?>
                          <?php $anuncio = (object)$anuncio; ?>

                          <div class="col-md-12">
                            <div class="col-md-4">


                              <?php
                              $this->categorias->ver();
                              foreach ($this->categorias->categorias as $categoria) :
                                $categoria = (object)$categoria;
                              ?>
                                <?= ($anuncio->id_categoria == $categoria->id) ? $categoria->nombre : ''; ?>
                              <?php endforeach; ?>

                            </div>
                            <div class="col-md-4">
                              <?php

                              $this->proveedores->ver(NULL, array('id_categoria' => $anuncio->id_categoria));

                              foreach ($this->proveedores->proveedores as $proveedor) :
                                $proveedor = (object)$proveedor;
                              ?>
                                <?= ($anuncio->id_proveedor == $proveedor->id) ? $proveedor->nombre : ''; ?>
                              <?php endforeach; ?>
                            </div>
                            <div class="col-md-4">
                              <a href="#" class="btn btn-danger eliminar-anuncio-asociado" data-id="<?= $anuncio->id; ?>"><i class="fa fa-times"></i></a>
                            </div>
                          </div>

                          <div class="clearfix"></div>
                          <hr>



                        <?php endforeach; ?>

                      </div>

                    </td>
                  </tr>

                <?php endif; ?>

              </table>


              <div class="col-md-6 pull-right">
                <button type="submit" class="btn-nuevo">Editar usuario</a>
              </div>

            </form>

          </div>
        </div>
      </div>


      <style>
        .agregar-anuncio {
          padding: 20px;
          background-color: #aaa;
          overflow: hidden;
          clear: both;
        }
      </style>

      <script>
        $(document).ready(function(x) {




          $('body').on('click', '#boton-agregar-anuncio', function(x) {
            x.preventDefault();

            id_categoria = $('#id_categoria option:selected').val();
            id_proveedor = $('#id_proveedor option:selected').val();
            id_cliente = $('#id_cliente').val();


            $.ajax({
                type: "POST",
                url: "<?= $this->path; ?>/admin/agregar-anuncio-asociado",
                data: {
                  "id_categoria": id_categoria,
                  "id_proveedor": id_proveedor,
                  "id_cliente": id_cliente,
                },
              })
              .done(function(data) {
                $('.anuncios-asociados').prepend(data);
              })
              .error(function(data) {
                //
              });



          })


          $('body').on('change', '#id_categoria', function(x) {
            x.preventDefault();

            url_select = "<?= $this->path; ?>/admin/select_proveedor_categoria/" + $('#id_categoria').val();

            $('#id_proveedor').load(url_select);

          })


          $('body').on('click', '.eliminar-anuncio-asociado', function(x) {
            x.preventDefault();

            id = $(this).data('id');

            elemento = $(this);

            elemento.parent().parent().css('display', 'none');


            $.ajax({
                type: "POST",
                url: "<?= $this->path; ?>/admin/eliminar-anuncio-asociado",
                data: {
                  "id": id,
                },
              })
              .done(function(data) {

              })
              .error(function(data) {
                //
              });

          })


        })
      </script>