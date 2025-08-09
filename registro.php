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
  <title>Nexcore | Sign up</title>

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
              <input type="text" class="form-control" name="name" placeholder="Username">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Email</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
              <input type="text" class="form-control" name="email" placeholder="Email">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="text" autocomplete="off" class="form-control" name="clave" placeholder="Password">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Verificar contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="text" autocomplete="off" class="form-control" name="clave2" placeholder="Confirm password">
            </div>

            <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->

            <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
            <button type="button" class="btn btn-login btn-block" id="registro">Registrate</button>

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