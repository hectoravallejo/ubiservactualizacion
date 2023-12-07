<?php 

$proveedores->ver(NULL, array('id_categoria' => $id_categoria));

foreach ($proveedores->proveedores as $i => $proveedor) {
    $proveedor = (object)$proveedor;

    echo '<option value="'.$proveedor->id.'">'.$proveedor->nombre.'</option>';

}