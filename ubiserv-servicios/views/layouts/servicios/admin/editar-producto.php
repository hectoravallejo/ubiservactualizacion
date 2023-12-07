<?php include('includes/seguridad.php');
include('includes/header.php');  ?>

<div class="pagina-servicios-admin">


    <?php $productos->ver(NULL, array('id' => $id, 'id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria)); ?>


    <div class="row">
        <div class="container">
            <div class="col-md-11 centrado">


                <a href="<?= $path; ?>/../servicios/productos/<?= $data['id_proveedor']; ?>/<?= $data['id_categoria']; ?>" class="btn btn-danger"><i class="fa fa-angle-left"></i> Productos</a>
                <hr>

                <form action="<?= $path . '/../servicios/productos/editar/' . $productos->producto->id; ?>" enctype="multipart/form-data" method="POST" class="col-md-12 no-padding">

                    <table class="tabla">
                        <thead>
                            <tr>
                                <th colspan="2">Agregar producto</th>
                            </tr>
                        </thead>


                        <tr>
                            <td class="etiqueta">Nombre</td>
                            <td>
                                <input type="hidden" name="id_proveedor" value="<?= $data['id_proveedor']; ?>">
                                <input type="hidden" name="id_categoria_producto" value="<?= $data['id_categoria']; ?>">
                                <input class="input-tabla" type="text" value="<?= $productos->producto->nombre; ?>" name="nombre" required>
                            </td>
                        </tr>


                        <tr class="par">
                            <td class="etiqueta">Decripción</td>
                            <td>
                                <textarea name="descripcion" class="editor"><?= $productos->producto->descripcion ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="etiqueta">Precio</td>
                            <td>
                                <input type="number" min="0" class="input-tabla numeros" name="precio" value="<?= $productos->producto->precio; ?>">
                            </td>
                        </tr>



                        <tr class="par">
                            <td class="etiqueta">Orden</td>
                            <td><input type="number" class="input-tabla numeros" min="0" value="<?= $productos->producto->orden; ?>" name="orden" required></td>
                        </tr>

                        <tr>
                            <td class="etiqueta">Imagen</td>

                            <td>

                                <div class="col-md-6">
                                    <input type="file" name="imagen[]">
                                    <input type="hidden" name="imagen_actual" value="<?= $productos->producto->imagen; ?>">
                                </div>

                                <div class="col-md-6">

                                    <div class="col-md-4 col-md-offset-4">
                                        <img src="<?= $path .'/../ubiserv-sistema-app/'. $productos->ruta_imagen . $productos->producto->imagen; ?>" class="img-responsive">
                                    </div>

                                </div>


                            </td>
                        </tr>


                    </table>

                    <div class="col-md-6 pull-right">
                        <button type="submit" class="btn-nuevo">Editar producto</a>
                    </div>

                </form>

            </div>
        </div>
    </div>





</div>





<?php include('includes/footer.php');  ?>