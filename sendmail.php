<?php

require 'mailer/PHPMailerAutoload.php';

$nombre = $_POST["nombre"];
$empresa = $_POST["empresa"];
$dni = $_POST["dni"];
$provincia = $_POST["provincia"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];


$fromEmail = isset($_POST['email']) ? $_POST['email'] : '';
$fromName = 'Fiorito Website';
$subject = 'Formulario de Contacto .' .date('Y/m/d');
$to = 'info@fioritofactoring.com.ar';
$pageName = 'https://www.fioritofactoring.com.ar/';

$msg = 'Hola, '.$nombre.' envio una consulta a traves del formulario de Fiorito con el mail '.$email.'<br><br>';
$msg .= '**************************************************<br>';
$msg .= "Nombre: ".$nombre."<br>";
$msg .= "Empresa: ".$empresa."<br>";
$msg .= "DNI: ".$dni."<br>";
$msg .= "Provincia: ".$provincia."<br>";
$msg .= "Email: ".$email."<br>";
$msg .= "Teléfono: ".$telefono."<br>";
$msg .= "Mensaje: ".$mensaje."<br>";
$msg .= "Fecha del formulario: ".date("Y/m/d")."<br><br>";

if ($nombre != '' && $email != '' && $telefono != '' && $mensaje != ''){
    $email = new PHPMailer();
    $email->isHTML(true);
    $email->From      = $fromEmail;
    $email->setFrom($fromEmail, utf8_decode($fromName));
    $email->Subject   = $subject;
    $email->Body      = $msg;
    $email->AddAddress( $to );
    // Activo condificacción utf-8
    $email->CharSet = 'UTF-8';

    $email->IsSMTP();
    $email->Host = 'c1580862.ferozo.com';
    $email->Port = '587';
    $email->SMTPAuth = true;
    $email->Username = 'ventas@muvi.com.ar';
    $email->Password = 'Lucasgiacche18';

    $email->Send();

}
    header('Location: gracias.html');


?>
