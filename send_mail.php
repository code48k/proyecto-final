<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$nombre = strip_tags($_POST['nombre']);
$telefono = strip_tags($_POST['telefono']);
$asunto = strip_tags($_POST['asunto']);
$pregunta = strip_tags($_POST['pregunta']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$to_admin = "trabajo.lucasdelamo@gmail.com";
$to_client = $email;

// ASUNTOS
$subject_admin = "Nuevo mensaje: $asunto";
$subject_client = "Hemos recibido tu mensaje";

// MENSAJE ADMIN
$message_admin = "
<html>
<body>
<h2>Nuevo mensaje de $nombre</h2>
<p><b>Email:</b> $email</p>
<p><b>Teléfono:</b> $telefono</p>
<p><b>Asunto:</b> $asunto</p>
<p><b>Mensaje:</b> $pregunta</p>
</body>
</html>
";

// MENSAJE CLIENTE
$message_client = "
<html>
<body>
<h2>¡Gracias por contactar con nosotros, $nombre!</h2>
<img src='https://via.placeholder.com/300x100.png?text=Empresa'>
<p>Hemos recibido tu mensaje correctamente.</p>
</body>
</html>
";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: TejadoMadrid <info@tejadomadrid.es>\r\n";

// ENVÍOS
$admin_sent = mail($to_admin, $subject_admin, $message_admin, $headers);
$client_sent = mail($to_client, $subject_client, $message_client, $headers);

if($admin_sent && $client_sent){
echo "OK";
}else{
echo "ERROR";
}

}
?>