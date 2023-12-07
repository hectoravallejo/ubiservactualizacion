<?php include('includes/seguridad.php'); 
include('includes/header.php');  ?>

<?php

if (isset($mensaje)) {
    if ($mensaje == 'error') { ?>
        <script>
            alert('Usuario o contraseña incorrectos');
        </script>
<?php }
}

?>


<div class="login-restaurante">

    <div class="container">

        <div class="col-md-10 col-md-offset-1">
            <?php if ($permisos->tipo_usuario != 'cliente') : ?>
                <h2>Debes ser un cliente registrado para poder ver esta sección</h2>
            <?php else : ?>


                <?php $proveedores->ver(NULL, array('id' => $id) ); ?>

                <?php

                $proveedores->qr->text($path.'/../servicios/restaurantes/' . $proveedores->proveedor->slug);
                $proveedores->qr->qrCode(250, $serverpath . '/../ubiserv-sistema-app/Images/codigos/' . $proveedores->proveedor->id . '.png');

                $proveedores->qr->text($path.'/../ubiserv-sistema-app/imagenes/proveedores/'.$proveedores->proveedor->slug.'.pdf');
                $proveedores->qr->qrCode(250, $serverpath . '/../ubiserv-sistema-app/Images/codigos/folleto-' . $proveedores->proveedor->id . '.png');

                ?>

                <div class="row">
                    <div class="container">
                        <div class="col-md-11 centrado">

                            <a href="<?= $path; ?>/../servicios/admin/administracion" class="btn btn-danger"><i class="fa fa-angle-left"></i> Anuncios</a>
                            <hr>

                            <form action="<?= $path; ?>/../servicios/proveedores/editar/<?= $proveedores->proveedor->id; ?>" enctype="multipart/form-data" method="POST" class="col-md-12 no-padding">

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
                                                <?php $categorias->ver(); ?>
                                                <?php foreach ($categorias->categorias as $i => $categoria) {
                                                    $categoria = (object)$categoria;
                                                ?>
                                                    <option value="<?= $categoria->id; ?>" <?= ($proveedores->proveedor->id_categoria == $categoria->id) ? 'selected' : ''; ?>><?= $categoria->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>


                                    <tr class="par">
                                        <td class="etiqueta">Anuncio activo</td>
                                        <td>

                                            <div class="col-md-2">
                                                <input type="radio" name="activo" value="0" <?= ($proveedores->proveedor->activo == 0) ? 'checked' : ''; ?>> No
                                            </div>

                                            <div class="col-md-2">
                                                <input type="radio" name="activo" value="1" <?= ($proveedores->proveedor->activo == 1) ? 'checked' : ''; ?>> Sí
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Nombre</td>
                                        <td><input class="input-tabla" type="text" name="nombre" value="<?= $proveedores->proveedor->nombre; ?>" required></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Vínculo</td>
                                        <td>
                                            <div class="col-md-9">
                                                <input class="input-tabla" type="text" name="slug" value="<?= $proveedores->proveedor->slug; ?>" required>
                                            </div>

                                            <?php if ($proveedores->proveedor->id_categoria == 32) : ?>
                                                <div class="col-md-3">


                                                    <a href="<?= $path .'/../ubiserv-sistema-app' . '/Images/codigos/' . $proveedores->proveedor->id . '.png'; ?>" class="btn btn-success col-md-12 text-center" download="qr-<?= $proveedores->proveedor->slug; ?>">Descargar qr</a>


                                                </div>

                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Folleto</td>

                                        <td>

                                            <div class="col-md-6">
                                                <input type="file" name="imagen_menu[]">
                                                <input type="hidden" name="imagen_menu_actual" value="<?= $proveedores->proveedor->imagen_menu; ?>">
                                            </div>

                                            <div class="col-md-6">

                                                <div class="col-md-4 col-md-offset-4">
                                                    <a href="<?= $path .'/../ubiserv-sistema-app'. $proveedores->ruta_imagen . $proveedores->proveedor->imagen_menu; ?>" target="_blank">PDF folleto</a>
                                                    <?php if ($proveedores->proveedor->imagen_menu != '') : ?>
                                                        <!-- <img src="<?= $path .'/../ubiserv-sistema-app'. $proveedores->ruta_imagen . $proveedores->proveedor->imagen_menu; ?>" class="img-responsive"> -->
                                                        <div class="clearfix"></div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="clearfix"></div><br>

                                                <a href="<?= $path .'/../ubiserv-sistema-app' . '/Images/codigos/folleto-' . $proveedores->proveedor->id . '.png'; ?>" class="btn btn-success col-md-12 text-center" download="qr-folleto-<?= $proveedores->proveedor->slug; ?>">Descargar qr de folleto</a>

                                            </div>


                                        </td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Imagen</td>

                                        <td>

                                            <div class="col-md-6">
                                                <input type="file" name="imagen[]">
                                                <input type="hidden" name="imagen_actual" value="<?= $proveedores->proveedor->imagen; ?>">
                                            </div>

                                            <div class="col-md-6">

                                                <div class="col-md-4 col-md-offset-4">
                                                    <?php if ($proveedores->proveedor->imagen != '') : ?>
                                                        <img src="<?= $path .'/../ubiserv-sistema-app'. $proveedores->ruta_imagen . $proveedores->proveedor->imagen; ?>" class="img-responsive">
                                                    <?php endif; ?>
                                                </div>

                                            </div>


                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Domicilio</td>
                                        <td><input class="input-tabla" type="text" name="domicilio" value="<?= $proveedores->proveedor->domicilio; ?>" required></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Colonia</td>
                                        <td><input class="input-tabla" type="text" name="colonia" value="<?= $proveedores->proveedor->colonia; ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Estado</td>
                                        <td><input class="input-tabla" type="text" name="estado" value="<?= $proveedores->proveedor->estado; ?>" required></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Telefono</td>
                                        <td><input class="input-tabla" type="text" name="telefono" value="<?= $proveedores->proveedor->telefono; ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">WhatsApp</td>
                                        <td><input class="input-tabla" type="text" name="whatsapp" value="<?= $proveedores->proveedor->whatsapp; ?>" required></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Whatsapp</td>
                                        <td>
                                            <div class="col-md-2">
                                                <input class="input-tabla" type="text" placeholder="Lada" value="<?= $proveedores->proveedor->lada_whatsapp; ?>" name="lada_whatsapp" required>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="input-tabla" type="text" placeholder="WhatsApp" value="<?= $proveedores->proveedor->whatsapp; ?>" name="whatsapp" required>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Pagina web</td>
                                        <td><input class="input-tabla" type="text" name="pagina" value="<?= $proveedores->proveedor->pagina; ?>" required></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Descripción</td>
                                        <td><textarea name="descripcion" class="form-control editor"><?= $proveedores->proveedor->descripcion; ?></textarea></td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Latitud</td>
                                        <td><input class="input-tabla" type="text" name="latitud" value="<?= $proveedores->proveedor->latitud; ?>" required></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Longitud</td>
                                        <td><input class="input-tabla" type="text" name="longitud" value="<?= $proveedores->proveedor->longitud; ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Mostrar en todas partes</td>
                                        <td>

                                            <div class="col-md-2">
                                                <input type="radio" name="mostrar" value="0" <?= ($proveedores->proveedor->mostrar == 0) ? 'checked' : ''; ?>> No
                                            </div>

                                            <div class="col-md-2">
                                                <input type="radio" name="mostrar" value="1" <?= ($proveedores->proveedor->mostrar == 1) ? 'checked' : ''; ?>> Sí
                                            </div>

                                        </td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Youtube</td>
                                        <td><input class="input-tabla" type="text" name="youtube" value="<?= $proveedores->proveedor->youtube; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Tik Tok</td>
                                        <td><input class="input-tabla" type="text" name="tiktok" value="<?= $proveedores->proveedor->tiktok; ?>"></td>
                                    </tr>

                                    <tr class="par">
                                        <td class="etiqueta">Facebook</td>
                                        <td><input class="input-tabla" type="text" name="facebook" value="<?= $proveedores->proveedor->facebook; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="etiqueta">Instagram</td>
                                        <td><input class="input-tabla" type="text" name="instagram" value="<?= $proveedores->proveedor->instagram; ?>"></td>
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
                                                                <input type="checkbox" name="lunes" <?= ($proveedores->horario_proveedor->lunes == "1") ? 'checked' : ''; ?>> Lunes
                                                            </li>
                                                            <li class="list-group-item">
                                                                <input type="checkbox" name="martes" <?= ($proveedores->horario_proveedor->martes == "1") ? 'checked' : ''; ?>> Martes
                                                            </li>
                                                            <li class="list-group-item">
                                                                <input type="checkbox" name="miercoles" <?= ($proveedores->horario_proveedor->miercoles == "1") ? 'checked' : ''; ?>> Miercoles
                                                            </li>
                                                            <li class="list-group-item">
                                                                <input type="checkbox" name="jueves" <?= ($proveedores->horario_proveedor->jueves == "1") ? 'checked' : ''; ?>> Jueves
                                                            </li>
                                                            <li class="list-group-item">
                                                                <input type="checkbox" name="viernes" <?= ($proveedores->horario_proveedor->viernes == "1") ? 'checked' : ''; ?>> Viernes
                                                            </li>
                                                            <li class="list-group-item">
                                                                <input type="checkbox" name="sabado" <?= ($proveedores->horario_proveedor->sabado == "1") ? 'checked' : ''; ?>> Sábado
                                                            </li>
                                                            <li class="list-group-item">
                                                                <input type="checkbox" name="domingo" <?= ($proveedores->horario_proveedor->domingo == "1") ? 'checked' : ''; ?>> Domingo
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-6">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_lunes; ?>" name="desde_lunes" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_martes; ?>" name="desde_martes" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_miercoles; ?>" name="desde_miercoles" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_jueves; ?>" name="desde_jueves" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_viernes; ?>" name="desde_viernes" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_sabado; ?>" name="desde_sabado" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Desde" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->desde_domingo; ?>" name="desde_domingo" onkeydown="return false">
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_lunes; ?>" name="hasta_lunes" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_martes; ?>" name="hasta_martes" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_miercoles; ?>" name="hasta_miercoles" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_jueves; ?>" name="hasta_jueves" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_viernes; ?>" name="hasta_viernes" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_sabado; ?>" name="hasta_sabado" onkeydown="return false">
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <input type="text" placeholder="Hasta" class="form-control input-sm hora" value="<?= $proveedores->horario_proveedor->hasta_domingo; ?>" name="hasta_domingo" onkeydown="return false">
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



            <?php endif; ?>

        </div>


        <div class="clearfix"></div>

    </div>

</div>

<?php
if (isset($error)) {
    echo '<script>alert("Usuario o contraseña incorrecta")</script>';
}
?>

<?php include('includes/footer.php');  ?>