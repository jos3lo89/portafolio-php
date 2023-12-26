$('#btnIngresar').click(function (event) {
    event.preventDefault();

    var usuarioF = $('#IngresarUsuario').val();
    var claveF = $('#ingresarClave').val();

    /* usuario y contraseña sin espacios */
    if (usuarioF.indexOf(' ') >= 0 || claveF.indexOf(' ') >= 0) {
        if (usuarioF.indexOf(' ') >= 0 && claveF.indexOf(' ') >= 0) {
            alert("El nombre de usuario y la contraseña no puede contener espacios");
            event.preventDefault();
        }
        else if (claveF.indexOf(' ') >= 0) {
            alert("La contraseña no puede contener espacios");
            event.preventDefault();
        } else if (usuarioF.indexOf(' ') >= 0) {
            alert("El nombre de usuario no puede contener espacios");
            event.preventDefault();
        }
    }
    /* usuario y contraseña sin valores vacios */
    else if (usuarioF == '' || claveF == '') {
        if (usuarioF == '' && claveF == '') {
            alert("Ingrese todos los campos");
            event.preventDefault();
        }
        else if (usuarioF == '') {
            alert("Ingrese el usuario");
            event.preventDefault();
        } else if (claveF == '') {
            alert("Ingrese la contraseña");
            event.preventDefault();
        }
    } else {
        $.ajax({
            type: "POST",
            url: "ajax/ingresar-ajax.php",
            data: {
                usuario: usuarioF,
                clave: claveF
            },
            success: function (response) {
                if (response === "Éxito al iniciar sesión.") {
                    window.location.href = "http://localhost/proyectoWeb/index.php?ruta=inicio";
                } else {
                    alert(response);
                }
            },
            error: function (error) {
                console.log(error)
            }
        })
    }
})