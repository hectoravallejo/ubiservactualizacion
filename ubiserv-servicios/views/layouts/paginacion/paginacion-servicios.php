<?php $paginas =  ceil($data['numero_registros'] / $data['por_pagina']); ?>

<div class="container text-right">

    <div>
        <span>Página</span>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 0; $i < $paginas; $i++) {
                    $pagina = $i + 1;
                    if (isset($data['parametros'])) {
                        $parametros = $data['parametros'];
                    } else {
                        $parametros = '';
                    }
                    echo '<li class="page-item"><a class="page-link"     href="' . $this->path . $data['url'] . $pagina . $parametros . '">' . str_pad($pagina, 2, 00, STR_PAD_LEFT) . '</a></li>';
                } ?>
            </ul>
        </nav>
    </div>
</div>