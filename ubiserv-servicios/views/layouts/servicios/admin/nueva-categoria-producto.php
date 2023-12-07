<?php include('includes/seguridad.php');
include('includes/header.php');  ?>

<div class="pagina-servicios-admin">

    <div class="row">
        <div class="container">
            <div class="col-md-11 centrado">

                <a href="<?= $path; ?>/../servicios/menu/<?= $id; ?>" class="btn btn-danger"><i class="fa fa-angle-left"></i> Categorías</a>
                <hr>

                <form action="<?= $path; ?>/../servicios/categorias-productos/nueva" method="POST" enctype="multipart/form-data" class="col-md-12 no-padding">

                    <table class="tabla">
                        <thead>
                            <tr>
                                <th colspan="2">Agregar categoría producto</th>
                            </tr>
                        </thead>

                        <tr>
                            <td class="etiqueta">Nombre</td>
                            <td>
                                <input type="hidden" name="id_proveedor" value="<?= $id; ?>">
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


</div>


<?php include('includes/footer.php');  ?>