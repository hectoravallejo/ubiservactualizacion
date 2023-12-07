<?php

$id_cliente = $_POST['id_cliente'];
$id_categoria = $_POST['id_categoria'];
$id_proveedor = $_POST['id_proveedor'];

if ($anuncios->ver_anuncio_asociado($id_cliente, $id_proveedor) == FALSE) :
    $anuncios->nuevo();
?>

    <div class="col-md-12">
        <div class="col-md-4">

            <?php
            $categorias->ver();
            foreach ($categorias->categorias as $categoria) :
                $categoria = (object)$categoria;
            ?>
                <?= ($id_categoria == $categoria->id) ? $categoria->nombre : ''; ?>
            <?php endforeach; ?>

        </div>
        <div class="col-md-4">
            <?php

            $proveedores->ver(NULL, array('id_categoria' => $id_categoria));

            foreach ($proveedores->proveedores as $proveedor) :
                $proveedor = (object)$proveedor;
            ?>
                <?= ($id_proveedor == $proveedor->id) ? $proveedor->nombre : ''; ?>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-danger eliminar-anuncio-asociado" data-id="<?= $anuncios->id_anuncio; ?>"><i class="fa fa-times"></i></a>
        </div>
    </div>

    <div class="clearfix"></div>
    <hr>

<?php
endif;
?>