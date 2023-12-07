<?php
class Paginacion
{

	function __construct($database, $path)
	{

		$this->database = $database;
		$this->path = $path;

		$this->carpeta_vistas = 'paginacion';
	
	}

	function agregar_vistas($data = array()){	
		$this->vistas = $data;
		return $this->vistas;
	}

	function ver($tipo = 'frontend', $data ){


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

	function __destruct(){
		unset($this->database);
	}

}