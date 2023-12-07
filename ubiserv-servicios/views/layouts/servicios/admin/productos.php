<?php include('includes/seguridad.php');
include('includes/header.php');  ?>

<div class="pagina-servicios-admin">

    <div class="row">
        <div class="container">
            <div class="col-md-11 centrado">

                <a href="<?= $path; ?>/../servicios/menu/<?= $id_proveedor; ?>" class="btn btn-danger"><i class="fa fa-angle-left"></i> Categorías</a>
                <hr>

                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Orden</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Edición</th>
                        </tr>
                    </thead>

                    <?php $productos->por_pagina = 1000; ?>
                    <?php $productos->ver(NULL, array('id_proveedor' => $id_proveedor, 'id_categoria' => $id_categoria)); ?>


                    <?php foreach ($productos->productos as $i => $producto) { ?>

                        <?php $producto = (object)$producto; ?>

                        <tr <?= ((int)$i % 2 != 0) ? 'class="par"' : ''; ?>>
                            <td><?= $producto->nombre; ?></td>
                            <td><?= $producto->orden; ?></td>
                            <td><?= moneda($producto->precio); ?></td>
                            <td><img src="<?= $path . '/../ubiserv-sistema-app' . $productos->ruta_imagen . $producto->imagen; ?>" class="img-responsive" style="max-width: 100px"></td>
                            <td class="text-center">

                                <a href="<?= $path . '/../servicios/editar-producto/' . $data['id_proveedor'] . '/' . $data['id_categoria'] . '/' . $producto->id; ?>" class="btn-editar">Editar</a>

                                <form action="<?php echo $path; ?>/../servicios/eliminar-producto" method="POST" data-id="<?php echo $producto->id; ?>">
                                    <a href="#" class="btn-eliminar borrar">Eliminar <i class="fa fa-times"></i></a>
                                </form>

                            </td>
                        </tr>

                    <?php } ?>


                </table>


            </div>
        </div>
    </div>


    <div class="row">
        <div class="container">

            <div class="col-md-11 centrado no-padding">


                <div class="col-md-6">
                    &nbsp;
                </div>

                <div class="col-md-6">
                    <a href="<?= $path; ?>/../servicios/nuevo-producto/<?= $data['id_proveedor']; ?>/<?= $data['id_categoria'] ?>" class="btn-nuevo">Nuevo producto</a>
                </div>

            </div>

        </div>
    </div>

</div>






<?php include('includes/footer.php');  ?>