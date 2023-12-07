      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <form action="<?= $this->path.'/admin/categorias/editar/'.$this->categoria->id; ?>" enctype="multipart/form-data" method="POST" class="col-md-12 no-padding">

              <table class="tabla">
                <thead>
                  <tr>
                    <th colspan="2">Agregar categoria</th>
                  </tr>
                </thead>

                <tr>
                    <td class="etiqueta">Categoría con menú de productos</td>
                    <td>
                      <div class="col-md-2">
                        <input type="radio" name="restaurante" value="0" <?= ($this->categoria->restaurante == 0)? 'checked' : ''; ?>> No
                      </div>
                      <div class="col-md-2">
                        <input type="radio" name="restaurante" value="1" <?= ($this->categoria->restaurante == 1)? 'checked' : ''; ?>> Sí
                      </div>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Nombre</td>
                    <td><input class="input-tabla" type="text" value="<?= $this->categoria->nombre; ?>" name="nombre" required></td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Orden</td>
                    <td><input type="number" class="input-tabla numeros" min="0" value="<?= $this->categoria->orden; ?>" name="orden" required></td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Imagen</td>
                    
                    <td>

                      <div class="col-md-6">
                        <input type="file" name="imagen[]">
                        <input type="hidden" name="imagen_actual" value="<?= $this->categoria->imagen; ?>">
                      </div>

                      <div class="col-md-6">

                        <div class="col-md-4 col-md-offset-4">
                          <img src="<?= $this->path.$this->ruta_imagen.$this->categoria->imagen; ?>" class="img-responsive">
                        </div>
                      
                      </div>

                    
                    </td>
                  </tr>


              </table>

              <div class="col-md-6 pull-right">
                <button type="submit" class="btn-nuevo">Editar categoria</a>              
              </div>

            </form>

          </div>
        </div>
      </div>


