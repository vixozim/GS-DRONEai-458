<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if (  !isset($_POST["email"])  ) {
    die ("Es necesario completar todos los datos del formulario");
}

$email = $_POST["email"];


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2390250.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "no-responder@droneservices.com.ar";  // Mi cuenta de correo
$smtpClave = "w4ZkH@K8zQ";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "daiterina@gmail.com";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

//$mail->Subject = "DonWeb - Ejemplo de formulario de contacto"; // Este es el titulo del email.
//$mensajeHtml = nl2br($mensaje);
//$mail->Body = "{$mensajeHtml} <br /><br />Formulario de ejemplo. By DonWeb<br />"; // Texto del email en formato HTML
//$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML


$mail->Subject = "Drone Ai - Suscripción"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "Email: $email  <br /><br />Drone Ai - Suscripción<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Drone Ai - Suscripción"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    //echo "El correo fue enviado correctamente.";
	header('Location: https://www.droneservices.com.ar/site/gracias-news.html');  
    exit;
} else {
    echo "Ocurrió un error inesperado.";
}
