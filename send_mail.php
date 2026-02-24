<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

<?php

// echo "Hola mundo";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$nombre = isset($_POST['nombre']) ? strip_tags($_POST['nombre']) : '';
$telefono = isset($_POST['telefono']) ? strip_tags($_POST['telefono']) : '';
$asunto = isset($_POST['asunto']) ? strip_tags($_POST['asunto']) : '';
$pregunta = isset($_POST['pregunta']) ? strip_tags($_POST['pregunta']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';

$to_admin = "trabajo.lucasdelamo@gmail.com";
$to_client = $email;

$subject_admin = "Nuevo mensaje: $asunto";
$subject_client = "Hemos recibido tu mensaje";

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

$admin_sent = mail($to_admin, $subject_admin, $message_admin, $headers);
$client_sent = mail($to_client, $subject_client, $message_client, $headers);

if($admin_sent && $client_sent){
echo "OK";
}else{
echo "ERROR";
}

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU PETICIÓN HA SIDO ENVIADA</title>       
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/footer.css">

    <meta name="distribution" content="local">
    <meta name="coverage" content="Madrid">
    <meta name="target" content="all">

    <!-- <meta name="description" content="Contacta con especialistas en reparación de tejados en Madrid. Solucionamos goteras, filtraciones e impermeabilización. Presupuesto sin compromiso."> -->

    <meta name="robots" content="noindex, nofollow">

    <meta name="author" content="www.code48k.com">

    <meta name="geo.region" content="ES-M">
    <meta name="geo.placename" content="Madrid">
    <meta name="geo.position" content="40.4168;-3.7038">
    <meta name="ICBM" content="40.4168, -3.7038">

    <!-- <meta name="distribution" content="local">
    <meta name="coverage" content="Madrid">
    <meta name="target" content="all">

    <meta property="og:title" content="Contacto | Reparación de Tejados en Madrid">
    <meta property="og:description" content="Solicita información o presupuesto para reparación de tejados, goteras o impermeabilización en Madrid.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.tejadomadrid.es/contacto">
    <meta property="og:site_name" content="Reparación de Tejados Madrid">
    <meta property="og:locale" content="es_ES">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contacto | Reparación de Tejados en Madrid">
    <meta name="twitter:description" content="Pide presupuesto para reparación de tejados, goteras e impermeabilización en Madrid.">
    <meta name="twitter:url" content="https://www.tejadomadrid.es/contacto"> -->

    <style>
  #cuerpo {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .contact-form {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    width: 40%;
    margin: auto;
  }

  .contact-form h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
  }

  .contact-form input,
  .contact-form textarea {
    width: 100%;
    padding: 12px;
    margin: 8px 0 15px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
  }

  .contact-form input:focus,
  .contact-form textarea:focus {
    border-color: #2575fc;
    outline: none;
  }

  .contact-form button {
    width: 100%;
    padding: 12px;
    background: #2575fc;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    text-align: center;
  }

  .contact-form button:hover {
    background: #6a11cb;
  }

  .contact-form .error {
    color: red;
    font-size: 12px;
  }
</style>
</head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9V5H3C713J"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-9V5H3C713J');
    </script>
</head>

<body id="cuerpoTexto">
    <header id="cabecera">
        <figure id="contEnlaceCorreo">
            <p id="telefonoContacto">641 92 63 18</p>
            <a href="mailto:jmlucasdelamo@gmail.com" id="marcoCorreo">
                <img id="fotoCorreo" src="/img/correo-electronico.jpg" alt="correo electrónico"
                    title="Correo Electrónico">
            </a>
        </figure>
    </header>
        <nav id="navegacion">
        <div id="contPadreGridNav"> 
            <div>
                <figure>
                    <a id="marcoLogoCabecera" href="/index.html"><img id="fotoLogoCabecera" src="/img/logoCorporativoSuperior.png" alt="Logo Corporativo TejadosMadrid.es" title="Logo Corporativo"></a>
                </figure>
            </div>
            <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
            <div class="alturaBotones">
                <!-- DONDE ESTAMOS -->
                <div class="menuDesplegable">
                    <div class="espacio7vh"></div>
                    <button class="menuDesplegableBoton noFlecha">
                        <a href="donde-estamos.html" class="letraEnlaces">Donde estamos</a>
                    </button>
                </div>
            </div>
            <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
            <div class="alturaBotones">
                <!-- SERVICIOS -->
                <div class="menuDesplegable">
                    <div class="espacio7vh"></div>
                    <button class="menuDesplegableBoton">
                        Servicios
                    </button>
                    <section class="menuDesplegableLista">
                        <a href="/reparacion-tejados-madrid.html">Reparación de Tejados y Cubiertas</a>
                        <a href="/impermeabilizacion-tejados-madrid.html">Impermeabilización de Tejados</a>
                        <a href="/limpieza-y-mantenimiento-canalones-chimeneas-madrid.html">Mantenimiento de Canalones y Chimeneas</a>
                        <a href="/reparacion-goteras-madrid.html">Reparación de Goteras</a>
                        <a href="/sustitucion-reparacion-tejas-madrid.html">Sustitución y Reparación de Tejas</a>
                    </section> 
                </div>
            </div>
            <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
            <div class="alturaBotones">
                <!-- CLIENTES -->
                <div class="menuDesplegable">
                    <div class="espacio7vh"></div>
                    <button class="menuDesplegableBoton noFlecha">
                    <a href="clientes.html" class="letraEnlaces">Clientes</a>
                    </button>
                </div>
            </div>
            <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
            <div class="alturaBotones">
                <!-- CONTACTO -->
                <div class="menuDesplegable">
                    <div class="espacio7vh"></div>
                    <button class="menuDesplegableBoton noFlecha">
                        <a href="contacto.html" class="letraEnlaces">Contacto</a>
                    </button>
                </div>
            </div>
            <div>
                <input type="checkbox" id="menu-toggle">
                <label for="menu-toggle" class="menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                <div class="menu-list">
                    <ul>
                        <li><a href="/donde-estamos.html">Donde estamos</a></li>
                        <li><a href="/reparacion-tejados-madrid.html">Reparación de Tejados y Cubiertas</a></li>
                        <li><a href="/impermeabilizacion-tejados-madrid.html">Impermeabilización de Tejados</a></li>
                        <li><a href="/limpieza-y-mantenimiento-canalones-chimeneas-madrid.html">Mantenimiento de Canalones y Chimeneas</a></li>
                        <li><a href="/reparacion-goteras-madrid.html">Reparación de Goteras</a></li>
                        <li><a href="/sustitucion-reparacion-tejas-madrid.html">Sustitución y Reparación de Tejas</a></li>
                        <li><a href="/clientes.html">Clientes</a></li>
                        <li><a href="/contacto.html">Contacto</a></li>
                    </ul>
                </div>
                </div>
            </div>
    </nav>
    <main>
        <section class="card">
            <img src="/img/nuestros-clientes.png" class="card-img" alt="Nuestros servicio que realizamos a nuestros clientes" title="nuestros clientes">
            <section class="card-text">
            <h1 id="titularFondo1">YA SE ENVIADO</h1>
            </section>
        </section>
        <div class="espacio1vh"></div>
        <section>
        <h2 class="titular">SU EMAIL HA SIDO ENVIADO CORRECTAMENTE</h2>

    </main>
    <div class="espacio8vh"></div>
    <footer>
        <div id="contFlexPiePagina">
                <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
                <figure id="marcoLogoInferior">
                <img id="fotoLogoInferior" src="/img/logoCorporativoInferior.png" alt="logo corporativo de la parte inferior" title="Logo Corporativo">
                </figure>
                <div class="espacio05vh"></div> <!-- ESPACIO EN BLANCO -->
                <section id="logoCorpotativo"><h5>www.tejadomadrid.es</h5></section>
                <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
                <h6 id="slogan">Ofrecemos soluciones rápidas y duraderas para todo tipo de tejados</h6>
        </div>
            <div class="espacio1vh"></div> <!-- ESPACIO EN BLANCO -->
            <small id="copyright">Copyright © 2025 www.code48k.com</small>
    </footer>
    <script src="/js/menuNavegacion.js"></script>
</body>
</html>