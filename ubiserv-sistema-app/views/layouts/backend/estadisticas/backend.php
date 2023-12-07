      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">


            <div class="col-md-8 centrado">

              <br><br>

              <?php 
                (!isset($data['fecha_desde'])) ?  
                  $fecha_desde = date('Y-m-d', time()) : 
                  $fecha_desde = $data['fecha_desde']; 
              ?>

              <?php 
                (!isset($data['fecha_hasta'])) ?  
                  $fecha_hasta = date('Y-m-d', time()) : 
                  $fecha_hasta = $data['fecha_hasta']; 
              ?>


              <div class="col-md-6">
                <label for="">Desde</label>
                <input type="text" class="form-control fecha" name="fecha_desde" value="<?= $fecha_desde; ?>" id="fecha_desde" placeholder="Fecha desde">
              </div>

              <div class="col-md-6">
                <label for="">Hasta</label>
                <input type="text" class="form-control fecha" name="fecha_hasta" value="<?= $fecha_hasta; ?>" id="fecha_hasta" placeholder="Fecha hasta">
              </div>

              <div class="col-md-4 hidden">
                &nbsp;<br>
                <button class="btn-nuevo" id="filtrar" data-url="https://ubi-serv.com/ubiserv-sistema-app/admin/estadisticas/">Filtrar</button>
              </div>

              <script>
                $(document).ready(function() {
                  $('body').on('change', '#fecha_desde, #fecha_hasta', function() {
                    window.location.replace($('#filtrar').data('url') + $('#fecha_desde').val() + '/' + $('#fecha_hasta').val());
                  })
                })
              </script>


              <div class="clearfix"></div>
              <br><br>


            </div>

            <table class="tabla">
              <thead>
                <tr>
                  <th colspan="2">Vísitas por categoria</th>
                </tr>
              </thead>

              <tr>
                <td colspan="2">
                  <ul class="estadisticas">
                    <?php $this->ver_estadisticas_categorias($fecha_desde, $fecha_hasta); ?>
                    <?php foreach ($this->estadisticas_categorias as $i2 => $estadistica) { ?>

                      <?php $estadistica = (object)$estadistica; ?>

                      <li <?= ($i2 % 2 != 0) ? 'style="background-color: #eee; display: block; overflow: hidden; clear: both"' : ''; ?>>
                        <div class="col-md-7">
                          <?php 
                            $this->categorias->ver_categoria($estadistica->id_categoria);
                            echo $this->categorias->categoria_actual->nombre; 
                          ?>
                          </div>
                          <div class="col-md-5">
                          <?= $estadistica->visitas; ?>
                        </div>
                      </li>

                    <?php } ?>
                  </ul>

                </td>
              </tr>

              <thead>
                <tr>
                  <th colspan="2">Vísitas por proveedor</th>
                </tr>
              </thead>

              <tr>
                <td colspan="2">
                  <ul class="estadisticas">
                    <?php $this->ver_estadisticas_proveedores($fecha_desde, $fecha_hasta); ?>
                    <?php foreach ($this->estadisticas_proveedores as $i3 => $estadistica) { ?>

                      <?php $estadistica = (object)$estadistica; ?>

                      <li <?= ($i3 % 2 != 0) ? 'style="background-color: #eee; display: block; overflow: hidden; clear: both"' : ''; ?>>
                        <div class="col-md-7">
                          <?php 
                            $this->proveedores->ver_proveedor($estadistica->id_proveedor);
                            echo $this->proveedores->proveedor_actual->nombre; 
                          ?>
                        </div>
                        <div class="col-md-5">
                          <?= $estadistica->visitas; ?>
                        </div>
                      </li>

                    <?php } ?>
                  </ul>

                </td>
              </tr>


            </table>


          </div>
        </div>
      </div>


      <div class="row">
        <div class="container">

          <div class="col-md-11 centrado no-padding">

            <div class="col-md-6"></div>

            <div class="col-md-6">
              <!-- <a href="<?= $this->path; ?>/admin/nueva-categoria" class="btn-nuevo">Descargar</a> -->
            </div>

          </div>

        </div>
      </div>