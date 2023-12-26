<?php
ob_start();
// controladores
require_once 'controlador/rutasC.php';
require_once 'controlador/sessionC.php';
require_once 'controlador/usuarioC.php';
// modelos
require_once 'modelo/rutasM.php';
require_once 'modelo/usuarioM.php';

// funciones
require_once 'funciones/funciones.php';

// plantilla
require_once 'vista/plantilla.php';
ob_end_flush();
