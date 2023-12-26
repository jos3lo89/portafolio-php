<?php
class UsuarioC
{
    /* Boton de ingresar o cerra sesión */
    public function btnUsuario()
    {
        if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_rol'] == 'administrador') {
            $btn = '
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.php?ruta=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=sobreMi">Sobre Mi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=habilidades">Habilidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=registrar">Registrar</a>
                </li>
            </ul>
            <div class="ms-auto">
                <form method="post" id="formBarraNav">
                    <input type="hidden" name="cerraSesion" id="cerraSesion">
                    <button type="submit" name="cerrar_sesion" class="btn btn-danger">Cerra Sesión</button>
                </form>
            </div>
            ';

            return $btn;
        } else if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_rol'] == 'revisor') {
            $btn = '
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.php?ruta=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=sobreMi">Sobre Mi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=habilidades">Habilidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=contacto">Contacto</a>
                </li>
            </ul>
            <div class="ms-auto">
                <form method="post" id="formBarraNav">
                    <input type="hidden" name="cerraSesion" id="cerraSesion">
                    <button type="submit" name="cerrar_sesion" class="btn btn-danger">Cerra Sesión</button>
                </form>
            </div>
            ';

            return $btn;
        } else {
            $btn = '
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.php?ruta=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=sobreMi">Sobre Mi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=habilidades">Habilidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=contacto">Contacto</a>
                </li>
            </ul>
            <div class="ms-auto">
                <form method="post" id="formBarraNav">
                    <input type="hidden" name="barraIngresar" id="barraIngresar">
                    <button type="submit" name="barra_ingresar" class="btn btn-info">Ingresar</button>
                </form>
            </div>
            ';

            return $btn;
        }
    }

    /* Post ingresar o cerra sesión */
    public function urlingresarCerrar()
    {
        if (isset($_POST['cerrar_sesion'])) {
            $cerraSess = new SessionC();
            $cerraSess->cerrarSesionC();
            header("location: index.php?ruta=inicio");
        } else if (isset($_POST['barra_ingresar'])) {
            header("location: index.php?ruta=ingresar");
        }
    }
}
