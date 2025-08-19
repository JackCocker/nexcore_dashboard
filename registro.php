<?php

session_start();

if (isset($_SESSION['id'])) {
  header('location: controller/redirec.php');
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nexcore | Sign up</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/sweetalert.css">
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

  <!-- Formulario Login -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <!-- Margen superior (css personalizado )-->
        <div class="spacing-1"></div>

        <form id="formulario_registro">
          <!-- Estructura del formulario -->
          <fieldset>

            <div class="text-center">
              <h2 class="login-title" style="color: #fff;">Sign up</h2>
            </div>
            <hr>
            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Nombre</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="name" placeholder="Username" autocomplete="">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para Email -->
            <label class="sr-only" for="email">Email</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
              <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="email">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Contraseña -->
            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password" class="form-control" id="clave" name="clave" placeholder="Password"
                autocomplete="new-password">
              <span class="input-group-addon" onmousedown="mostrarClave(this)" onmouseup="ocultarClave(this)"
                onmouseleave="ocultarClave(this)">
                <i class="fa fa-eye"></i>
              </span>
            </div>

            <div class="spacing-2"></div>

            <!-- Verificar contraseña -->
            <label class="sr-only" for="clave2">Verificar contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Confirm password"
                autocomplete="new-password">
              <span class="input-group-addon" onmousedown="mostrarClave(this)" onmouseup="ocultarClave(this)"
                onmouseleave="ocultarClave(this)">
                <i class="fa fa-eye"></i>
              </span>
            </div>

            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Loading...</span>
              </div>
            </div>

            <!-- boton submit-->
            <button type="button" class="btn btn-login btn-block" id="registro">Submit</button>

          </fieldset>
        </form>
      </div>
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