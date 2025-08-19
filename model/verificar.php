<?php
require_once('conexion.php');
session_start();

class Verificar extends Conexion
{
    public function validarCodigo($email, $code)
    {
        parent::conectar();
        $email = parent::salvar($email);
        $code  = parent::salvar($code);

        $consulta = 'SELECT reset_expires FROM usuarios 
                     WHERE email="' . $email . '" AND reset_code="' . $code . '" LIMIT 1';
        $usuario = parent::consultaArreglo($consulta);

        if (!$usuario) {
            return ["status" => "error", "message" => "Invalid code"];
        }

        if (strtotime($usuario['reset_expires']) < time()) {
            return ["status" => "error", "message" => "The code has expired"];
        }

        $_SESSION['reset_email'] = $email;

        return ["status" => "success", "message" => "Valid code"];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $code  = $_POST['code'];

    $verificar = new Verificar();
    echo json_encode($verificar->validarCodigo($email, $code));
}
?>
