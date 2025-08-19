<?php
require_once('conexion.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

class Recuperar extends Conexion
{
    public function enviarCodigo($email)
    {
        parent::conectar();
        $email = parent::salvar($email);

        // Verificamos si existe el usuario
        $consulta = 'SELECT id FROM usuarios WHERE email="' . $email . '" LIMIT 1';
        $usuario = parent::consultaArreglo($consulta);

        if (!$usuario) {
            return ["status" => "error", "message" => "El correo no está registrado"];
        }

        // Generamos código y vencimiento
        $code = rand(100000, 999999);
        $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        // Guardamos en la BD
        $update = 'UPDATE usuarios SET reset_code="' . $code . '", reset_expires="' . $expires . '" WHERE email="' . $email . '"';
        parent::query($update);

        $templatePath = '../template/recuperar.html';
        $template = file_get_contents($templatePath);
        $template = str_replace(
            ['{{code}}'],
            [htmlspecialchars($code)],
            $template
        );
        // Enviamos correo con PHPMailer
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.nexcoreprotect.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contacto@nexcoreprotect.com';
            $mail->Password = 'Nexc0r3pr0tect';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('contacto@nexcoreprotect.com', 'Nexcore Security');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Password Reset Code - Nexcore";
            $mail->Body = $template;
            $mail->AltBody = "This is your code to reset your password $code";

            $mail->send();

            return ["status" => "success", "message" => "A code has been sent to your email address"];
        } catch (Exception $e) {
            return ["status" => "error", "message" => "Error sending email: {$mail->ErrorInfo}"];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $recuperar = new Recuperar();
    echo json_encode($recuperar->enviarCodigo($email));
}
?>