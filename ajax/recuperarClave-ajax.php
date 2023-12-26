<?php
// verificar el coreo y las preguntas  para cabiar la contraseña
require_once '../modelo/usuarioM.php';
require_once '../funciones/funciones.php';
require_once '../controlador/sessionC.php';

$sesionCambiarContra = new SessionC();
$sesionCambiarContra->iniciarSesion();


$usuarioM = new UsuarioM();
$usuarioM->verificarCorreoPregutna();
