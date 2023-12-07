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
                <?php $anuncios->ver(NULL, array('id_cliente' => $permisos->id_usuario)); ?>
                <?php foreach ($anuncios->anuncios as $i => $anuncio) : ?>
                    <?php $anuncio = (object)$anuncio; ?>
                    <div class="row">
                        <div class="col-md-4">
                            <?php $proveedores->ver_proveedor($anuncio->id_proveedor); ?>

                            <?= $proveedores->proveedor_actual->nombre; ?>
                        </div>
                        <div class="col-md-4">
                            <?php $categorias->ver_categoria($proveedores->proveedor_actual->id_categoria); ?>
                            <?php if ($categorias->categoria_actual->restaurante == 1) : ?>
                                <a href="<?= $path ?>/../servicios/menu/<?= $proveedores->proveedor_actual->id; ?>" class="btn btn-success col-md-12">Menú de productos</a>
                            <?php else : ?>
                                &nbsp;
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">


                            <a href="<?= $path ?>/../servicios/editar-servicio/<?= $anuncio->id_proveedor; ?>" class="btn btn-danger col-md-12">Editar anuncio</a>
                        </div>
                    </div>
                <?php endforeach; ?>
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