<?php

# Incluimos la clase conexion para poder heredar los metodos de ella.
require_once('conexion.php');

class Usuario extends Conexion
{
  public function login($user, $clave)
  {
    # Conectamos a la base de datos
    parent::conectar();

    // Escapamos caracteres peligrosos
    $user = parent::salvar($user);
    $clave = parent::salvar($clave);

    // Traemos al usuario por email o nombre
    $consulta = 'SELECT id, nombre, cargo, clave
                     FROM usuarios
                     WHERE email="' . $user . '" OR nombre="' . $user . '"
                     LIMIT 1';

    $datosUsuario = parent::consultaArreglo($consulta);

    // Verificamos la contraseña usando password_verify()
    if ($datosUsuario && password_verify($clave, $datosUsuario['clave'])) {

      // Rehash si el algoritmo/cost cambia
      if (password_needs_rehash($datosUsuario['clave'], PASSWORD_DEFAULT)) {
        $nuevoHash = password_hash($clave, PASSWORD_DEFAULT);
        $nuevoHash = parent::salvar($nuevoHash);
        parent::query('UPDATE usuarios SET clave="' . $nuevoHash . '" WHERE id=' . intval($datosUsuario['id']));
      }

      // Iniciamos sesión
      session_start();
      $_SESSION['id'] = $datosUsuario['id'];
      $_SESSION['nombre'] = $datosUsuario['nombre'];
      $_SESSION['cargo'] = $datosUsuario['cargo'];

      // Redirección según cargo
      if ($_SESSION['cargo'] == 1) {
        echo 'view/admin/index.php';
      } else if ($_SESSION['cargo'] == 2) {
        echo 'view/user/index.php';
      }
    } else {
      // Usuario o contraseña incorrectos
      echo 'error_2';
    }

    parent::cerrar();
  }

  public function registroUsuario($name, $email, $clave)
  {
    parent::conectar();

    // Escapamos caracteres y filtramos acentos
    $name = parent::filtrar($name);
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

    // Generar hash seguro para la contraseña
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $hash = parent::salvar($hash);

    // Insertamos el usuario con hash
    parent::query('INSERT INTO usuarios(nombre, email, clave, cargo)
                       VALUES("' . $name . '", "' . $email . '", "' . $hash . '", 2)');

    // Iniciamos sesión
    session_start();
    $_SESSION['nombre'] = $name;
    $_SESSION['cargo'] = 2;

    echo 'view/user/index.php';

    parent::cerrar();
  }
}
