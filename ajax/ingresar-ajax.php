<?php
require_once '../modelo/usuarioM.php';
require_once '../funciones/funciones.php';
require_once '../controlador/sessionC.php';

$sess = new SessionC();
$sess->iniciarSesion();

$ingresarM = new UsuarioM();
$ingresarM->ingresarUsuarioM();
