

  <div class="col-md-6 paginacion">
    <ul class="list-inline">
      <?php if( $data['actual'] > 1 ): ?>
        <li class="link-paginacion">
          <a href="<?= $this->path.$data['url'].($data['actual']-1); ?>">
            <i class="fa fa-chevron-left"></i> Anteriores
          </a>
        </li>
      <?php endif; ?>
      <?php if(!empty($data['siguiente'])): ?>
        <li class="link-paginacion">
          <a href="<?= $this->path.$data['url'].($data['actual']+1); ?>">
            Síguientes <i class="fa fa-chevron-right"></i>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </div>