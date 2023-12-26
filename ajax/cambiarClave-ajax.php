<?php
// cambiar la contraseña del usuario aqui
require_once '../modelo/usuarioM.php';
require_once '../funciones/funciones.php';
require_once '../controlador/sessionC.php';

$sesionCambioClave = new SessionC();
$sesionCambioClave->iniciarSesion();

$cambiaClaveM = new UsuarioM();
$cambiaClaveM->cambiarClaveUsuario();
