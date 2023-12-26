<?php
class RutasC
{
    public $rutasM;

    public function __construct()
    {
        $this->rutasM = new rutasM();
    }

    /* Proceso de las rutas normal */
    public function procesarRutasC()
    {
        if (isset($_GET['ruta'])) {
            $ruta = $_GET['ruta'];
        } else {
            $ruta = 'index';
        }

        $direcionUrl = $this->rutasM->procesarRutasM($ruta);
        return $direcionUrl;
    }

    /* Proteccion de la ruta registrar */
    public function protegeRutaRegistrar()
    {
        if (isset($_GET['ruta'])) {
            $ruta = $_GET['ruta'];
            if ($ruta == 'registrar') {
                if ($_SESSION['usuario_rol'] == 'revisor' || !isset($_SESSION['usuario_rol'])) {
                    header("location: index.php?ruta=inicio");
                }
            }
        }
    }

    /* Preteccion de la ruta Cambiar Clave (token) */
    public function protegeRutaCambiarClave()
    {
        if (isset($_GET['ruta'])) {
            $ruta = $_GET['ruta'];
            if ($ruta == 'cambiarClave') {
                if (!isset($_SESSION['token_cambiar_contra']) && !isset($_SESSION['id_usuario'])) {
                    header("location: index.php?ruta=inicio");
                }
            }
        }
    }
}
