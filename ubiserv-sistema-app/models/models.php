<?php
include('config/vars.php');
// require_once('config/functions.php');
include('config/db.php');

include('permisos.php');
include('mensajes.php');
include('ordenar.php');

include('usuarios.php');
include('proveedores.php');
include('categorias.php');
include('categorias-productos.php');

include('productos.php');

include('estadisticas.php');

include('imagendestacada.php');


include('paginacion.php');
include('qr.php');

include('anuncios.php');



class Models
{

	private $database;


	public function __construct($database, $path, $serverpath)
	{

		global $prefijo;

		$this->qr = new QR_BarCode();




		$this->paginacion = new Paginacion($database, $path);
		$this->paginacion->agregar_vistas(array('backend' => 'paginacion,woocommerce', 'servicios' => 'paginacion-servicios'));

		$this->usuarios = new Usuarios($database, $path, $serverpath);
		$this->usuarios->paginacion = $this->paginacion;
		$this->usuarios->agregar_vistas(array('backend' => 'pedidos,backend,editar,nuevo'));

		$this->categorias = new Categorias($database, $path, $serverpath);
		$this->categorias->paginacion = $this->paginacion;
		$this->categorias->agregar_vistas(array('backend' => 'pedidos,backend,editar,nueva'));


		$this->categorias_productos = new CategoriasProductos($database, $path, $serverpath);
		$this->categorias_productos->paginacion = $this->paginacion;
		$this->categorias_productos->agregar_vistas(array('backend' => 'pedidos,backend,editar,nueva'));


		$this->productos = new Productos($database, $path, $serverpath);
		$this->productos->paginacion = $this->paginacion;
		$this->productos->agregar_vistas(array('backend' => 'pedidos,backend,editar,nuevo'));


		$this->proveedores = new Proveedores($database, $path, $serverpath);
		$this->proveedores->paginacion = $this->paginacion;
		$this->proveedores->categorias = $this->categorias;




		$this->anuncios = new Anuncios($database, $path, $serverpath);
		$this->anuncios->paginacion = $this->paginacion;
		$this->anuncios->agregar_vistas(array('backend' => 'pedidos,backend,editar,nueva'));


		$this->usuarios->anuncios = $this->anuncios;

		$this->proveedores->qr = $this->qr;



		$this->proveedores->agregar_vistas(array('backend' => 'pedidos,backend,editar,nuevo', 'frontend' => 'publicar,terminos'));


		$this->estadisticas = new Estadisticas($database, $path, $serverpath);
		$this->estadisticas->categorias = $this->categorias;
		$this->estadisticas->proveedores = $this->proveedores;
		$this->estadisticas->paginacion = $this->paginacion;
		$this->estadisticas->agregar_vistas(array('backend' => 'backend,descargar,nueva'));

		$this->imagendestacada = new ImagenDestacada($database, $path, $serverpath);
		$this->imagendestacada->agregar_vistas(array('backend' => 'backend,descargar,nueva'));

		$this->usuarios->categorias = $this->categorias;
		$this->usuarios->proveedores = $this->proveedores;
		
	}
}
