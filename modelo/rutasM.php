<?php
class rutasM
{
    public function procesarRutasM($ruta)
    {
        if (
            $ruta == 'inicio' ||
            $ruta == 'sobreMi' ||
            $ruta == 'registrar' ||
            $ruta == 'ingresar' ||
            $ruta == 'recuperarClave' ||
            $ruta == 'cambiarClave' ||
            $ruta == 'contacto' ||
            $ruta == 'proyectos' ||
            $ruta == 'habilidades'

        ) {
            $direccionUrl = "vista/modulos/" . $ruta . ".php";
        } elseif ($ruta == 'index') {
            $direccionUrl = "vista/modulos/inicio.php";
        } else {
            $direccionUrl = "vista/modulos/inicio.php";
        }

        return $direccionUrl;
    }
}
