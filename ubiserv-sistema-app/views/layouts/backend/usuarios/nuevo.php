      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <form action="<?php echo $this->path; ?>/admin/usuarios/nuevo" method="POST" class="col-md-12 no-padding">

              <table class="tabla">
                <thead>
                  <tr>
                    <th colspan="2">Agregar usuario</th>
                  </tr>
                </thead>

                <tr>
                  <td class="etiqueta">Email</td>
                  <td><input class="input-tabla" type="email" name="email" required></td>
                </tr>


                <tr class="par">
                  <td class="etiqueta">Tipo usuario</td>
                  <td>
                    <select name="tipo_usuario" class="input-tabla" id="select_tipo_usuario">
                      <option value="superadmin" selected>Administrador</option>
                      <option value="cliente">Cliente</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <td class="etiqueta">Contraseña</td>
                  <td><input type="password" name="clave" class="input-tabla" required></td>
                </tr>


                </tr>


              </table>

              <div class="col-md-6 pull-right">
                <button type="submit" class="btn-nuevo">Agregar</a>
              </div>

            </form>

          </div>
        </div>
      </div>