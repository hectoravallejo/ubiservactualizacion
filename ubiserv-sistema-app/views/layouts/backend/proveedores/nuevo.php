      <div class="row">
        <div class="container">
          <div class="col-md-11 centrado">

            <form action="<?php echo $this->path; ?>/admin/proveedores/nuevo" method="POST" enctype="multipart/form-data" class="col-md-12 no-padding">

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
                          <option value="<?= $categoria->id; ?>"><?= $categoria->nombre; ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Anuncio activo</td>
                    <td>

                      <div class="col-md-2">
                        <input type="radio" name="activo" value="0"> No
                      </div>

                      <div class="col-md-2">
                        <input type="radio" name="activo" value="1" checked> Sí
                      </div>

                    </td>
                  </tr>
                  
                  <tr>
                    <td class="etiqueta">Nombre</td>
                    <td><input class="input-tabla" type="text" name="nombre" required></td>
                  </tr>


                  <tr class="par">
                    <td class="etiqueta">Vínculo</td>
                    <td><input class="input-tabla" type="text" name="slug" required></td>
                  </tr>


                  <tr>
                    <td class="etiqueta">Folleto</td>
                    <td>

                      <div class="col-md-6">
                        <input type="file" name="imagen_menu[]">
                      </div>

                      <div class="col-md-6">
                      
                      </div>

                    
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

                  <tr>
                    <td class="etiqueta">Domicilio</td>
                    <td><input class="input-tabla" type="text" name="domicilio" required></td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Colonia</td>
                    <td><input class="input-tabla" type="text" name="colonia" required></td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Estado</td>
                    <td><input class="input-tabla" type="text" name="estado" required></td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Teléfono</td>
                    <td><input class="input-tabla" type="text" name="telefono" required></td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Whatsapp</td>
                    <td>
                      <div class="col-md-2">
                        <input class="input-tabla" type="text" placeholder="Lada" name="lada_whatsapp" required>
                      </div>
                      <div class="col-md-10">
                        <input class="input-tabla" type="text" placeholder="WhatsApp" name="whatsapp" required>
                      </div>
                    </td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Página</td>
                    <td><input class="input-tabla" type="text" name="pagina" required></td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Descripción</td>
                    <td><textarea name="descripcion" class="form-control editor"></textarea></td>
                  </tr>
                  
                  <tr class="par">
                    <td class="etiqueta">Latitud</td>
                    <td><input class="input-tabla" type="text" name="latitud" required></td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Longitud</td>
                    <td><input class="input-tabla" type="text" name="longitud" required></td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Mostrar en todas partes</td>
                    <td>
                      <div class="col-md-2">
                        <input type="radio" name="mostrar" value="0" checked=""> No
                      </div>

                      <div class="col-md-2">
                        <input type="radio" name="mostrar" value="1" checked=""> Sí
                      </div>                    
                    </td>
                  </tr>

                  <tr>
                    <td class="etiqueta">Youtube</td>
                    <td><input class="input-tabla" type="text" name="youtube"></td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Tik Tok</td>
                    <td><input class="input-tabla" type="text" name="tiktok"></td>
                  </tr>


                  <tr>
                    <td class="etiqueta">Facebook</td>
                    <td><input class="input-tabla" type="text" name="facebook"></td>
                  </tr>

                  <tr class="par">
                    <td class="etiqueta">Instagram</td>
                    <td><input class="input-tabla" type="text" name="instagram"></td>
                  </tr>


                  <tr>
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
                              <input type="checkbox" name="lunes"> Lunes
                              </li>
                            <li class="list-group-item">
                              <input type="checkbox" name="martes"> Martes
                              </li>
                            <li class="list-group-item">
                              <input type="checkbox" name="miercoles"> Miercoles
                              </li>
                            <li class="list-group-item">
                              <input type="checkbox" name="jueves"> Jueves
                              </li>
                            <li class="list-group-item">
                              <input type="checkbox" name="viernes"> Viernes
                              </li>
                            <li class="list-group-item">
                              <input type="checkbox" name="sabado"> Sábado
                              </li>
                            <li class="list-group-item">
                              <input type="checkbox" name="domingo"> Domingo
                              </li>
                          </ul>
                        </td>
                        <td>
                          <div class="col-md-6">
                            <ul class="list-group">
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_lunes" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_martes" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_miercoles" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_jueves" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_viernes" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_sabado" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Desde" class="form-control input-sm hora" name="desde_domingo" onkeydown="return false">
                              </li>
                            </ul>
                          </div>
                          <div class="col-md-6">
                          <ul class="list-group">
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_lunes" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_martes" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_miercoles" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_jueves" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_viernes" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_sabado" onkeydown="return false">
                              </li>
                              <li class="list-group-item">
                                <input type="text" placeholder="Hasta" class="form-control input-sm hora" name="hasta_domingo" onkeydown="return false">
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
                <button type="submit" class="btn-nuevo">Agregar</a>              
              </div>

            </form>

          </div>
        </div>
      </div>


