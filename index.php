<?php

/*
  En ocasiones el usuario puede volver al login
  aun si ya existe una sesion iniciada, lo correcto
  es no mostrar otra ves el login sino redireccionarlo
  a su pagina principal mientras exista una sesion entonces
  creamos un archivo que controle el redireccionamiento
*/

session_start();

// isset verifica si existe una variable o eso creo xd
if (isset($_SESSION['id'])) {
  header('location: controller/redirec.php');
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nexcore | Sign in</title>

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
        <h2 class="login-title">Sign in</h2>
      </div>

      <fieldset>
        <div class="form-group">
          <label class="sr-only" for="user">Usuario</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" id="user" placeholder="Username or email address">
          </div>
        </div>

        <!-- Contraseña -->
        <div class="form-group">
          <label class="sr-only" for="clave">Contraseña</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" autocomplete="off" class="form-control" id="clave"
              placeholder="Password">
            <span class="input-group-addon" onmousedown="mostrarClave()" onmouseup="ocultarClave()"
              onmouseleave="ocultarClave()">
              <i class="fa fa-eye" id="ojo"></i>
            </span>
          </div>
        </div>

        <!-- Cargando -->
        <div class="row" id="load" hidden="hidden">
          <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5 text-center">
            <img src="img/load.gif" width="100%" alt="">
          </div>
          <div class="col-xs-12 center text-accent text-center">
            <span>Validando información...</span>
          </div>
        </div>

        <!-- Botón login -->
        <button type="button" class="btn btn-login btn-block" id="login">Sign in</button>

        <!-- Registro -->
        <div class="text-center register-link">
          <p>New to Nexcore? <a href="registro.php">Create an account</a></p>
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