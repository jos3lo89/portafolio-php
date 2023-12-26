<?php

class SessionC
{
    /* Iniciar la sesión */
    public function iniciarSesion()
    {
        $sesion_user = session_start();

        // Verificar la dirección IP y el User Agent
        $this->verificarSesion();

        return $sesion_user;

        // return session_start();
    }


    /* Verificar la sesión */
    private function verificarSesion()
    {
        // Verificar si la dirección IP está almacenada en la sesión
        if (isset($_SESSION['ip']) && $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']) {
            $this->diferenteUsuario();
        }

        // Verificar si el User Agent está almacenado en la sesión
        if (isset($_SESSION['ua']) && $_SESSION['ua'] !== $_SERVER['HTTP_USER_AGENT']) {
            $this->diferenteUsuario();
        }

        // Verificar si el hash combinado está almacenado en la sesión
        if (isset($_SESSION['check']) && $_SESSION['check'] !== $this->generarHash()) {
            $this->diferenteUsuario();
        }
    }

    /* Cerrar la sesión */
    public function cerrarSesionC()
    {
        // Destruir la sesión y realizar otras operaciones de cierre de sesión si es necesario
        session_unset();
        session_destroy();
    }

    /* Acción en caso de usuario diferente */
    private function diferenteUsuario()
    {
        // Realizar acciones de seguridad, como cerrar la sesión y redirigir al usuario al inicio de sesión
        $this->cerrarSesionC();
        header('Location: index.php?ruta=inicio');
        exit();
    }

    /* Generar el hash combinado */
    private function generarHash()
    {
        return hash('ripemd128', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
    }
}
