<div class="row menu-admin">
  <div class="container">
    <div class="col-md-3">
      <img src="<?= $path . '/img/logo.png'; ?>" class="logo-menu img-responsive">
    </div>
    <div class="col-md-9">

      <ul id="menu">

        <?php $categorias->ver(NULL) ?>

        <li class="col-md-2 <?= ($menu_actual == 'categorias') ? 'actual' : ''; ?>"><a href="<?= $path; ?>/admin/categorias">Categorías</a></li>

        <li class="col-md-3 <?= ($menu_actual == 'proveedores') ? 'actual' : ''; ?>"><a href="<?= $path; ?>/admin/proveedores">Todos los proveedores</a>

          <ul>
            <?php foreach ($categorias->categorias as $categoria) : ?>
              <?php $categoria = (object)$categoria; ?>
              <li><a href="<?= $path; ?>/admin/proveedores-categoria/<?= $categoria->id; ?>"><?= $categoria->nombre; ?></a></li>
            <?php endforeach; ?>
          </ul>

        </li>

        <li class="col-md-2 <?= ($menu_actual == 'estadisticas') ? 'actual' : ''; ?>"><a href="<?= $path; ?>/admin/estadisticas">Estadisticas</a>
        </li>

        <li class="col-md-2 <?= ($menu_actual == 'imagendestacada') ? 'actual' : ''; ?>"><a href="<?= $path; ?>/admin/imagendestacada">Imagen destacada</a>

        <li class="col-md-2 <?= ($menu_actual == 'autorizaranuncios') ? 'actual' : ''; ?>"><a href="<?= $path; ?>/admin/autorizar-anuncios">Autorizar anuncios</a>


      </ul>


    </div>
  </div>
</div>