<?php $paginas =  ceil( $data['numero_registros'] / $data['por_pagina'] ); ?>

  <div class="col-md-6 paginacion">
    <span>Página</span>
    <ul class="list-inline">
      <?php for ($i=0; $i < $paginas ; $i++) {
        $pagina = $i + 1; 
        if(isset($data['parametros'])){
        	$parametros = $data['parametros'];
        }else{
        	$parametros = '';
        }
        echo '<li><a href="'.$this->path.$data['url'].$pagina.$parametros.'">'.str_pad($pagina, 2, 00, STR_PAD_LEFT).'</a></li>';
      } ?>
    </ul>
  </div>