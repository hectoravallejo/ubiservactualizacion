<?php
class Proveedores
{

	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_proveedores = ['id' => 'DESC'];
		$this->tabla = 'in_proveedores';
		$this->carpeta_vistas = 'proveedores';


		$this->ruta_imagen = '/imagenes/proveedores/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;



		(isset($_POST['id'])) ? $this->id = $_POST['id'] : $this->id = '';
		(isset($_POST['id_categoria'])) ? $this->id_categoria = $_POST['id_categoria'] : $this->id_categoria = '';
		(isset($_POST['nombre'])) ? $this->nombre = $_POST['nombre'] : $this->nombre = '';
		(isset($_POST['slug'])) ? $this->slug = slug($_POST['slug']) : $this->slug = '';
		(isset($_POST['domicilio'])) ? $this->domicilio = $_POST['domicilio'] : $this->domicilio = '';
		(isset($_POST['colonia'])) ? $this->colonia = $_POST['colonia'] : $this->colonia = '';
		(isset($_POST['estado'])) ? $this->estado = $_POST['estado'] : $this->estado = '';
		(isset($_POST['telefono'])) ? $this->telefono = $_POST['telefono'] : $this->telefono = '';
		(isset($_POST['whatsapp'])) ? $this->whatsapp = $_POST['whatsapp'] : $this->whatsapp = '';
		(isset($_POST['lada_whatsapp'])) ? $this->lada_whatsapp = $_POST['lada_whatsapp'] : $this->lada_whatsapp = '';
		(isset($_POST['pagina'])) ? $this->pagina = $_POST['pagina'] : $this->pagina = '';
		(isset($_POST['descripcion'])) ? $this->descripcion = $_POST['descripcion'] : $this->descripcion = '';
		(isset($_POST['longitud'])) ? $this->longitud = $_POST['longitud'] : $this->longitud = '';
		(isset($_POST['latitud'])) ? $this->latitud = $_POST['latitud'] : $this->latitud = '';
		(isset($_POST['youtube'])) ? $this->youtube = $_POST['youtube'] : $this->youtube = '';
		(isset($_POST['tiktok'])) ? $this->tiktok = $_POST['tiktok'] : $this->tiktok = '';

		(isset($_POST['facebook'])) ? $this->facebook = $_POST['facebook'] : $this->facebook = '';
		(isset($_POST['instagram'])) ? $this->instagram = $_POST['instagram'] : $this->instagram = '';



		(isset($_POST['lunes'])) ? $this->lunes = 1 : $this->lunes = 0;
		(isset($_POST['martes'])) ? $this->martes = 1 : $this->martes = 0;
		(isset($_POST['miercoles'])) ? $this->miercoles = 1 : $this->miercoles = 0;
		(isset($_POST['jueves'])) ? $this->jueves = 1 : $this->jueves = 0;
		(isset($_POST['viernes'])) ? $this->viernes = 1 : $this->viernes = 0;
		(isset($_POST['sabado'])) ? $this->sabado = 1 : $this->sabado = 0;
		(isset($_POST['domingo'])) ? $this->domingo = 1 : $this->domingo = 0;

		(isset($_POST['desde_lunes'])) ? $this->desde_lunes = $_POST['desde_lunes'] : $this->desde_lunes = '';
		(isset($_POST['desde_martes'])) ? $this->desde_martes = $_POST['desde_martes'] : $this->desde_martes = '';
		(isset($_POST['desde_miercoles'])) ? $this->desde_miercoles = $_POST['desde_miercoles'] : $this->desde_miercoles = '';
		(isset($_POST['desde_jueves'])) ? $this->desde_jueves = $_POST['desde_jueves'] : $this->desde_jueves = '';
		(isset($_POST['desde_viernes'])) ? $this->desde_viernes = $_POST['desde_viernes'] : $this->desde_viernes = '';
		(isset($_POST['desde_sabado'])) ? $this->desde_sabado = $_POST['desde_sabado'] : $this->desde_sabado = '';
		(isset($_POST['desde_domingo'])) ? $this->desde_domingo = $_POST['desde_domingo'] : $this->desde_domingo = '';

		(isset($_POST['hasta_lunes'])) ? $this->hasta_lunes = $_POST['hasta_lunes'] : $this->hasta_lunes = '';
		(isset($_POST['hasta_martes'])) ? $this->hasta_martes = $_POST['hasta_martes'] : $this->hasta_martes = '';
		(isset($_POST['hasta_miercoles'])) ? $this->hasta_miercoles = $_POST['hasta_miercoles'] : $this->hasta_miercoles = '';
		(isset($_POST['hasta_jueves'])) ? $this->hasta_jueves = $_POST['hasta_jueves'] : $this->hasta_jueves = '';
		(isset($_POST['hasta_viernes'])) ? $this->hasta_viernes = $_POST['hasta_viernes'] : $this->hasta_viernes = '';
		(isset($_POST['hasta_sabado'])) ? $this->hasta_sabado = $_POST['hasta_sabado'] : $this->hasta_sabado = '';
		(isset($_POST['hasta_domingo'])) ? $this->hasta_domingo = $_POST['hasta_domingo'] : $this->hasta_domingo = '';

		(isset($_POST['mostrar'])) ? $this->mostrar = $_POST['mostrar'] : $this->mostrar = 0;
		(isset($_POST['activo'])) ? $this->activo = $_POST['activo'] : $this->activo = 0;



		( isset($_POST['imagen_actual']) ) ? $this->imagen_actual = $_POST['imagen_actual'] : $this->imagen_actual = '';
		
		if( !empty( $_FILES['imagen']['name'] ) ){
			$this->imagen = $_FILES['imagen']['name'];
		};
		

		( isset($_POST['imagen_menu_actual']) ) ? $this->imagen_menu_actual = $_POST['imagen_menu_actual'] : $this->imagen_menu_actual = '';
		
		if( !empty( $_FILES['imagen_menu']['name'] ) ){
			$this->imagen_menu = $_FILES['imagen_menu']['name'];
		};
		


		

	}

	function ver_por_slug($slug)
	{


		($this->pagina_actual == NULL) ? $this->pagina_actual = 0 : $this->pagina_actual = $this->pagina_actual - 1;
		$this->pagina_actual = $this->pagina_actual * $this->por_pagina;


		$this->id_categoria = $this->database->get('in_categorias', ['id'], ['slug' => $slug]);

		$args = array();
		$args['id_categoria'] = $this->id_categoria;
		$args['ORDER'] = $this->orden_proveedores;
		$args['LIMIT'] = [$this->pagina_actual, $this->por_pagina];
		
		
		$this->proveedores = $this->database->select($this->tabla, '*', $args );
		
		unset( $args['LIMIT'] );
		unset( $args['ORDER'] );
		$this->numero_proveedores = $this->database->count($this->tabla, $args);


	}

	function ver_proveedor($id)
	{
		$this->proveedor_actual = $this->database->get(
			$this->tabla,
			'*',
			[
				'id' => $id,
			]
		);

		$this->proveedor_actual = (object)$this->proveedor_actual;

		return $this->proveedor_actual;
	}


	function ver_proveedor_webservice($id)
	{



		$this->proveedor_actual = $this->database->select($this->tabla, [
			"[><]in_horarios" => ["id" => "id_proveedor"]
		], '*', [
			'in_proveedores.id' => $id,
		]);

		foreach ($this->proveedor_actual as $i => $proveedor) {

			$this->proveedor_actual[$i]['ruta'] = $this->path . $this->ruta_imagen;
		}


		return $this->proveedor_actual;
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



			if (isset($data['id_categoria'])) {

				$this->proveedores = $this->database->select(
					$this->tabla,
					"*",
					[
						'id_categoria' => $data['id_categoria'],
						'ORDER' => $this->orden_proveedores,
						'LIMIT' => [$this->pagina_actual, $this->por_pagina]
					]
				);

				$this->numero_proveedores = $this->database->count($this->tabla, ['id_categoria' => $data['id_categoria']]);
			} elseif (isset($data['aprobar_anuncios'])) {

				$this->proveedores = $this->database->select(
					$this->tabla,
					"*",
					[
						'activo' => 0,
						'ORDER' => $this->orden_proveedores,
						'LIMIT' => [$this->pagina_actual, $this->por_pagina]
					]
				);

				$this->numero_proveedores = $this->database->count($this->tabla, ['activo' => 0]);
			} else {

				$this->proveedores = $this->database->select(
					$this->tabla,
					"*",
					[
						'ORDER' => $this->orden_proveedores,
						'LIMIT' => [$this->pagina_actual, $this->por_pagina]
					]
				);

				$this->numero_proveedores = $this->database->count($this->tabla);
			}
		} else {

			if (isset($data['id_categoria'])) {

				// $this->proveedores = $this->database->select( $this->tabla , "*",[
				// 	'id_categoria' => $data['id_categoria'],
				// 	'ORDER' => $this->orden_proveedores
				// ]);


				$this->proveedores = $this->database->select(
					$this->tabla,
					[
						"[><]in_horarios" => ["id" => "id_proveedor"]
					],
					[
						'in_proveedores.id',
						'in_proveedores.id_categoria',
						'in_proveedores.nombre',
						'in_proveedores.slug',
						'in_proveedores.imagen',
						'in_proveedores.domicilio',
						'in_proveedores.colonia',
						'in_proveedores.estado',
						'in_proveedores.telefono',
						'in_proveedores.whatsapp',
						'in_proveedores.lada_whatsapp',
						'in_proveedores.pagina',
						'in_proveedores.descripcion',
						'in_proveedores.longitud',
						'in_proveedores.latitud',
						'in_proveedores.youtube',
						'in_proveedores.tiktok',
						'in_proveedores.facebook',
						'in_proveedores.instagram',
						'in_proveedores.mostrar',
						'in_proveedores.activo',

						'in_horarios.lunes',
						'in_horarios.martes',
						'in_horarios.miercoles',
						'in_horarios.jueves',
						'in_horarios.viernes',
						'in_horarios.sabado',
						'in_horarios.domingo',


						'in_horarios.desde_lunes',
						'in_horarios.desde_martes',
						'in_horarios.desde_miercoles',
						'in_horarios.desde_jueves',
						'in_horarios.desde_viernes',
						'in_horarios.desde_sabado',
						'in_horarios.desde_domingo',


						'in_horarios.hasta_lunes',
						'in_horarios.hasta_martes',
						'in_horarios.hasta_miercoles',
						'in_horarios.hasta_jueves',
						'in_horarios.hasta_viernes',
						'in_horarios.hasta_sabado',
						'in_horarios.hasta_domingo',


					],
					[
						'in_proveedores.id_categoria' => $data['id_categoria'],
					]
				);
			} else {
				$this->proveedores = $this->database->select($this->tabla, "*", [
					'ORDER' => $this->orden_proveedores
				]);
			}
		}

		if (!empty($data['id'])) {
			$this->proveedor = $this->database->get(
				$this->tabla,
				"*",
				[
					'id' => $data['id'],
				]
			);

			$this->horario_proveedor = $this->database->get(
				'in_horarios',
				"*",
				[
					'id_proveedor' => $data['id'],
				]
			);


			$this->proveedor = (object)$this->proveedor;
			$this->horario_proveedor = (object)$this->horario_proveedor;
		}


		if (!empty($data['slug'])) {
			$this->proveedor = $this->database->get(
				$this->tabla,
				"*",
				[
					'slug' => $data['slug'],
				]
			);

			$this->horario_proveedor = $this->database->get(
				'in_horarios',
				"*",
				[
					'id_proveedor' => $this->proveedor['id'],
				]
			);


			$this->proveedor = (object)$this->proveedor;
			$this->horario_proveedor = (object)$this->horario_proveedor;
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


		$args['nombre'] = $this->nombre;
		$args['slug'] = $this->slug;
		$args['domicilio'] = $this->domicilio;
		$args['colonia'] = $this->colonia;
		$args['estado'] = $this->estado;
		$args['telefono'] = $this->telefono;
		$args['whatsapp'] = $this->whatsapp;
		$args['lada_whatsapp'] = $this->lada_whatsapp;
		$args['pagina'] = $this->pagina;
		$args['descripcion'] = $this->descripcion;
		$args['longitud'] = $this->longitud;
		$args['latitud'] = $this->latitud;
		$args['id_categoria'] = $this->id_categoria;
		$args['youtube'] = $this->youtube;
		$args['tiktok'] = $this->tiktok;
		$args['facebook'] = $this->facebook;
		$args['instagram'] = $this->instagram;
		$args['mostrar'] = $this->mostrar;
		$args['activo'] = $this->activo;





		$args_horario['lunes'] = $this->lunes;
		$args_horario['martes'] = $this->martes;
		$args_horario['miercoles'] = $this->miercoles;
		$args_horario['jueves'] = $this->jueves;
		$args_horario['viernes'] = $this->viernes;
		$args_horario['sabado'] = $this->sabado;
		$args_horario['domingo'] = $this->domingo;

		$args_horario['desde_lunes'] = $this->desde_lunes;
		$args_horario['desde_martes'] = $this->desde_martes;
		$args_horario['desde_miercoles'] = $this->desde_miercoles;
		$args_horario['desde_jueves'] = $this->desde_jueves;
		$args_horario['desde_viernes'] = $this->desde_viernes;
		$args_horario['desde_sabado'] = $this->desde_sabado;
		$args_horario['desde_domingo'] = $this->desde_domingo;

		$args_horario['hasta_lunes'] = $this->hasta_lunes;
		$args_horario['hasta_martes'] = $this->hasta_martes;
		$args_horario['hasta_miercoles'] = $this->hasta_miercoles;
		$args_horario['hasta_jueves'] = $this->hasta_jueves;
		$args_horario['hasta_viernes'] = $this->hasta_viernes;
		$args_horario['hasta_sabado'] = $this->hasta_sabado;
		$args_horario['hasta_domingo'] = $this->hasta_domingo;





		if (!empty($_FILES['imagen']['name'])) {


			$this->imagenes = cargar_imagenes('imagen', $this->serverpath . $this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if (@$this->imagenes[0]->file_name != NULL) {

				$args['imagen'] = $this->imagenes[0]->file_name;
			}
		};

		if (!empty($_FILES['imagen_menu']['name'])) {


			$this->imagenes_menu = cargar_imagenes('imagen_menu', $this->serverpath . $this->ruta_imagen, $this->separador_imagen);
			$this->imagenes_menu[] = json_encode($this->imagenes_menu, JSON_FORCE_OBJECT);

			if (@$this->imagenes_menu[0]->file_name != NULL) {

				$args['imagen_menu'] = $this->imagenes_menu[0]->file_name;
			}
		};



		$this->nuevo_proveedor = $this->database->insert($this->tabla, $args);

		$this->id_proveedor = $this->database->id();

		$args_horario['id_proveedor'] = $this->id_proveedor;

		$this->nuevo_proveedor_horario = $this->database->insert('in_horarios', $args_horario);
	}


	function publicar()
	{


		$args = array();


		$args['nombre'] = $this->nombre;
		$args['slug'] = $this->slug;
		$args['domicilio'] = $this->domicilio;
		$args['colonia'] = $this->colonia;
		$args['estado'] = $this->estado;
		$args['telefono'] = $this->telefono;
		$args['whatsapp'] = $this->whatsapp;
		$args['lada_whatsapp'] = $this->lada_whatsapp;
		$args['pagina'] = $this->pagina;
		$args['descripcion'] = $this->descripcion;
		$args['longitud'] = $this->longitud;
		$args['latitud'] = $this->latitud;
		$args['id_categoria'] = $this->id_categoria;
		$args['youtube'] = $this->youtube;
		$args['tiktok'] = $this->tiktok;
		$args['facebook'] = $this->facebook;
		$args['instagram'] = $this->instagram;
		$args['mostrar'] = $this->mostrar;
		$args['activo'] = 0;





		$args_horario['lunes'] = $this->lunes;
		$args_horario['martes'] = $this->martes;
		$args_horario['miercoles'] = $this->miercoles;
		$args_horario['jueves'] = $this->jueves;
		$args_horario['viernes'] = $this->viernes;
		$args_horario['sabado'] = $this->sabado;
		$args_horario['domingo'] = $this->domingo;

		$args_horario['desde_lunes'] = $this->desde_lunes;
		$args_horario['desde_martes'] = $this->desde_martes;
		$args_horario['desde_miercoles'] = $this->desde_miercoles;
		$args_horario['desde_jueves'] = $this->desde_jueves;
		$args_horario['desde_viernes'] = $this->desde_viernes;
		$args_horario['desde_sabado'] = $this->desde_sabado;
		$args_horario['desde_domingo'] = $this->desde_domingo;

		$args_horario['hasta_lunes'] = $this->hasta_lunes;
		$args_horario['hasta_martes'] = $this->hasta_martes;
		$args_horario['hasta_miercoles'] = $this->hasta_miercoles;
		$args_horario['hasta_jueves'] = $this->hasta_jueves;
		$args_horario['hasta_viernes'] = $this->hasta_viernes;
		$args_horario['hasta_sabado'] = $this->hasta_sabado;
		$args_horario['hasta_domingo'] = $this->hasta_domingo;



		$this->nuevo_proveedor = $this->database->insert($this->tabla, $args);

		$this->id_proveedor = $this->database->id();

		$args_horario['id_proveedor'] = $this->id_proveedor;

		$this->nuevo_proveedor_horario = $this->database->insert('in_horarios', $args_horario);
	}


	function editar($id)
	{


		$args = array();

		$args['nombre'] = $this->nombre;
		$args['slug'] = $this->slug;
		$args['domicilio'] = $this->domicilio;
		$args['colonia'] = $this->colonia;
		$args['estado'] = $this->estado;
		$args['telefono'] = $this->telefono;
		$args['whatsapp'] = $this->whatsapp;
		$args['lada_whatsapp'] = $this->lada_whatsapp;
		$args['pagina'] = $this->pagina;
		$args['descripcion'] = $this->descripcion;
		$args['longitud'] = $this->longitud;
		$args['latitud'] = $this->latitud;
		$args['id_categoria'] = $this->id_categoria;
		$args['youtube'] = $this->youtube;
		$args['tiktok'] = $this->tiktok;
		$args['facebook'] = $this->facebook;
		$args['instagram'] = $this->instagram;
		$args['mostrar'] = $this->mostrar;
		$args['activo'] = $this->activo;



		$args_horario['lunes'] = $this->lunes;
		$args_horario['martes'] = $this->martes;
		$args_horario['miercoles'] = $this->miercoles;
		$args_horario['jueves'] = $this->jueves;
		$args_horario['viernes'] = $this->viernes;
		$args_horario['sabado'] = $this->sabado;
		$args_horario['domingo'] = $this->domingo;

		$args_horario['desde_lunes'] = $this->desde_lunes;
		$args_horario['desde_martes'] = $this->desde_martes;
		$args_horario['desde_miercoles'] = $this->desde_miercoles;
		$args_horario['desde_jueves'] = $this->desde_jueves;
		$args_horario['desde_viernes'] = $this->desde_viernes;
		$args_horario['desde_sabado'] = $this->desde_sabado;
		$args_horario['desde_domingo'] = $this->desde_domingo;

		$args_horario['hasta_lunes'] = $this->hasta_lunes;
		$args_horario['hasta_martes'] = $this->hasta_martes;
		$args_horario['hasta_miercoles'] = $this->hasta_miercoles;
		$args_horario['hasta_jueves'] = $this->hasta_jueves;
		$args_horario['hasta_viernes'] = $this->hasta_viernes;
		$args_horario['hasta_sabado'] = $this->hasta_sabado;
		$args_horario['hasta_domingo'] = $this->hasta_domingo;




		if (!empty($_FILES['imagen']['name'])) {

			$this->imagenes = cargar_imagenes('imagen', $this->serverpath . $this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if (@$this->imagenes[0]->file_name != NULL) {

				$args['imagen'] = $this->imagenes[0]->file_name;

				@unlink($this->serverpath . $this->ruta_imagen . $this->imagen_actual);
			}
		};


		if (!empty($_FILES['imagen_menu']['name'])) {

			$this->imagenes_menu = cargar_imagenes('imagen_menu', $this->serverpath . $this->ruta_imagen, $this->separador_imagen);
			$this->imagenes_menu[] = json_encode($this->imagenes_menu, JSON_FORCE_OBJECT);

			if (@$this->imagenes_menu[0]->file_name != NULL) {

				$args['imagen_menu'] = $this->imagenes_menu[0]->file_name;

				@unlink($this->serverpath . $this->ruta_imagen . $this->imagen_menu_actual);
			}
		};


		$this->editar_proveedor = $this->database->update(
			$this->tabla,
			$args,
			[
				'id' => $id,
			]
		);


		$this->proveedor_horario_actual = $this->database->get('in_horarios', 'id', [
			'id_proveedor' => $id,
		]);


		if ($this->proveedor_horario_actual) {


			$this->editar_horario_proveedor = $this->database->update(
				'in_horarios',
				$args_horario,
				[
					'id_proveedor' => $id,
				]
			);
		} else {

			$args_horario['id_proveedor'] = $id;

			$this->nuevo_proveedor_horario = $this->database->insert('in_horarios', $args_horario);
		}
	}

	function eliminar($id)
	{


		$this->imagen_actual = $this->database->get($this->tabla, 'imagen', [
			'id' => $id,
		]);

		$this->imagen_menu_actual = $this->database->get($this->tabla, 'imagen_menu', [
			'id' => $id,
		]);

		$this->eliminar_proveedor = $this->database->delete($this->tabla, [
			"id" => $id
		]);


		$this->eliminar_proveedor_horario = $this->database->delete('in_horarios', [
			"id_proveedor" => $id
		]);

		@unlink($this->serverpath . $this->ruta_imagen . $this->imagen_actual);
		@unlink($this->serverpath . $this->ruta_imagen . $this->imagen_menu_actual);
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
