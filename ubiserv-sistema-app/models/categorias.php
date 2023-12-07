<?php
class Categorias
{
	
	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_categorias = ['id' => 'DESC'];
		$this->tabla = 'in_categorias';
		$this->carpeta_vistas = 'categorias';


		$this->ruta_imagen = '/imagenes/categorias/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;



		( isset($_POST['id']) ) ? $this->id = $_POST['id'] : $this->id = '';
		( isset($_POST['nombre']) ) ? $this->nombre = $_POST['nombre'] : $this->nombre = '';
		( isset($_POST['imagen_actual']) ) ? $this->imagen_actual = $_POST['imagen_actual'] : $this->imagen_actual = '';
		( isset($_POST['restaurante']) ) ? $this->restaurante = $_POST['restaurante'] : $this->restaurante = '';
		( isset($_POST['orden']) ) ? $this->orden = $_POST['orden'] : $this->orden = 0;


		if( !empty( $_FILES['imagen']['name'] ) ){
			$this->imagen = $_FILES['imagen']['name'];
		};


	}

	function ver_categoria($id){
		$this->categoria_actual = $this->database->get( $this->tabla , '*',[
				'id' => $id,
			]
		);

		$this->categoria_actual = (object)$this->categoria_actual;

		return $this->categoria_actual;
	}

	function agregar_vistas($data = array()){	
		$this->vistas = $data;
		return $this->vistas;
	}

	function ver($tipo = 'frontend', $data = array()){ 


		( $this->pagina_actual == NULL ) ? $this->pagina_actual = 0 : $this->pagina_actual = $this->pagina_actual - 1;



		$this->pagina_actual = $this->pagina_actual * $this->por_pagina;



		if(isset($data['paginacion'])){


			$this->categorias = $this->database->select( $this->tabla , "*",
				[
					'ORDER' => $this->orden_categorias,
					'LIMIT'=> [$this->pagina_actual, $this->por_pagina]
				]
			);	


			$this->numero_categorias = $this->database->count( $this->tabla );

		}else{


			$this->categorias = $this->database->select( $this->tabla , "*",[
				'ORDER' => $this->orden_categorias,
			]);


		}

		if(!empty($data['id'])){
			$this->categoria = $this->database->get( $this->tabla , "*",[
					'id' => $data['id'],
				]
			);

			$this->categoria = (object)$this->categoria;

		}





		if(isset($this->vistas)){
			foreach ($this->vistas as $area => $vistas) {

				$vistas = explode(',', $vistas);

				foreach ($vistas as $vista) {
					if($tipo == $vista){
						require vista($this->carpeta_vistas,$vista,$area);
					}
				}
			}
		}

	}

	function nueva(){ 

		$this->error = FALSE;

		$args = array();

		$args['nombre'] = $this->nombre;
		$args['orden'] = $this->orden;
		$args['restaurante'] = $this->restaurante;


		if( !empty( $_FILES['imagen']['name'] ) ){

			
			
			$this->imagenes = cargar_imagenes('imagen', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if($this->imagenes[0]->file_name != NULL){			
			
				$args['imagen'] = $this->imagenes[0]->file_name;
			
			}
			
			
		};


		$this->nuevo_categoria = $this->database->insert( $this->tabla , $args );

		if($this->nuevo_categoria->rowCount() != 0){

			$this->id_categoria = $this->database->id();

		}else{
			$this->error = TRUE;
		}

	}

	function editar($id){


		$args = array();

		$args['nombre'] = $this->nombre;
		$args['orden'] = $this->orden;
		$args['restaurante'] = $this->restaurante;

		if( !empty( $_FILES['imagen']['name'] ) ){

			$this->imagenes = cargar_imagenes('imagen', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if(@$this->imagenes[0]->file_name != NULL){			
			
				$args['imagen'] = $this->imagenes[0]->file_name;

				unlink( $this->serverpath.$this->ruta_imagen.$this->imagen_actual );
			
			}

		};

		$this->editar_categoria = $this->database->update( $this->tabla , $args ,[
			'id' => $id,
			]
		);


	}

	function eliminar($id){ 

		$this->imagen_actual = $this->database->get($this->tabla, 'imagen',[
			'id' => $id,
		]);

		$this->eliminar_categoria = $this->database->delete( $this->tabla ,[ 
	   		"id" => $id
	  ]);

	  unlink( $this->serverpath.$this->ruta_imagen.$this->imagen_actual );
	  
	}


	function ver_por_slug($slug){

		$this->categoria = $this->database->get($this->tabla, '*', ['slug' => $slug]);

		$this->categoria = (object)$this->categoria;

	}


	function mensaje($mensaje = NULL){ 
		$this->mensaje = new Mensajes($mensaje);
		$this->mensaje->ver();
	}

	function __destruct(){
		unset($this->database);
	}

}