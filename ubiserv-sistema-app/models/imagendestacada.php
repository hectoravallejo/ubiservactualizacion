<?php
class ImagenDestacada
{

	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_imagendestacada = ['id' => 'DESC'];
		$this->tabla = 'in_imagendestacada';
		$this->carpeta_vistas = 'imagendestacada';


		$this->ruta_imagen = '/imagenes/imagendestacada/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;



		( isset($_POST['id'])) ? $this->id = $_POST['id'] : $this->id = '';
		( isset($_POST['url']) ) ? $this->url = $_POST['url'] : $this->url = '';
      ( isset($_POST['imagen_actual']) ) ? $this->imagen_actual = $_POST['imagen_actual'] : $this->imagen_actual = '';

      if( !empty( $_FILES['imagen']['name'] ) ){
			$this->imagen = $_FILES['imagen']['name'];
		};

		( isset($_POST['url2']) ) ? $this->url2 = $_POST['url2'] : $this->url2 = '';
      ( isset($_POST['imagen2_actual']) ) ? $this->imagen2_actual = $_POST['imagen2_actual'] : $this->imagen2_actual = '';

      if( !empty( $_FILES['imagen2']['name'] ) ){
			$this->imagen2 = $_FILES['imagen2']['name'];
		};

		( isset($_POST['url3']) ) ? $this->url3 = $_POST['url3'] : $this->url3 = '';
      ( isset($_POST['imagen3_actual']) ) ? $this->imagen3_actual = $_POST['imagen3_actual'] : $this->imagen3_actual = '';

      if( !empty( $_FILES['imagen3']['name'] ) ){
			$this->imagen3 = $_FILES['imagen3']['name'];
		};




	}


	function editar()
	{

		$args = array();

		$args['url'] = $this->url;
		$args['url2'] = $this->url2;
		$args['url3'] = $this->url3;


		if( !empty( $_FILES['imagen']['name'] ) ){

			$this->imagenes = cargar_imagenes('imagen', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if(@$this->imagenes[0]->file_name != NULL){			
			
				$args['imagen'] = $this->imagenes[0]->file_name;

				@unlink( $this->serverpath.$this->ruta_imagen.$this->imagen_actual );
			
			}

		};


		if( !empty( $_FILES['imagen2']['name'] ) ){

			$this->imagenes = cargar_imagenes('imagen2', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if(@$this->imagenes[0]->file_name != NULL){			
			
				$args['imagen2'] = $this->imagenes[0]->file_name;

				@unlink( $this->serverpath.$this->ruta_imagen.$this->imagen2_actual );
			
			}

		};


		if( !empty( $_FILES['imagen3']['name'] ) ){

			$this->imagenes = cargar_imagenes('imagen3', $this->serverpath.$this->ruta_imagen, $this->separador_imagen);
			$this->imagenes[] = json_encode($this->imagenes, JSON_FORCE_OBJECT);

			if(@$this->imagenes[0]->file_name != NULL){			
			
				$args['imagen3'] = $this->imagenes[0]->file_name;

				@unlink( $this->serverpath.$this->ruta_imagen.$this->imagen3_actual );
			
			}

		};


		$this->editar_estadistica = $this->database->update(
			$this->tabla,
			$args,
			[
				'id' => 1,
			]
		);

   }


	function agregar_vistas($data = array()){	
		$this->vistas = $data;
		return $this->vistas;
	}

	function ver($tipo = 'frontend', $data = array()){ 

		if(isset( $data['webservice']) ){

			$this->imagendestacada = $this->database->select( $this->tabla , "*",[
				'id' => 1,
			]);
				
		}else{

			$this->imagendestacada = $this->database->get( $this->tabla , "*",[
				'id' => 1,
			]);
			$this->imagendestacada = (object)$this->imagendestacada;

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
