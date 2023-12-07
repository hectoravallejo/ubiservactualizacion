<?php
class Mensajes
{

	function __construct($mensaje)
	{
		$this->mensaje = $mensaje;
	}


	function ver($mensaje = NULL){ 

		if($this->mensaje!=NULL){

			$this->tipo = NULL;
			
			switch ($this->mensaje) {
			    case 'usuario-nuevo':
			    	$this->mensaje = 'Se ha creado un nuevo usuario.';
			    break;
			    case 'usuario-editado':
			    	$this->mensaje = 'Tu usuario se ha editado con éxito.';
			    break;
			    case 'usuario-eliminado':
			    	$this->mensaje = 'El usuario que selecionaste ha sido eliminado permanentemente.';
			    break;
			    case 'error-usuario':
			    	$this->mensaje = '<b>¡HUBO UN ERROR!</b> <br>Recuerda que no puede haber dos usuarios con el mismo <b>"NOMBRE"</b>o <b>"CORREO"</b>.';
			    break;
			    case 'cotizacion-nueva':
			    	$this->mensaje = 'Se ha creado un nueva cotización.';
			    break;
			    case 'cotizacion-editada':
			    	$this->mensaje = 'Tu cotización se ha editado con éxito.';
			    break;
			    case 'cotizacion-eliminada':
			    	$this->mensaje = 'La cotización que selecionaste ha sido eliminada permanentemente.';
			    break;
			    case 'error-cotizacion':
			    	$this->mensaje = '<b>¡HUBO UN ERROR!</b> <br>Recuerda que no puede haber dos cotizaciones con la misma <b>"URL"</b>.';
			    break;
			    case 'componente-nuevo':
			    	$this->mensaje = 'Se ha creado un nuevo componente.';
			    break;
			    case 'componente-editado':
			    	$this->mensaje = 'Tu componente se ha editado con éxito.';
			    break;
			    case 'componente-eliminado':
			    	$this->mensaje = 'El componente que selecionaste ha sido eliminado permanentemente.';
			    break;
			    case 'componentes-ordenados':
			    	$this->mensaje = 'El orden de los componenetes han sido cambiados.';
			    break;
			    case 'opcion-nueva':
			    	$this->mensaje = 'Se ha creado una nueva opción.';
			    break;
			    case 'opcion-editada':
			    	$this->mensaje = 'Tu opción se ha editado con éxito.';
			    break;
			    case 'opcion-eliminada':
			    	$this->mensaje = 'La opción que selecionaste ha sido eliminada permanentemente.';
			    break;
			    case 'opciones-ordenadas':
			    	$this->mensaje = 'El orden de las opciones han sido cambiadas.';
			    break;
			    case 'mail-enviado':
			    	$this->mensaje = 'El correo con la cotización se ha enviado con éxito, "no olvides revisar la bandeja de correo no deseado".';
			    break;
			    case 'mail-no-enviado':
			    	$this->mensaje = 'Ha ocurrido un error por favor intentalo más tarde.';
			    break;
			    case 'seccion-editada':
			    	$this->mensaje = 'Se han editado con éxito los datos de la página.';
			    break;			    
			} ?>

			<?php 

				switch ($this->tipo) {
					case 'error':
						$this->icon = 'fa fa-close';
						$this->type = 'danger';
						break;
					
					default:
							$this->icon = 'fa fa-check';
							$this->type = 'info';
						break;
				}

			?>

		  <script>

		      $('body').ready(function(){
		        $.notify({
		          title: "",
		          message: "<?= $this->mensaje; ?>",
		          icon: '<?= $this->icon ?>' 
		        },{
		          type: "<?= $this->type ?>"
		        });
		      });

		  </script>

		<?php }

	}

	function __destruct(){
		unset($this->database);
	}

}