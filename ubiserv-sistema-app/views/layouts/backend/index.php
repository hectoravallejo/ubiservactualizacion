<?php include('includes/admin-header.php');  ?>

    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img src="<?php echo $path; ?>/img/logo.png">
      </div>


<?php 


  if(isset( $mensaje) ){
    if($mensaje == 'error'){ ?>
      <script>
        alert('Usuario o contraseña incorrectos');
      </script>
    <?php }
  } 

?>

      <div class="login-box">
        <form role="form" method="POST" action="<?php echo $path ?>/admin/administracion" class="login-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ENTRAR</h3>
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" type="text" name="email" placeholder="Email" required autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">CLAVE</label>
            <input class="form-control" type="password" name="clave" placeholder="Password" required>
          </div>
          <!--div class="text-center">
            <a href="<?= $path; ?>/recuperar-clave">Recuperar contraseña</a><br><br>
          </div-->
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ENTRAR</button>
          </div>
        </form>
      </div>
    </section>

  


<?php include('includes/admin-footer.php');  ?>