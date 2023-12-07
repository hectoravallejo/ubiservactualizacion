<?php

$this->qr->text('https://ubi-serv.com/servicios/restaurantes/' . $this->proveedor->slug);
$this->qr->qrCode(250, $this->serverpath . '/Images/codigos/' . $this->proveedor->id . '.png');

$this->qr->text('https://ubi-serv.com/servicios/folleto/' . $this->proveedor->slug);
$this->qr->qrCode(250, $this->serverpath . '/Images/codigos/folleto-' . $this->proveedor->id . '.png');

?>

<div class="row">
  <div class="container">
    <div class="col-md-11 centrado">

      <form action="<?= $this->path . '/admin/proveedores/editar/' . $this->proveedor->id; ?>" enctype="multipart/form-data" method="POST" class="col-md-12 no-padding">

        <table class="tabla">
          <thead>
            <tr>
              <th colspan="2">Agregar proveedor</th>
            </tr>
          </thead>


          <tr>
            <td class="etiqueta">Categoría</td>
            <td>
              <select name="id_categoria" class="form-control">
                <?php $this->categorias->ver(); ?>
                <?php foreach ($this->categorias->categorias as $i => $categoria) {
                  $categoria = (object)$categoria;
                ?>
                  <option value="<?= $categoria->id; ?>" <?= ($this->proveedor->id_categoria == $categoria->id) ? 'selected' : ''; ?>><?= $categoria->nombre; ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>


          <tr class="par">
            <td class="etiqueta">Anuncio activo</td>
            <td>

              <div class="col-md-2">
                <input type="radio" name="activo" value="0" <?= ($this->proveedor->activo == 0) ? 'checked' : ''; ?>> No
              </div>

              <div class="col-md-2">
                <input type="radio" name="activo" value="1" <?= ($this->proveedor->activo == 1) ? 'checked' : ''; ?>> Sí
              </div>

            </td>
          </tr>

          <tr>
            <td class="etiqueta">Nombre</td>
            <td><input class="input-tabla" type="text" name="nombre" value="<?= $this->proveedor->nombre; ?>" required></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Vínculo</td>
            <td>
              <div class="col-md-9">
                <input class="input-tabla" type="text" name="slug" value="<?= $this->proveedor->slug; ?>" required>
              </div>

              <?php if ($this->proveedor->id_categoria == 32) : ?>
                <div class="col-md-3">


                  <a href="<?= $this->path . '/Images/codigos/' . $this->proveedor->id . '.png'; ?>" class="btn btn-success col-md-12 text-center" download="qr-<?= $this->proveedor->slug; ?>">Descargar qr</a>


                </div>

              <?php endif; ?>
            </td>
          </tr>

          <tr>
            <td class="etiqueta">Folleto</td>

            <td>

              <div class="col-md-6">
                <input type="file" name="imagen_menu[]">
                <input type="hidden" name="imagen_menu_actual" value="<?= $this->proveedor->imagen_menu; ?>">
              </div>

              <div class="col-md-6">

                <div class="col-md-4 col-md-offset-4">
                  <?php if ($this->proveedor->imagen_menu != '') : ?>
                    <img src="<?= $this->path . $this->ruta_imagen . $this->proveedor->imagen_menu; ?>" class="img-responsive">
                    <div class="clearfix"></div>
                  <?php endif; ?>
                </div>

                <div class="clearfix"></div><br>

                <a href="<?= $this->path . '/Images/codigos/folleto-' . $this->proveedor->id . '.png'; ?>" class="btn btn-success col-md-12 text-center" download="qr-folleto-<?= $this->proveedor->slug; ?>">Descargar qr de folleto</a>

              </div>


            </td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Imagen</td>

            <td>

              <div class="col-md-6">
                <input type="file" name="imagen[]">
                <input type="hidden" name="imagen_actual" value="<?= $this->proveedor->imagen; ?>">
              </div>

              <div class="col-md-6">

                <div class="col-md-4 col-md-offset-4">
                  <?php if ($this->proveedor->imagen != '') : ?>
                    <img src="<?= $this->path . $this->ruta_imagen . $this->proveedor->imagen; ?>" class="img-responsive">
                  <?php endif; ?>
                </div>

              </div>


            </td>
          </tr>

          <tr>
            <td class="etiqueta">Domicilio</td>
            <td><input class="input-tabla" type="text" name="domicilio" value="<?= $this->proveedor->domicilio; ?>" required></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Colonia</td>
            <td><input class="input-tabla" type="text" name="colonia" value="<?= $this->proveedor->colonia; ?>" required></td>
          </tr>

          <tr>
            <td class="etiqueta">Estado</td>
            <td><input class="input-tabla" type="text" name="estado" value="<?= $this->proveedor->estado; ?>" required></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Telefono</td>
            <td><input class="input-tabla" type="text" name="telefono" value="<?= $this->proveedor->telefono; ?>" required></td>
          </tr>

          <tr>
            <td class="etiqueta">WhatsApp</td>
            <td><input class="input-tabla" type="text" name="whatsapp" value="<?= $this->proveedor->whatsapp; ?>" required></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Whatsapp</td>
            <td>
              <div class="col-md-2">
                <input class="input-tabla" type="text" placeholder="Lada" value="<?= $this->proveedor->lada_whatsapp; ?>" name="lada_whatsapp" required>
              </div>
              <div class="col-md-10">
                <input class="input-tabla" type="text" placeholder="WhatsApp" value="<?= $this->proveedor->whatsapp; ?>" name="whatsapp" required>
              </div>
            </td>
          </tr>

          <tr>
            <td class="etiqueta">Pagina web</td>
            <td><input class="input-tabla" type="text" name="pagina" value="<?= $this->proveedor->pagina; ?>" required></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Descripción</td>
            <td><textarea name="descripcion" class="form-control editor"><?= $this->proveedor->descripcion; ?></textarea></td>
          </tr>

          <tr>
            <td class="etiqueta">Latitud</td>
            <td><input class="input-tabla" type="text" name="latitud" value="<?= $this->proveedor->latitud; ?>" required></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Longitud</td>
            <td><input class="input-tabla" type="text" name="longitud" value="<?= $this->proveedor->longitud; ?>" required></td>
          </tr>

          <tr>
            <td class="etiqueta">Mostrar en todas partes</td>
            <td>

              <div class="col-md-2">
                <input type="radio" name="mostrar" value="0" <?= ($this->proveedor->mostrar == 0) ? 'checked' : ''; ?>> No
              </div>

              <div class="col-md-2">
                <input type="radio" name="mostrar" value="1" <?= ($this->proveedor->mostrar == 1) ? 'checked' : ''; ?>> Sí
              </div>

            </td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Youtube</td>
            <td><input class="input-tabla" type="text" name="youtube" value="<?= $this->proveedor->youtube; ?>"></td>
          </tr>

          <tr>
            <td class="etiqueta">Tik Tok</td>
            <td><input class="input-tabla" type="text" name="tiktok" value="<?= $this->proveedor->tiktok; ?>"></td>
          </tr>

          <tr class="par">
            <td class="etiqueta">Facebook</td>
            <td><input class="input-tabla" type="text" name="facebook" value="<?= $this->proveedor->facebook; ?>"></td>
          </tr>

          <tr>
            <td class="etiqueta">Instagram</td>
            <td><input class="input-tabla" type="text" name="instagram" value="<?= $this->proveedor->instagram; ?>"></td>
          </tr>


          <tr class="par">
            <td class="etiqueta">Horario</td>
            <td>
              <table style="width: 100%">
                <tr style="background-color: #ccc;">
                  <td>Día</td>
                  <td>Hora</td>
                </tr>
                <tr>
                  <td>
                    <ul class="list-group dias">
                      <li class="list-group-item">
                        <input type="checkbox" name="lunes" <?= ($this->horario_proveedor->lunes == "1") ? 'checked' : ''; ?>> Lunes
                      </li>
                      <li class="list-group-item">
                        <input type="checkbox" name="martes" <?= ($this->horario_proveedor->martes == "1") ? 'checked' : ''; ?>> Martes
                      </li>
                      <li class="list-group-item">
                        <input type="checkbox" name="miercoles" <?= ($this->horario_proveedor->miercoles == "1") ? 'checked' : ''; ?>> Miercoles
                      </li>
                      <li class="list-group-item">
                        <input type="checkbox" name="jueves" <?= ($this->horario_proveedor->jueves == "1") ? 'checked' : ''; ?>> Jueves
                      </li>
                      <li class="list-group-item">
                        <input type="checkbox" name="viernes" <?= ($this->horario_proveedor->viernes == "1") ? 'checked' : ''; ?>> Viernes
                      </li>
                      <li class="list-group-item">
                        <input type="checkbox" name="sabado" <?= ($this->horario_proveedor->sabado == "1") ? 'checked' : ''; ?>> Sábado
                      </li>
                      <li class="list-group-item">
                        <input type="checkbox" name="domingo" <?= ($this->horario_proveedor->domingo == "1") ? 'checked' : ''; ?>> Domingo
                      </li>
                    </ul>
                  </td>
                  <td>
                    <div class="col-md-6">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_lunes; ?>" name="desde_lunes" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_martes; ?>" name="desde_martes" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_miercoles; ?>" name="desde_miercoles" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_jueves; ?>" name="desde_jueves" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_viernes; ?>" name="desde_viernes" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_sabado; ?>" name="desde_sabado" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $this->horario_proveedor->desde_domingo; ?>" name="desde_domingo" onkeydown="return false">
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_lunes; ?>" name="hasta_lunes" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_martes; ?>" name="hasta_martes" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_miercoles; ?>" name="hasta_miercoles" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_jueves; ?>" name="hasta_jueves" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_viernes; ?>" name="hasta_viernes" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_sabado; ?>" name="hasta_sabado" onkeydown="return false">
                        </li>
                        <li class="list-group-item">
                          <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $this->horario_proveedor->hasta_domingo; ?>" name="hasta_domingo" onkeydown="return false">
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>


        </table>

        <div class="col-md-6 pull-right">
          <button type="submit" class="btn-nuevo">Editar proveedor</a>
        </div>

      </form>

    </div>
  </div>
</div>