<?php
require_once '../modelo/contactoM.php';
require_once '../controlador/sessionC.php';
require_once '../funciones/funciones.php';


$contactoM = new ContactoM();
$contactoM->contactar();
