<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Aquí puedes agregar el código para enviar el correo o guardar los datos en una base de datos

    // Ejemplo de envío de correo
    $to = "tucorreo@ejemplo.com";
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $nombre\nCorreo Electrónico: $email\nMensaje:\n$mensaje";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito";
    } else {
        echo "Error al enviar el mensaje";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>