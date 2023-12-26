<?php
require_once '../modelo/usuarioM.php';
require_once '../funciones/funciones.php';

/* Llamando  a la función para registrar */
$registrar = new UsuarioM();
$registrar->registrarUsuarioM();
