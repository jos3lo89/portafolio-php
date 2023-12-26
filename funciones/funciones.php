<?php
class Funciones
{
    /* Función para imprimir en HTML */
    public function htmlDato($dato)
    {
        return htmlspecialchars($dato);
    }

    /* Función para imprimir mensajes tipo alerta */
    public function mensajes($mensaje, $tipo = 'info')
    {
        $mensaje = $this->htmlDato($mensaje);

        $tiposPermitidos = ['info', 'warning', 'danger', 'success', 'dark'];

        if (in_array($tipo, $tiposPermitidos)) {
            $imprimir = '
            <div class="alert alert-' . $tipo . ' alert-dismissible fade show" role="alert">
                <strong>Hola.</strong> ' . $mensaje . '.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        } else {
            $imprimir = '
            <div class="alert alert-light alert-dismissible fade show" role="alert">
                <strong>Hola.</strong> ' . $mensaje . '.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }

        return $imprimir;
    }

    /* Función para evitar SQL injection */
    // public function get_post($conn, $var, $tipo = 'post')
    // {
    //     if ($tipo == 'get') {
    //         return $conn->real_escape_string($_GET[$var]);
    //     } else {
    //         return $conn->real_escape_string($_POST[$var]);
    //     }
    // }
    public function get_post($conn, $var, $tipo = 'post')
    {
        if ($tipo == 'get') {
            return isset($_GET[$var]) ? $conn->real_escape_string($_GET[$var]) : null;
        } else {
            return isset($_POST[$var]) ? $conn->real_escape_string($_POST[$var]) : null;
        }
    }
}
