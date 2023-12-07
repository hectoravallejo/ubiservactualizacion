<?php
class Estadisticas
{

	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_estadisticas = ['id' => 'DESC'];
		$this->tabla = 'in_estadisticas';
		$this->carpeta_vistas = 'estadisticas';


		$this->ruta_imagen = '/imagenes/estadisticas/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;



		(isset($_POST['id'])) ? $this->id = $_POST['id'] : $this->id = '';
		(isset($_POST['id_proveedor'])) ? $this->id_proveedor = $_POST['id_proveedor'] : $this->id_proveedor = '';
		(isset($_POST['visitas'])) ? $this->visitas = $_POST['visitas'] : $this->visitas = '';
		(isset($_POST['fecha'])) ? $this->fecha = $_POST['fecha'] : $this->fecha = strtotime(date('Y-m-d', time()));
		(isset($_POST['id_categoria'])) ? $this->id_categoria = $_POST['id_categoria'] : $this->id_categoria = '';
	}

	function ver_estadistica($id)
	{
		$this->estadistica_actual = $this->database->get(
			$this->tabla,
			'*',
			[
				'id' => $id,
			]
		);

		$this->estadistica_actual = (object)$this->estadistica_actual;

		return $this->estadistica_actual;
	}


	function ver_estadistica_webservice($id)
	{
		$this->estadistica_actual = $this->database->select(
			$this->tabla,
			'*',
			[
				'id' => $id,
			]
		);

		return $this->estadistica_actual;
	}


	function nueva_estadistica_categoria()
	{

		(isset($_POST['fecha'])) ? $this->fecha = $_POST['fecha'] : $this->fecha = strtotime(date('Y-m-d', time()));
		(isset($_POST['id_categoria'])) ? $this->id_categoria = $_POST['id_categoria'] : $this->id_categoria = '';

		$args['id_proveedor'] = 0;
		$args['id_categoria'] = $this->id_categoria;
		$args['fecha'] = $this->fecha;

		$this->estadistica_existente = $this->database->get($this->tabla, "visitas", $args);

		$args['visitas'] = 1;

		if ($this->estadistica_existente) {

			$visitas_actuales = $this->estadistica_existente + 1;


			$this->editar_estadistica = $this->database->update(
				$this->tabla,
				[
					'visitas' => $visitas_actuales
				],
				[
					'id_categoria' => $this->id_categoria,
					'fecha' => $this->fecha
				]
			);
		} else {
			$this->nueva_estadistica = $this->database->insert($this->tabla, $args);
		}
	}


	function nueva_estadistica_proveedor()
	{

		(isset($_POST['fecha'])) ? $this->fecha = $_POST['fecha'] : $this->fecha = strtotime(date('Y-m-d', time()));
		(isset($_POST['id_proveedor'])) ? $this->id_proveedor = $_POST['id_proveedor'] : $this->id_proveedor = '';

		$args['id_categoria'] = 0;
		$args['id_proveedor'] = $this->id_proveedor;
		$args['fecha'] = $this->fecha;

		$this->estadistica_existente = $this->database->get($this->tabla, "visitas", $args);

		$args['visitas'] = 1;

		if ($this->estadistica_existente) {

			$visitas_actuales = $this->estadistica_existente + 1;


			$this->editar_estadistica = $this->database->update(
				$this->tabla,
				[
					'visitas' => $visitas_actuales
				],
				[
					'id_proveedor' => $this->id_proveedor,
					'fecha' => $this->fecha
				]
			);
		} else {
			$this->nueva_estadistica = $this->database->insert($this->tabla, $args);
		}
	}

	function ver_estadisticas_categorias($fecha_desde, $fecha_hasta)
	{

		$this->estadisticas = $this->database->select(
			$this->tabla,
			"*",
			[
				'AND' => [
					'id_proveedor' => 0,
					'fecha[<>]' => [strtotime($fecha_desde), strtotime($fecha_hasta)],
				],
				'ORDER' => $this->orden_estadisticas,
			]
		);


		$this->estadisticas_categorias = array();

		foreach ($this->estadisticas as $t) {

			$repeat = false;

			for ($i = 0; $i < count($this->estadisticas_categorias); $i++) {

				if ($this->estadisticas_categorias[$i]['id_categoria'] == $t['id_categoria']) {

					$this->estadisticas_categorias[$i]['visitas'] += $t['visitas'];

					$repeat = true;

					break;
				}
			}

			if ($repeat == false)

				$this->estadisticas_categorias[] = array('id_categoria' => $t['id_categoria'], 'visitas' => $t['visitas']);
		}


	}

	function ver_estadisticas_proveedores($fecha_desde, $fecha_hasta)
	{

		$this->estadisticas = $this->database->select(
			$this->tabla,
			"*",
			[
				'AND' => [
					'id_categoria' => 0,
					'fecha[<>]' => [strtotime($fecha_desde), strtotime($fecha_hasta)],
				],
				'ORDER' => $this->orden_estadisticas,
			]
		);


		$this->estadisticas_proveedores = array();

		foreach ($this->estadisticas as $t) {

			$repeat = false;

			for ($i = 0; $i < count($this->estadisticas_proveedores); $i++) {

				if ($this->estadisticas_proveedores[$i]['id_proveedor'] == $t['id_proveedor']) {

					$this->estadisticas_proveedores[$i]['visitas'] += $t['visitas'];

					$repeat = true;

					break;
				}
			}

			if ($repeat == false)

				$this->estadisticas_proveedores[] = array('id_proveedor' => $t['id_proveedor'], 'visitas' => $t['visitas']);
		}

	}

	function agregar_vistas($data = array())
	{
		$this->vistas = $data;
		return $this->vistas;
	}

	function ver($tipo = 'frontend', $data = array())
	{


		($this->pagina_actual == NULL) ? $this->pagina_actual = 0 : $this->pagina_actual = $this->pagina_actual - 1;



		$this->pagina_actual = $this->pagina_actual * $this->por_pagina;



		if (isset($data['paginacion'])) {


			$this->estadisticas = $this->database->select(
				$this->tabla,
				"*",
				[
					'ORDER' => $this->orden_estadisticas,
					'LIMIT' => [$this->pagina_actual, $this->por_pagina]
				]
			);


			$this->numero_estadisticas = $this->database->count($this->tabla);
		} else {

			if (isset($data['id_categoria'])) {

				$this->estadisticas = $this->database->select($this->tabla, "*", [
					'id_categoria' => $data['id_categoria'],
					'ORDER' => $this->orden_estadisticas
				]);
			} else {
				$this->estadisticas = $this->database->select($this->tabla, "*", [
					'ORDER' => $this->orden_estadisticas
				]);
			}
		}

		if (!empty($data['id'])) {
			$this->estadistica = $this->database->get(
				$this->tabla,
				"*",
				[
					'id' => $data['id'],
				]
			);

			$this->estadistica = (object)$this->estadistica;
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

	function nueva()
	{

		$this->error = FALSE;

		$args = array();


		$args['id_proveedor'] = $this->id_proveedor;
		$args['visitas'] = $this->visitas;
		$args['fecha'] = $this->fecha;



		$this->nueva_estadistica = $this->database->insert($this->tabla, $args);

		if ($this->nueva_estadistica->rowCount() != 0) {

			$this->id_estadistica = $this->database->id();
		} else {
			$this->error = TRUE;
		}
	}

	function editar($id)
	{


		$args = array();

		$args['id_proveedor'] = $this->id_proveedor;
		$args['visitas'] = $this->visitas;
		$args['fecha'] = $this->fecha;



		$this->editar_estadistica = $this->database->update(
			$this->tabla,
			$args,
			[
				'id' => $id,
			]
		);
	}

	function eliminar($id)
	{

		$this->eliminar_estadistica = $this->database->delete($this->tabla, [
			"id" => $id
		]);
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
