<?php 


require("class.phpmailer.php");
require("class.smtp.php");
if($_POST){
	
$nombre = "Contacto desde Pagina CEMEC de ".$_POST["name"];
$email = $_POST["email"];


$mensaje ="Contacto de ".$_POST["name"]."<br>";
$mensaje .=$_POST["email"]."<br>"; 
$mensaje .=$_POST["message"]."<br>"; 
$mensajeif ="Mensaje Enviado con Exito"; 
	
	   
	}

else{
		
$nombre = "";
$email = "";




$mensaje =""; 
$mensajeif =""; 

}



?>





<?php
/**
 * @version 1.0
 */


// Valores enviados desde el formulario

    



// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1501534.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "no-reply@c1501534.ferozo.com";  // Mi cuenta de correo
$smtpClave = "MAk10WBqkP";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = $email;

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

$mail->Subject = "Contacto desde Pagina"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Contacto desde Pagina <br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Mulier"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 

?>
<script type="text/javascript">
	window.location.href='index.html';
</script>