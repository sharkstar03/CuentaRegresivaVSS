<?php
// contact.php

// Verifica que la solicitud sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $comments = htmlspecialchars(trim($_POST['comments']));

    // Validación básica
    if (empty($name) || empty($email) || empty($subject) || empty($comments)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Configura el destinatario y el encabezado del correo
    $to = "tu-email@ejemplo.com"; // Cambia esto por tu dirección de correo
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envía el correo
    $mailSent = mail($to, $subject, $comments, $headers);

    // Respuesta al cliente
    if ($mailSent) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje. Inténtalo de nuevo más tarde.";
    }
} else {
    echo "Método no permitido.";
}
