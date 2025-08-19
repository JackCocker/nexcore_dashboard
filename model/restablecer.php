<?php
require_once('conexion.php');
session_start();

class Restablecer extends Conexion
{
    public function actualizarClave($email, $nuevaClave)
    {
        parent::conectar();
        $email = parent::salvar($email);

        // Validación extra
        if (empty($nuevaClave)) {
            return ["status" => "error", "message" => "Password cannot be empty"];
        }

        $hashed = password_hash($nuevaClave, PASSWORD_DEFAULT);

        $update = 'UPDATE usuarios 
                   SET clave="' . $hashed . '", reset_code=NULL, reset_expires=NULL 
                   WHERE email="' . $email . '"';
        parent::query($update);

        return ["status" => "success", "message" => "Password successfully updated"];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['reset_email'])) {
        echo json_encode(["status" => "error", "message" => "Not authorized"]);
        exit;
    }

    $email = $_SESSION['reset_email'];
    $password = $_POST['password'];

    $reset = new Restablecer();
    $respuesta = $reset->actualizarClave($email, $password);

    unset($_SESSION['reset_email']);
    echo json_encode($respuesta);
}
?>