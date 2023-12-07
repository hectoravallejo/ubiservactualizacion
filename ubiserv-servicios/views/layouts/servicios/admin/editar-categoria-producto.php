<?php include('includes/seguridad.php');
include('includes/header.php');  ?>

<div class="pagina-servicios-admin">

  <?php $categorias_productos->ver(NULL, array('id' => $id_categoria, 'id_proveedor' => $id_proveedor)) ?>

  <div class="row">
    <div class="container">
      <div class="col-md-11 centrado">

        <a href="<?= $path; ?>/../servicios/menu/<?= $data['id_proveedor']; ?>" class="btn btn-danger"><i class="fa fa-angle-left"></i> Categorías</a>
        <hr>

        <form action="<?= $categorias_productos->path . '/../servicios/categorias-productos/editar/' . $categorias_productos->categoria->id; ?>" enctype="multipart/form-data" method="POST" class="col-md-12 no-padding">

          <table class="tabla">
            <thead>
              <tr>
                <th colspan="2">Agregar categoria</th>
              </tr>
            </thead>


            <tr>
              <td class="etiqueta">Nombre</td>
              <td>
                <input type="hidden" name="id_proveedor" value="<?= $data['id_proveedor']; ?>">
                <input class="input-tabla" type="text" value="<?= $categorias_productos->categoria->nombre; ?>" name="nombre" required>
              </td>
            </tr>

            <tr class="par">
              <td class="etiqueta">Orden</td>
              <td><input type="number" class="input-tabla numeros" min="0" value="<?= $categorias_productos->categoria->orden; ?>" name="orden" required></td>
            </tr>

            <tr>
              <td class="etiqueta">Imagen</td>

              <td>

                <div class="col-md-6">
                  <input type="file" name="imagen[]">
                  <input type="hidden" name="imagen_actual" value="<?= $categorias_productos->categoria->imagen; ?>">
                </div>

                <div class="col-md-6">

                  <div class="col-md-4 col-md-offset-4">
                    <img src="<?= $categorias_productos->path . $categorias_productos->ruta_imagen . $categorias_productos->categoria->imagen; ?>" class="img-responsive">
                  </div>

                </div>


              </td>
            </tr>


          </table>

          <div class="col-md-6 pull-right">
            <button type="submit" class="btn-nuevo">Editar categoria</a>
          </div>

        </form>

      </div>
    </div>
  </div>



</div>


<?php include('includes/footer.php');  ?>