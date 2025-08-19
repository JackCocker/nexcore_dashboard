<?php
session_start(); // 👈 agregado para manejar la sesión

if (empty($_POST['email_php'])) {
  echo 'error_1';
} else {
  require_once('../model/recuperar.php');
  $recuperar = new Recuperar();
  $respuesta = $recuperar->enviarCodigo($_POST['email_php']);

  if ($respuesta['status'] == 'error') {
    echo 'error_mail';
  } else {
    // 👇 guardamos el email en la sesión para usarlo después
    $_SESSION['reset_email'] = $_POST['email_php'];

    // si enviarCodigo devuelve el código, también puedes guardarlo
    if (isset($respuesta['code'])) {
      $_SESSION['reset_code'] = $respuesta['code'];
    }

    echo 'success_mail';
  }
}
