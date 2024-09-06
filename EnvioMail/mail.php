<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$asunto = $_POST["asunto"];
$mensaje = $_POST['mensaje'];

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre $apellido <$correo> \r\n";
$headers.= "To: Sitio web <ejemplo@germanrodriguez.com.ar> \r\n";


$rta = mail('diegoceballos95@yahoo.com', "Mensaje web: $asunto", $mensaje, $headers );

//var_dump($rta);
header("Location: index.html" );