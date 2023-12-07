<?php
class Ordenar
{

	function __construct( $database, $tabla )
	{
		$this->database = $database;
		$this->tabla = $tabla;
		$this->columna = 'id[!]';
		$this->columna_selector = '0';
	}

	function nuevo_orden($data = array()){
	
		$this->cambiar_orden_componentes = $this->database->get( $this->tabla, "orden",
			[
				$this->columna => $this->columna_selector,
				'ORDER' => ['id' => 'ASC'],
			]
		);

		if( isset($data['columna_extra']) ){

			$this->cambiar_orden_componentes = $this->database->get( $this->tabla, "orden",
				[
					"AND" => [
						$this->columna => $this->columna_selector,
						$data['columna_extra'] => $data['selector_extra'],
					],
					'ORDER' => ['id' => 'ASC'],
				]
			);

		}


		if( $this->cambiar_orden_componentes != 0){
			$this->nuevo_orden = ['orden' => 'ASC'];

			return $this->nuevo_orden;
		}
		
	}

	function cambiar_orden(){

		if(isset($_POST['orden']) ){ $this->orden = $_POST['orden']; }

		$this->orden = explode( ',' , $this->orden );
		
		foreach ($this->orden as $posicion => $id_orden) {

			$posicion = $posicion + 1;

			$this->cambio_orden = $this->database->update( $this->tabla , [
				"orden" => $posicion,
				],[
				'id' => $id_orden,
				]
			);

		}

	}


	function __destruct(){
		unset($this->database);
	}

}