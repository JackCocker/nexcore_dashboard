<?php
if (empty($_POST['password_php'])) {
  echo 'error_1';
} else {
  require_once('../model/restablecer.php');
  $reset = new Restablecer();
  session_start();
  
  if (!isset($_SESSION['reset_email'])) {
    echo 'error_session';
    exit;
  }

  $respuesta = $reset->actualizarClave($_SESSION['reset_email'], $_POST['password_php']);

  if ($respuesta['status'] == 'error') {
    echo 'error_reset';
  } else {
    echo 'success_reset';
  }
}
