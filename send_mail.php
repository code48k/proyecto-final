<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $pregunta = htmlspecialchars($_POST['pregunta']);

    $to_client = $_POST['email_cliente'] ?? 'cliente@correo.com'; // Cambia por el email del cliente si lo tienes
    $to_admin = 'trabajo.lucasdelamo@gmail.com'; // Tu email

    $subject_client = "Bienvenido, $nombre";
    $subject_admin = "Nuevo mensaje: $asunto";

    $message_client = "
    <html>
    <body>
        <h2>Bienvenido $nombre!</h2>
        <img src='https://via.placeholder.com/300x100.png?text=Empresa' alt='Empresa'>
        <p>Gracias por contactarnos. Pronto recibirás respuesta.</p>
    </body>
    </html>
    ";

    $message_admin = "
    <html>
    <body>
        <h2>Nuevo mensaje de $nombre</h2>
        <p><strong>Teléfono:</strong> $telefono</p>
        <p><strong>Asunto:</strong> $asunto</p>
        <p><strong>Mensaje:</strong> $pregunta</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@tuempresa.com" . "\r\n";

    mail($to_client, $subject_client, $message_client, $headers);
    mail($to_admin, $subject_admin, $message_admin, $headers);

    echo "<script>alert('Mensaje enviado!');window.location='index.html';</script>";
}
?>