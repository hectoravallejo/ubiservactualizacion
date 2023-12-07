<?php
class Anuncios
{

	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_anuncios = ['id' => 'DESC'];
		$this->tabla = 'in_anuncios';
		$this->carpeta_vistas = 'anuncios';


		$this->ruta_imagen = '/imagenes/anuncios/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;



		(isset($_POST['id'])) ? $this->id = $_POST['id'] : $this->id = '';
		(isset($_POST['id_cliente'])) ? $this->id_cliente = $_POST['id_cliente'] : $this->id_cliente = '';
		(isset($_POST['id_categoria'])) ? $this->id_categoria = $_POST['id_categoria'] : $this->id_categoria = '';
		(isset($_POST['id_proveedor'])) ? $this->id_proveedor = $_POST['id_proveedor'] : $this->id_proveedor = '';


		if (!empty($_FILES['imagen']['name'])) {
			$this->imagen = $_FILES['imagen']['name'];
		};
	}

	function ver_anuncio($id)
	{
		$this->anuncio_actual = $this->database->get(
			$this->tabla,
			'*',
			[
				'id' => $id,
			]
		);

		$this->anuncio_actual = (object)$this->anuncio_actual;

		return $this->anuncio_actual;
	}

	function ver_anuncio_asociado($id_cliente, $id_proveedor)
	{
		$this->anuncio_asociado_actual = $this->database->get(
			$this->tabla,
			'*',
			[
				'id_cliente' => $id_cliente,
				'id_proveedor' => $id_proveedor,
			]
		);

		if( isset($this->anuncio_asociado_actual['id']) ){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	function agregar_vistas($data = array())
	{
		$this->vistas = $data;
		return $this->vistas;
	}

	function ver($tipo = 'frontend', $data = array())
	{


		if (!empty($data['id_cliente'])) {

			$this->anuncios = $this->database->select($this->tabla, "*", [
				'id_cliente' => $data['id_cliente'],
				'ORDER' => $this->orden_anuncios,
			]);

		}else{
			$this->anuncios = $this->database->select($this->tabla, "*", [
				'ORDER' => $this->orden_anuncios,
			]);
		}




		if (!empty($data['id'])) {
			$this->anuncio = $this->database->get(
				$this->tabla,
				"*",
				[
					'id' => $data['id'],
				]
			);

			$this->anuncio = (object)$this->anuncio;
		}





		if (isset($this->vistas)) {
			foreach ($this->vistas as $area => $vistas) {

				$vistas = explode(',', $vistas);

				foreach ($vistas as $vista) {
					if ($tipo == $vista) {
						require vista($this->carpeta_vistas, $vista, $area);
					}
				}
			}
		}
	}

	function nuevo()
	{

		$this->error = FALSE;

		$args = array();

		$args['id_cliente'] = $this->id_cliente;
		$args['id_categoria'] = $this->id_categoria;
		$args['id_proveedor'] = $this->id_proveedor;



		$this->nuevo_anuncio = $this->database->insert($this->tabla, $args);

		if ($this->nuevo_anuncio->rowCount() != 0) {

			$this->id_anuncio = $this->database->id();
		} else {
			$this->error = TRUE;
		}


	}

	function editar($id)
	{


		$args = array();

		$args['id_cliente'] = $this->id_cliente;
		$args['id_categoria'] = $this->id_categoria;
		$args['id_proveedor'] = $this->id_proveedor;


		$this->editar_anuncio = $this->database->update(
			$this->tabla,
			$args,
			[
				'id' => $id,
			]
		);
	}

	function eliminar($id)
	{
		$this->eliminar_anuncio = $this->database->delete($this->tabla, [
			"id" => $id
		]);
	}


	function ver_por_slug($slug)
	{

		$this->anuncio = $this->database->get($this->tabla, '*', ['slug' => $slug]);

		$this->anuncio = (object)$this->anuncio;
	}


	function mensaje($mensaje = NULL)
	{
		$this->mensaje = new Mensajes($mensaje);
		$this->mensaje->ver();
	}

	function __destruct()
	{
		unset($this->database);
	}
}
