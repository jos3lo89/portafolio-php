<h1>inicio</h1>

<?php
$datos = array(
    "usuario_id" =>    $_SESSION['usuario_id'],
    "usuario_usuario" =>    $_SESSION['usuario_usuario'],
    "usuario_nombre" =>    $_SESSION['usuario_nombre'],
    "usuario_apellido" =>    $_SESSION['usuario_apellido'],
    "usuario_correo" =>    $_SESSION['usuario_correo'],
    "usuario_clave" =>    $_SESSION['usuario_clave'],
    "usuario_foto" =>    $_SESSION['usuario_foto'],
    "usuario_rol" =>    $_SESSION['usuario_rol'],

);

print_r($datos);

?>