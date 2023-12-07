<?php
class Permisos
{

	function __construct($id_usuario, $tipo_usuario, $nombre_usuario)
	{
		$this->id_usuario = $id_usuario;
		$this->tipo_usuario = $tipo_usuario;
		$this->nombre_usuario = $nombre_usuario;
	}

	function tipo_usuario( $usuarios_autorizados ){
		foreach ($usuarios_autorizados as $usuario_autorizado) {
			if($this->tipo_usuario == $usuario_autorizado){
				return true;
			}
		}
	}

	function denegado(){ ?>

		<div class="text-center">
			<h1>Acceso Denegado</h1>
			<p>No tienes los permisos necesarios para accesar a esta sección</p>
		</div>

	<?php }

	function __destruct(){
		unset($this->database);
	}

}