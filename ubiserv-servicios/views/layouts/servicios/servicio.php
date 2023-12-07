<?php include('includes/header.php'); ?>


<?php $proveedores->ver(NULL, array('slug' => $slug)); ?>

<!-- start about -->
<section id="about" class="templatemo-section templatemo-top-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-uppercase"><?= $proveedores->proveedor->nombre; ?></h1>
            </div>
            <div class="col-md-6 col-sm-6">

                <?= $proveedores->proveedor->descripcion; ?>

                <ul>
                    <li><b>Domicilio:</b> <?= $proveedores->proveedor->domicilio; ?></li>
                    <li><b>Colonia:</b> <?= $proveedores->proveedor->colonia; ?></li>
                    <li><b>Estado:</b> <?= $proveedores->proveedor->estado; ?></li>
                    <li><b>Teléfono:</b> <?= $proveedores->proveedor->telefono; ?></li>
                    <li><b>WhatsApp:</b> <?= $proveedores->proveedor->whatsapp; ?></li>
                    <li><b>Página:</b> <a href="<?= $proveedores->proveedor->pagina; ?>" target="_blank"><?= $proveedores->proveedor->pagina; ?></a></li>
                    <?php if ($proveedores->proveedor->youtube != '') : ?>
                        <li><b>Youtube:</b> <a href="<?= $proveedores->proveedor->youtube; ?>" target="_blank"><?= $proveedores->proveedor->youtube; ?></a></li>
                    <?php endif; ?>
                    <?php if ($proveedores->proveedor->tiktok != '') : ?>
                        <li><b>Tik Tok:</b> <a href="<?= $proveedores->proveedor->tiktok; ?>" target="_blank"><?= $proveedores->proveedor->tiktok; ?></a></li>
                    <?php endif; ?>
                    <?php if ($proveedores->proveedor->facebook != '') : ?>
                        <li><b>Facebook:</b> <a href="<?= $proveedores->proveedor->facebook; ?>" target="_blank"><?= $proveedores->proveedor->facebook; ?></a></li>
                    <?php endif; ?>
                    <?php if ($proveedores->proveedor->instagram != '') : ?>
                        <li><b>Instagram:</b> <a href="<?= $proveedores->proveedor->instagram; ?>" target="_blank"><?= $proveedores->proveedor->instagram; ?></a></li>
                    <?php endif; ?>
                    <?php if (
                        $proveedores->horario_proveedor->lunes != 0 ||
                        $proveedores->horario_proveedor->martes != 0 ||
                        $proveedores->horario_proveedor->miercoles != 0 ||
                        $proveedores->horario_proveedor->jueves != 0 ||
                        $proveedores->horario_proveedor->viernes != 0 ||
                        $proveedores->horario_proveedor->sabado != 0 ||
                        $proveedores->horario_proveedor->domingo != 0
                    ) : ?>
                        <li>
                            <h3>Horarios:</h3>

                            <?php if ($proveedores->horario_proveedor->lunes != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Lunes</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_lunes; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_lunes; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php if ($proveedores->horario_proveedor->martes != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Martes</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_martes; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_martes; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php if ($proveedores->horario_proveedor->miercoles != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Miercoles</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_miercoles; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_miercoles; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php if ($proveedores->horario_proveedor->jueves != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Jueves</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_jueves; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_jueves; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php if ($proveedores->horario_proveedor->viernes != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Viernes</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_viernes; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_viernes; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php if ($proveedores->horario_proveedor->sabado != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Sabado</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_sabado; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_sabado; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php if ($proveedores->horario_proveedor->domingo != 0) : ?>
                                <div class="col-xs-4">
                                    <b>Domimgo</b>
                                </div>
                                <div class="col-xs-4">
                                    Desde: <?= $proveedores->horario_proveedor->desde_domingo; ?>
                                </div>
                                <div class="col-xs-4">
                                    Hasta: <?= $proveedores->horario_proveedor->desde_domingo; ?>
                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>

                        </li>
                    <?php endif; ?>
                </ul>

                <img src="<?= $path .'/../ubiserv-sistema-app' . '/Images/codigos/folleto-' . $proveedores->proveedor->id . '.png'; ?>" alt="">

            </div>
            <div class="col-md-6 col-sm-6">
                <?php if($proveedores->proveedor->imagen != ''): ?>
                    <img src="<?= $proveedores->path . $proveedores->ruta_imagen . $proveedores->proveedor->imagen; ?>" class="img-responsive img-bordered img-about">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- end about -->

<div class="clearfix"></div>

<!-- start about -->

<?php
    $categorias->ver_por_slug($categoria);
    if($categorias->categoria->restaurante == 1):
?>

<section id="about" class="templatemo-section templatemo-top-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-uppercase text-center">Nuestro menú</h1>

                <?php $categorias_productos->orden_categorias = ['orden' => 'ASC']; ?>
                <?php $categorias_productos->ver(NULL, array('id_proveedor' => $proveedores->proveedor->id)); ?>

                <?php foreach ($categorias_productos->categorias as $categoria) : ?>
                    <?php $categoria = (object)$categoria; ?>

                    <div class="col-md-12 text-center">
                        <h3><?= $categoria->nombre; ?></h3>
                        <img src="<?= $categorias_productos->path . $categorias_productos->ruta_imagen . $categoria->imagen; ?>" class="img-responsive" style="margin: 0 auto;">
                    </div>

                    <div class="clearfix"></div><br>


                    <?php $productos->ver(NULL, array('id_proveedor' => $proveedores->proveedor->id, 'id_categoria' => $categoria->id)); ?>


                    <?php $productos->orden_productos = ['orden' => 'ASC']; ?>
                    <?php foreach ($productos->productos as $producto) : ?>
                        <?php $producto = (object)$producto; ?>


                        <div class="col-md-4 producto">
                            <img src="<?= $productos->path . $productos->ruta_imagen . $producto->imagen; ?>" class="img-responsive">
                            <h4>
                                <?= $producto->nombre ?>
                            </h4>
                            <div class="descripcion-producto">
                                <?= $producto->descripcion; ?>
                            </div>
                            <div class="precio">
                                <b><?= moneda($producto->precio); ?></b>
                            </div>
                            <div class="contenedor-cantidad">
                                <div class="col-md-6">
                                    <span>
                                        Cantidad
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control cantidad" value="1">
                                </div>
                            </div>
                            <a href="#" class="agregar" data-precio="<?= $producto->precio; ?>" data-nombre="<?= $producto->nombre; ?>" data-imagen="<?= $productos->path . $productos->ruta_imagen . $producto->imagen; ?>">Agregar</a>
                        </div>
                    <?php endforeach; ?>


                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>


<a href="#" class="ver-carrito"><i class="fa fa-shopping-cart"></i> Ver carrito <span>0</span></a>


<div class="modal-carrito">
    <div class="contenedor-carrito">
        <h2 class="text-center">Carrito de compras</h2>

        
        <div class="col-md-12">
            <div class="row cabecera-carrito">
                <div class="col-xs-3 text-center col-xs-offset-1">
                    <b>Producto</b>
                </div>
                <div class="col-xs-2 text-center">
                    <b>Cantidad</b>
                </div>
                <div class="col-xs-2">
                    <b>Precio</b>
                </div>
                <div class="col-xs-3">
                    <b>Sub Total</b>
                </div>
            </div>

        </div>


        <div class="carrito"></div>

        <div class="col-md-12 text-center">
            <h3 class="total-carrito">0</h3>
        </div>

        <div class="col-xs-6 col-xs-offset-6">
            <br><br>
            <a href="#" class="btn btn-primary col-md-12 actualizar-carrito">Actualizar carrito</a>
            <br><br>
        </div>

        <div class="clearfix"></div><br><br>

        <?php 
        
            if($proveedores->proveedor->lada_whatsapp == ''){
                $lada = '52';
            }else{
                $lada = $proveedores->proveedor->lada_whatsapp;
            }

        ?>

        <a href="#" data-linkwhatsapp="https://api.whatsapp.com/send?phone=<?= $lada.$proveedores->proveedor->whatsapp; ?>&text=Solicitud de pedido %0A" class="col-xs-10 col-xs-offset-1 btn btn-success" id="boton-whatsapp" target="_blank"><i class="fa fa-whatsapp"></i> Enviar pedidos por WhatsApp</a>
        <div class="clearfix"></div><br><br>

    </div>
</div>

<?php endif; ?>

<?php include('includes/footer.php'); ?>