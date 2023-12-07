<?php
class Productos
{
	
	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_productos = ['id' => 'DESC'];
		$this->tabla = 'in_productos';
		$this->carpeta_vistas = 'productos';


		$this->ruta_imagen = '/imagenes/productos/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;



		( isset($_POST['id']) ) ? $this->id = $_POST['id'] : $this->id = '';
		( isset($_POST['id_proveedor']) ) ? $this->id_proveedor = $_POST['id_proveedor'] : $this->id_proveedor = '';
      ( isset($_POST['id_categoria_producto']) ) ? $this->id_categoria_producto = $_POST['id_categoria_producto'] : $this->id_categoria_producto = '';
		( isset($_POST['nombre']) ) ? $this->nombre = $_POST['nombre'] : $this->nombre = '';
      ( isset($_POST['descripcion']) ) ? $this->descripcion = $_POST['descripcion'] : $this->descripcion = '';
      ( isset($_POST['precio']) ) ? $this->precio = $_POST['precio'] : $this->precio = '';
		( isset($_POST['orden']) ) ? $this->orden = $_POST['orden'] : $this->orden = 0;


		( isset($_POST['imagen_actual']) ) ? $this->imagen_actual = $_POST['imagen_actual'] : $this->imagen_actual = '';

		if( !empty( $_FILES['imagen']['name'] ) ){
			$this->imagen = $_FILES['imagen']['name'];
		};


	}

	function ver_producto($id){
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


			$this->productos = $this->database->select( $this->tabla , "*",
				[
               'id_proveedor' => $data['id_proveedor'],
               'id_categoria_producto' => $data['id_categoria'],
					'ORDER' => $this->orden_productos,
					'LIMIT'=> [$this->pagina_actual, $this->por_pagina]
				]
			);


			$this->numero_productos = $this->database->count( $this->tabla );


		}else{


			$this->productos = $this->database->select( $this->tabla , "*",[
            'id_proveedor' => $data['id_proveedor'],
            'id_categoria_producto' => $data['id_categoria'],
				'ORDER' => $this->orden_productos
			]);

		}

		if(!empty($data['id'])){
			$this->producto = $this->database->get( $this->tabla , "*",[
					'id' => $data['id'],
				]
			);

			$this->producto = (object)$this->producto;

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

	function nuevo(){ 

		$this->error = FALSE;

		$args = array();

		$args['id_proveedor'] = $this->id_proveedor;
		$args['id_categoria_producto'] = $this->id_categoria_producto;
		$args['nombre'] = $this->nombre;
		$args['descripcion'] = $this->descripcion;
		$args['precio'] = $this->precio;
      
		$args['orden'] = $this->orden;



		if( !empty( $_FILES['imagen']['name'] ) ){

			
			
			$this->imagenes = cargar_imagenes('imagen', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if(@$this->imagenes[0]->file_name != NULL){			
			
				$args['imagen'] = $this->imagenes[0]->file_name;
			
			}
			
			
		};


		$this->nuevo_producto = $this->database->insert( $this->tabla , $args );

		if($this->nuevo_producto->rowCount() != 0){

			$this->id_producto = $this->database->id();

		}else{
			$this->error = TRUE;
		}

	}

	function editar($id){


		$args = array();

		$args['id_proveedor'] = $this->id_proveedor;
		$args['id_categoria_producto'] = $this->id_categoria_producto;
		$args['nombre'] = $this->nombre;
		$args['descripcion'] = $this->descripcion;
		$args['precio'] = $this->precio;
		$args['orden'] = $this->orden;

		if( !empty( $_FILES['imagen']['name'] ) ){

			$this->imagenes = cargar_imagenes('imagen', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if(@$this->imagenes[0]->file_name != NULL){			
			
				$args['imagen'] = $this->imagenes[0]->file_name;

				@unlink( $this->serverpath.$this->ruta_imagen.$this->imagen_actual );
			
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

	  @unlink( $this->serverpath.$this->ruta_imagen.$this->imagen_actual );
	  
	}




	function mensaje($mensaje = NULL){ 
		$this->mensaje = new Mensajes($mensaje);
		$this->mensaje->ver();
	}

	function __destruct(){
		unset($this->database);
	}

}