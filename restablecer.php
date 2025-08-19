<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nexcore | Reset password</title>

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

  <div class="login-container">
    <div class="login-card">
      <div class="text-center">
        <h2 class="login-title">Reset password</h2>
      </div>

      <fieldset>
        <div class="form-group">
          <label class="sr-only" for="password">Password</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="text" class="form-control" id="password" placeholder="Enter new password">
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

        <!-- Botón submit -->
        <button type="button" class="btn btn-login btn-block" id="restablecer">Submit</button>
      </fieldset>
    </div>
  </div>


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