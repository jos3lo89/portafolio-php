<?php
require_once 'conexionDB.php';
// require_once 'controlador/sessionC.php';


class UsuarioM extends ConexionDBM
{
    public $funciones;

    /* Registrar usuario */
    public function registrarUsuarioM()
    {
        $conexion = ConexionDBM::connDB();
        $this->funciones = new Funciones();

        // $usuario = $this->funciones->get_post($conexion, $_POST['usuario']);
        // $nombre = $this->funciones->get_post($conexion, $_POST['nombre']);
        // $apellido = $this->funciones->get_post($conexion, $_POST['apellido']);
        // $correo = $this->funciones->get_post($conexion, $_POST['correo']);
        // $clave = $this->funciones->get_post($conexion, $_POST['clave']);
        // $rol = $this->funciones->get_post($conexion, $_POST['rol']);
        // $pregunta1 = $this->funciones->get_post($conexion, $_POST['pregunta1']);
        // $pregunta2 = $this->funciones->get_post($conexion, $_POST['pregunta2']);


        // $usuario = $_POST['usuario'];
        $usuario = $conexion->real_escape_string($_POST['usuario']);
        $nombre = $conexion->real_escape_string($_POST['nombre']);
        $apellido = $conexion->real_escape_string($_POST['apellido']);
        $correo =  $conexion->real_escape_string($_POST['correo']);
        $clave =  $conexion->real_escape_string($_POST['clave']);
        $rol =  $conexion->real_escape_string($_POST['rol']);
        $pregunta1 =  $conexion->real_escape_string($_POST['pregunta1']);
        $pregunta2 = $conexion->real_escape_string($_POST['pregunta2']);

        $rutaImg = "../vista/fotoPerfil/";
        $rutaImg2 = "vista/fotoPerfil/";

        // Verificar si el usuario o correo ya se encuentran registrados
        $qryConsulta = "SELECT * FROM usuario WHERE usuario_usuario = '$usuario' OR usuario_correo = '$correo'";
        $resultadoConsulta = $conexion->query($qryConsulta);
        if ($resultadoConsulta->num_rows > 0) {
            $fila = $resultadoConsulta->fetch_array(MYSQLI_ASSOC);
            if ($fila['usuario_usuario'] == $usuario) {
                echo "El usuario ya está registrado.";
            } else if ($fila['usuario_correo'] == $correo) {
                echo "El correo electrónico ya está registrado.";
            }
        } else {
            // Verificar si se ha enviado el archivo correctamente
            if (isset($_FILES['foto'])) {
                $fotoNombre = $_FILES['foto']['name'];
                $fotoTmp = $_FILES['foto']['tmp_name'];

                $direccionFoto = $rutaImg . $fotoNombre;
                $direccionFoto2 = $rutaImg2 . $fotoNombre;

                // Mover el archivo
                if (move_uploaded_file($fotoTmp, $direccionFoto)) {
                    // move_uploaded_file($fotoTmp, $direccionFoto);
                    $clave_hash = password_hash($clave, PASSWORD_BCRYPT);

                    // Query para insertar en la base de datos
                    $qryinsertar = "INSERT INTO `usuario` (`usuario_id`, `usuario_usuario`, `usuario_nombre`, `usuario_apellido`, `usuario_correo`, `usuario_clave`, `usuario_foto`, `usuario_fecha_registro`, `usuario_fecha_modificacion`, `usuario_rol`, `usuario_pregunta1`, `usuario_pregunta2`) VALUES (NULL,'$usuario','$nombre','$apellido','$correo','$clave_hash','$direccionFoto2', current_timestamp(), current_timestamp(), '$rol', '$pregunta1', '$pregunta2')";

                    // Ejecutar la consulta
                    $insertarResultado = $conexion->query($qryinsertar);

                    // Verificar el resultado de la inserción
                    if ($insertarResultado) {
                        echo "Exito al registrar.";
                    } else {
                        echo "Error al insertar en la base de datos: " . $conexion->error;
                    }
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "Error al subir la imagen.";
            }
        }
    }

    /* Ingresar usuario */
    public function ingresarUsuarioM()
    {
        $conexion = ConexionDBM::connDB();
        $usuario = isset($_POST['usuario']) ? $conexion->real_escape_string($_POST['usuario']) : "";
        $clave = isset($_POST['clave']) ? $conexion->real_escape_string($_POST['clave']) : "";

        $qryConsulta = "SELECT * FROM usuario WHERE usuario_usuario = '$usuario';";
        $resultadoConsulta = $conexion->query($qryConsulta);

        if ($resultadoConsulta->num_rows > 0) {
            $fila = $resultadoConsulta->fetch_array(MYSQLI_ASSOC);
            if (password_verify($clave, $fila['usuario_clave'])) {
                // guardando los datos del usuario en sesiones
                $_SESSION['usuario_id'] = $fila['usuario_id'];
                $_SESSION['usuario_usuario'] = $fila['usuario_usuario'];
                $_SESSION['usuario_nombre'] = $fila['usuario_nombre'];
                $_SESSION['usuario_apellido'] = $fila['usuario_apellido'];
                $_SESSION['usuario_correo'] = $fila['usuario_correo'];
                $_SESSION['usuario_clave'] = $fila['usuario_clave'];
                $_SESSION['usuario_foto'] = $fila['usuario_foto'];
                $_SESSION['usuario_rol'] = $fila['usuario_rol'];

                echo "Éxito al iniciar sesión.";
            } else {
                echo "La contraseña es incorrecta.";
            }
        } else {
            echo "Usuario no registrado.";
        }
    }

    /* Verificar correo y preguntas */
    public function verificarCorreoPregutna()
    {
        $conexion = ConexionDBM::connDB();

        $correo = isset($_POST['correo']) ? $conexion->real_escape_string($_POST['correo']) : "";
        $pregunta1 = isset($_POST['pregunta1']) ? $conexion->real_escape_string($_POST['pregunta1']) : "";
        $pregunta2 = isset($_POST['pregunta2']) ? $conexion->real_escape_string($_POST['pregunta2']) : "";

        $qryConsultaCorreo = "SELECT * FROM usuario WHERE 	usuario_correo = '$correo';";
        $resultadoConsultaCorreo = $conexion->query($qryConsultaCorreo);
        if ($resultadoConsultaCorreo->num_rows > 0) {
            $fila = $resultadoConsultaCorreo->fetch_array(MYSQLI_ASSOC);
            if ($fila['usuario_pregunta1'] == $pregunta1 && $fila['usuario_pregunta2'] == $pregunta2) {
                $_SESSION['id_usuario'] = $fila['usuario_id'];
                $_SESSION['token_cambiar_contra'] = true;
                echo "pase cambiar la contra";
            } else {
                echo "las pregumtas no coinciden";
            }
        } else {
            echo "El correo no esta registrado";
        }
    }

    /* Cambiar contraseña del usuario */
    public function cambiarClaveUsuario()
    {
        $conexion = ConexionDBM::connDB();
        $idUsuario = $_SESSION['id_usuario'];
        $clave = isset($_POST['clave1']) ? $conexion->real_escape_string($_POST['clave1']) : "";
        $clave_hash = password_hash($clave, PASSWORD_BCRYPT);

        $qryCmabiarClave = "UPDATE usuario SET usuario_clave = '$clave_hash', usuario_fecha_modificacion = current_timestamp() WHERE usuario_id = $idUsuario";
        $resultadoCambiarCalve = $conexion->query($qryCmabiarClave);
        if ($resultadoCambiarCalve) {
            unset($_SESSION['id_usuario']);
            unset($_SESSION['token_cambiar_contra']);

            echo "contraseña cambiada con exito";
        } else {
            unset($_SESSION['id_usuario']);
            unset($_SESSION['token_cambiar_contra']);
            echo "error al cambiar la contraseña";
        }
    }
}
