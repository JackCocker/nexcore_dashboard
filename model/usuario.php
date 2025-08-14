<?php

# Incluimos la clase conexion para poder heredar los metodos de ella.
require_once('conexion.php');


class Usuario extends Conexion
{

  public function login($user, $clave)
  {

    # Nos conectamos a la base de datos
    parent::conectar();

    // El metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que pueden vulnerar nuestra consulta SQL
    $user  = parent::salvar($user);
    $clave = parent::salvar($clave);

    // Si necesitas filtrar las mayusculas y los acentos habilita las lineas 36 y 37 recuerda que en la base de datos debe estar filtrado tambien para una validacion correcta
    /*$user  = parent::filtrar($user);
      $clave = parent::filtrar($clave);*/

    // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
    $consulta = 'SELECT id, nombre, cargo 
                 FROM usuarios 
                 WHERE (email="' . $user . '" OR nombre="' . $user . '") 
                 AND clave = MD5("' . $clave . '")';

    $verificar_usuario = parent::verificarRegistros($consulta);

    // si la consulta es mayor a 0 el usuario existe
    if ($verificar_usuario > 0) {
      $user = parent::consultaArreglo($consulta);

      session_start();
      $_SESSION['id']     = $user['id'];
      $_SESSION['nombre'] = $user['nombre'];
      $_SESSION['cargo']  = $user['cargo'];

      // Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
      if ($_SESSION['cargo'] == 1) {
        echo 'view/admin/index.php';
      } else if ($_SESSION['cargo'] == 2) {
        echo 'view/user/index.php';
      }
    } else {
      // El usuario y la clave son incorrectos
      echo 'error_2';
    }


    # Cerramos la conexion
    parent::cerrar();
  }

  public function registroUsuario($name, $email, $clave)
  {
    parent::conectar();

    $name  = parent::filtrar($name);
    $email = parent::filtrar($email);
    $clave = parent::filtrar($clave);

    // Verificar que el correo no exista
    $verificarCorreo = parent::verificarRegistros('SELECT id FROM usuarios WHERE email="' . $email . '"');
    if ($verificarCorreo > 0) {
      echo 'error_3'; // Email en uso
      parent::cerrar();
      return;
    }

    // Verificar que el nombre de usuario no exista
    $verificarNombre = parent::verificarRegistros('SELECT id FROM usuarios WHERE nombre="' . $name . '"');
    if ($verificarNombre > 0) {
      echo 'error_5'; // Usuario en uso
      parent::cerrar();
      return;
    }

    // Si pasa las validaciones, insertar
    parent::query('INSERT INTO usuarios(nombre, email, clave, cargo) 
                   VALUES("' . $name . '", "' . $email . '", MD5("' . $clave . '"), 2)');

    session_start();
    $_SESSION['nombre'] = $name;
    $_SESSION['cargo']  = 2;

    echo 'view/user/index.php';

    parent::cerrar();
  }
}
