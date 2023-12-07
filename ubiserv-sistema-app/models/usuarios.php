<?php
class Usuarios
{
	
	private $database;


	public function __construct($database, $path, $serverpath)
	{


		$this->database = $database;
		$this->path = $path;
		$this->serverpath = $serverpath;
		$this->orden_usuarios = ['id' => 'DESC'];
		$this->tabla = 'in_usuarios';
		$this->carpeta_vistas = 'usuarios';


		$this->ruta_imagen = '/imagenes/usuarios/';
		$this->ancho_imagen = 160;
		$this->alto_imagen = 160;
		$this->metodo_recorte_imagen = 'crop';
		$this->separador_imagen = '-';

		$this->pagina_actual = 0;
		$this->por_pagina = 10;

		( isset($_POST['id']) ) ? $this->id = $_POST['id'] : $this->id = '';
		( isset($_POST['email']) ) ? $this->email = $_POST['email'] : $this->email = '';
		( isset($_POST['clave']) ) ? $this->clave = $_POST['clave'] : $this->clave = '';

		( isset($_POST['tipo_usuario']) ) ? $this->tipo_usuario = $_POST['tipo_usuario'] : $this->tipo_usuario = '';

		// ( isset($_POST['Basic']) ) ? $this->Basic = $_POST['Basic'] : $this->Basic = '';
		// ( isset($_POST['Medium']) ) ? $this->Medium = $_POST['Medium'] : $this->Medium = '';
		// ( isset($_POST['Advanced']) ) ? $this->Advanced = $_POST['Advanced'] : $this->Advanced = '';
		// ( isset($_POST['Premium']) ) ? $this->Premium = $_POST['Premium'] : $this->Premium = '';





	}

	function ver_usuario($id){
		$this->usuario_actual = $this->database->get( $this->tabla , [
			"id",
			"email",
			"tipo_usuario"
			],[
				'id' => $id,
			]
		);

		$this->usuario_actual = (object)$this->usuario_actual;

		return $this->usuario_actual;
	}

	function agregar_vistas($data = array()){	
		$this->vistas = $data;
		return $this->vistas;
	}

	function ver($tipo = 'frontend', $data = array()){ 


		( $this->pagina_actual == NULL ) ? $this->pagina_actual = 0 : $this->pagina_actual = $this->pagina_actual - 1;



		$this->pagina_actual = $this->pagina_actual * $this->por_pagina;



		if(isset($data['paginacion'])){


			$this->usuarios = $this->database->select( $this->tabla , [
				"id",
				"email",
				"tipo_usuario"
				],[
				'ORDER' => $this->orden_usuarios,
				'LIMIT'=> [$this->pagina_actual, $this->por_pagina]
			]);


			$this->numero_usuarios = $this->database->count( $this->tabla );


		}else{


			$this->usuarios = $this->database->select( $this->tabla , [
				"id",
				"email",
				"tipo_usuario"
				],[
				'ORDER' => $this->orden_usuarios
			]);

		}

		if(!empty($data['id'])){
			$this->usuario = $this->database->get( $this->tabla , [
				"id",
				"email",
				"tipo_usuario"
				],[
					'id' => $data['id'],
				]
			);

			$this->usuario = (object)$this->usuario;

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

		$args['email'] = $this->email;
		$args['clave'] = md5( $this->clave );
		$args['tipo_usuario'] = $this->tipo_usuario; 


		$this->nuevo_usuario = $this->database->insert( $this->tabla , $args );

		if($this->nuevo_usuario->rowCount() != 0){

			$this->id_usuario = $this->database->id();


		}else{
			$this->error = TRUE;
		}

	}

	function editar($id){

		$args = array();

		$args['email'] = $this->email;
		$args['tipo_usuario'] = $this->tipo_usuario; 


		if($this->clave != ''){
			$args['clave'] = md5( $this->clave ); 
		}


		$this->editar_usuario = $this->database->update( $this->tabla , $args ,[
			'id' => $id,
			]
		);




	}

	function eliminar($id){ 

		$this->eliminar_usuario = $this->database->delete( $this->tabla ,[ 
	   		"id" => $id
	  ]);

	}




	function mensaje($mensaje = NULL){ 
		$this->mensaje = new Mensajes($mensaje);
		$this->mensaje->ver();
	}

	function __destruct(){
		unset($this->database);
	}

}