<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = '<div style="color: red; class="alert alert-danger" role="alert">
  Ingrese su usuario y su clave
</div>';
    } else {
      require_once "conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
      $query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo,u.usuario,r.idrol,r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE u.usuario = '$user' AND u.clave = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $dato['idusuario'];
        $_SESSION['nombre'] = $dato['nombre'];
        $_SESSION['email'] = $dato['correo'];
        $_SESSION['user'] = $dato['usuario'];
        $_SESSION['rol'] = $dato['idrol'];
        $_SESSION['rol_name'] = $dato['rol'];
        header('location: sistema/');
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
              Usuario o Contraseña Incorrecta
            </div>';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Login</title>
<link href="sistema/view/css/form.css" rel="stylesheet" type="text/css" />
<style>
body {
	font-family: Arial;
	color: #333;
	font-size: 0.95em;
	background-image: url("sistema/view/images/bg.jpg");
}
</style>
</head>
<!--Eu manito-->
<body>

  <div class="login-form-container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <img src="sistema/img/logoLogin.jpg" class="img-thumbnail">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">BIENVENIDO</h1>
                  </div>
                  <form class="user" method="POST">
                    <?php echo isset($alert) ? $alert : ""; ?>
                    <div class="field-column">
                      <div>
                        <label for="username">Usuario</label><span id="user_info"
                          class="error-info"></span>
                      </div>
                      <div>
                        <input name="usuario" id="usuario" type="text"
                          class="demo-input-box" placeholder="Ingresa tu Usuario">
                      </div>
                    </div>
                      <div class="field-column">
                        <div>
                          <label for="password">Contraseña</label><span id="password_info"
                            class="error-info"></span>
                        </div>
                        <div>
                          <input name="clave" id="password" type="password"
                            class="demo-input-box" placeholder="Ingresa tu Contraseña">
                        </div>
                      </div>
                    
                    <div class=field-column>
                      <div>
                        <input type="submit" name="login" value="Iniciar Sesion" class="btnLogin"></span>
                      </div>
                    </div>
                    <div class="form-nav-row">
                      <a href="#" class="form-link">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="login-row form-nav-row">
                      <a href="https://www.facebook.com/licoreriaAlvarezlurin"><img src="sistema/img/icon-facebook.png"
                        class="signup-icon" /></a><a href="#"><img
                        src="sistema/img/icon-twitter.png" class="signup-icon" /></a><a
                        href="#"><img src="sistema/img/icon-linkedin.png"
                        class="signup-icon" /></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- JavaScript files-->
    <script src="sistema/vendor/jquery/jquery.min.js"></script>
    <script src="sistema/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="sistema/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="sistema/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="sistema/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="sistema/js/front.js"></script>


</body>

</html>

