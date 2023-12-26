<?php
// Imprimir btn ingresar o cerra sesión
$usuarioC = new UsuarioC();
$btn = $usuarioC->btnUsuario();

// url usuario  ingrear cerrar sesión
$usuarioC->urlingresarCerrar();

// proteccion de ruta registrar
$rutasCPro = new RutasC();
$rutasCPro->protegeRutaRegistrar();

// proteccion ruta cambiar clave
$rutasCPro->protegeRutaCambiarClave();

?>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php?ruta=inicio"><strong>Mi portafolio</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <ul class="navbar-nav me-auto">
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
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?ruta=ingresar">ingresar</a>
                </li>
            </ul>
            <div class="">
                <div class="">
                    <p>jose luis</p>
                </div>
                <div class="">
                    <img src="saef" alt="aef">
                </div>
            </div>
            <div class="ms-auto">
                <form method="post" id="formBarraNav">
                    <input type="hidden" name="barraIngresar" id="barraIngresar">
                    <button type="submit" name="barra_ingresar" class="btn btn-info">Ingresar</button>
                </form>
            </div> -->
            <!-- aqui peudo ir mas cosa que quieras a lad erecha -->
            <?= $btn ?>
        </div>

    </div>
</nav>