<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- AquÃ­ va el tÃ­tulo de la pÃ¡gina -->

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Correo = $_POST['Correo'];
$Mensaje = $_POST['Mensaje'];
$Telefono = $_POST['Telefono'];

if ($Nombre=='' || $Correo=='' || $Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("includes/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = "informes@infrusch.com.mx";    // Correo Electronico para SMTP
    $mail->FromName = $Nombre; 
    $mail->AddAddress("e.loolguin@gmail.com"); // DirecciÃ³n a la que llegaran los mensajes.
   // $mail->AddCC("e.loolguin@gmail.com"); // Dirección CC envio de correo electronico.

// AquÃ­ van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto";
    $mail->Body     =  "Nombre: $Nombre \n<br />".
    "Email: $Correo \n<br />".
    "Tel: $Telefono \n<br />".
    "Mensaje: $Mensaje \n<br />";

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "mail.infrusch.com.mx";  // mail. o solo dominio - Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "informes@infrusch.com.mx";  // Correo ElectrÃ³nico para SMTP
    $mail->Password = "123Informes456$"; // ContraseÃ±a para SMTP

    if ($mail->Send())
    echo "<script>alert('Gracias por enviar sus comentarios, en breve recibirá una respuesta.');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>