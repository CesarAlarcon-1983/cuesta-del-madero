<?php

    //Capturando Datos del formulario
    $destino = "info@cuestadelmadero.com.ar";
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    // $telefono = $_POST["telefono"];
    // $archivo = $_FILES["archivo"];
    $consulta = $_POST["consulta"];
    // $producto = $_POST["producto"];


if ($nombre=='' || $email=='' || $consulta==''){

    echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->Username = $email;
    $mail->FromName = $nombre;
    $mail->AddAddress($destino); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo

    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "Contacto";
    $mail->Body = "Nombre: $nombre \n<br />".
        "Email: $email \n<br />".
        "Mensaje: $consulta \n<br />";

    // Datos del servidor SMTP Totalmente necesarios para la salida del correo

    $mail->IsSMTP();
    $mail->Host = "mail.cuestadelmadero.com.ar";  // Servidor de Salida.
    $mail->SMTPAuth = true;
    $mail->Username = "no-reply@cuestadelmadero.com.ar";  // Correo Electrónico
    $mail->Password = "D@nt3!"; // Contraseña

    if ($mail->Send())
        echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';document.getElementById('contact-form').reset();</script>";
    else
        echo "<script>alert('Error al enviar el formulario');</script>"; 

}
