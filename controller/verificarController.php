<?php
if (empty($_POST['email_php']) || empty($_POST['code_php'])) {
  echo 'error_1';
} else {
  require_once('../model/verificar.php');
  $verificar = new Verificar();
  $respuesta = $verificar->validarCodigo($_POST['email_php'], $_POST['code_php']);

  if ($respuesta['status'] == 'error') {
    echo 'error_code';
  } else {
    echo 'success_code';
  }
}
