      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <form action="<?= $this->path.'/admin/editar-imagendestacada'; ?>" enctype="multipart/form-data" method="POST" class="col-md-12 no-padding">

              <table class="tabla">
                <thead>
                  <tr>
                    <th colspan="2">Editar imagen destacada</th>
                  </tr>
                </thead>


                  <tr>
                    <td class="etiqueta">Vínculo</td>
                    <td>
                      <input class="input-tabla" type="text" value="<?= $this->imagendestacada->url; ?>" name="url" required>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Imagen</td>
                    
                    <td>

                      <div class="col-md-6">
                        <input type="file" name="imagen[]">
                        <input type="hidden" name="imagen_actual" value="<?= $this->imagendestacada->imagen; ?>">
                      </div>

                      <div class="col-md-6">

                        <div class="col-md-4 col-md-offset-4">
                          <img src="<?= $this->path.$this->ruta_imagen.$this->imagendestacada->imagen; ?>" class="img-responsive">
                        </div>
                      
                      </div>

                    
                    </td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Vínculo 2</td>
                    <td>
                      <input class="input-tabla" type="text" value="<?= $this->imagendestacada->url2; ?>" name="url2" required>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Imagen 2</td>
                    
                    <td>

                      <div class="col-md-6">
                        <input type="file" name="imagen2[]">
                        <input type="hidden" name="imagen2_actual" value="<?= $this->imagendestacada->imagen2; ?>">
                      </div>

                      <div class="col-md-6">

                        <div class="col-md-4 col-md-offset-4">
                          <img src="<?= $this->path.$this->ruta_imagen.$this->imagendestacada->imagen2; ?>" class="img-responsive">
                        </div>
                      
                      </div>

                    
                    </td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Vínculo 3</td>
                    <td>
                      <input class="input-tabla" type="text" value="<?= $this->imagendestacada->url3; ?>" name="url3" required>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Imagen 3</td>
                    
                    <td>

                      <div class="col-md-6">
                        <input type="file" name="imagen3[]">
                        <input type="hidden" name="imagen3_actual" value="<?= $this->imagendestacada->imagen3; ?>">
                      </div>

                      <div class="col-md-6">

                        <div class="col-md-4 col-md-offset-4">
                          <img src="<?= $this->path.$this->ruta_imagen.$this->imagendestacada->imagen3; ?>" class="img-responsive">
                        </div>
                      
                      </div>

                    
                    </td>
                  </tr>


              </table>

              <div class="col-md-6 pull-right">
                <button type="submit" class="btn-nuevo">Editar imagenes destacada</a>              
              </div>

            </form>

          </div>
        </div>
      </div>


