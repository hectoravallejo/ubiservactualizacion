      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <form action="<?php echo $this->path; ?>/admin/categorias-productos/nueva" method="POST" enctype="multipart/form-data" class="col-md-12 no-padding">

              <table class="tabla">
                <thead>
                  <tr>
                    <th colspan="2">Agregar usuario</th>
                  </tr>
                </thead>

                  <tr>
                    <td class="etiqueta">Nombre</td>
                    <td>
                      <input type="hidden" name="id_proveedor" value="<?= $data['id_proveedor']; ?>">
                      <input class="input-tabla" type="text" name="nombre" required>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Imagen</td>
                    <td>

                      <div class="col-md-6">
                        <input type="file" name="imagen[]">
                      </div>

                      <div class="col-md-6">
                      
                      </div>

                    
                    </td>
                  </tr>

              </table>

              <div class="col-md-6 pull-right">
                <button type="submit" class="btn-nuevo">Agregar</a>              
              </div>

            </form>

          </div>
        </div>
      </div>


