<?php

switch (@$titulo_seccion) {
	case 'proveedor':

		@$proveedores->ver_proveedor(@$id);
		@$titulo_extra =  $proveedores->proveedor_actual->nombre;

		break;

	default:
		$titulo_extra = '';
		break;
}
