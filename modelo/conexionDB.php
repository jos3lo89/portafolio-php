<?php
class ConexionDBM
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $claveUsuario = "";
    private $dbNombre = "galindocj";
    private $puerto = 3306;
    /* Conexion a la base de datos */
    public function connDB()
    {
        $conexion = new mysqli($this->servidor, $this->usuario, $this->claveUsuario, $this->dbNombre, $this->puerto);
        return $conexion;
    }
}
