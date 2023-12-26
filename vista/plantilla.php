<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portafolio</title>
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="vista/css/style.css">
    <link rel="shortcut icon" href="vista/img/icono.svg" type="image/x-icon">
</head>

<body class="bg-body-secondary">

    <!-- Inciiar sesion en la plantilla START -->
    <?php
    $incicarSesion = new SessionC();
    $incicarSesion->iniciarSesion();
    ?>
    <!-- Inciiar sesion en la plantilla START -->

    <?php include 'vista/modulos/menu.php'; ?>

    <!-- sección de modulos START -->
    <section>
        <?php
        $rutasC = new RutasC();
        // $rutasC->protegeRutaRegistrar();
        $modulo = $rutasC->procesarRutasC();
        include $modulo;
        ?>
    </section>
    <!-- sección de modulos END -->

    <script src="vista/js/bootstrap.bundle.min.js"></script>
    <script src="vista/js/jquery-3.7.1.min.js"></script>
    <script src="vista/js/registrar-ajax.js"></script>
    <script src="vista/js/ingresar-ajax.js"></script>
    <script src="vista/js/recuperarClave-ajax.js"></script>
    <script src="vista/js/cambiarClave-ajax.js"></script>
    <script src="vista/js/contacto-ajax.js"></script>
</body>

</html>