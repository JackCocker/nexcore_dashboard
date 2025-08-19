<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nexcore | Recover password</title>

  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
  <link rel="stylesheet" href="css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/logo.png" rel="apple-touch-icon">

</head>

<body>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.php" class="logo pull-left">
        <img src="img/long-logo.jpg" alt="">
      </a>
    </div>
  </header>

  <div class="login-container">
    <div class="login-card">
      <div class="text-center">
        <h2 class="login-title">Recover password</h2>
      </div>

      <fieldset>
        <div class="form-group">
          <label class="sr-only" for="email">Email</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Email address" autocomplete="email">
          </div>
        </div>

        <!-- Cargando -->
        <div class="row" id="load" hidden="hidden">
          <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5 text-center">
            <img src="img/load.gif" width="100%" alt="">
          </div>
          <div class="col-xs-12 center text-accent text-center">
            <span>Loading...</span>
          </div>
        </div>

        <!-- Botón login -->
        <button type="button" class="btn btn-login btn-block" id="login">Submit</button>

        <!-- Registro -->
        <div class="text-center register-link info-text">
          <p>Check your email for a verification code to reset your password.</p>
        </div>
      </fieldset>
    </div>
  </div>


  <!-- / Final Formulario login -->

  <!-- Jquery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- SweetAlert js -->
  <script src="js/sweetalert.min.js"></script>
  <!-- Js personalizado -->
  <script src="js/operaciones.js"></script>
</body>

</html>