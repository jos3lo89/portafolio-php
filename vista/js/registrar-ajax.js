$('#btnRegistrarUsuario').click(function (event) {
    event.preventDefault();

    // comprobaciones
    var usuario = $('#usuario').val();
    var nombre = $('#nombre').val();
    var apellido = $('#apellido').val();
    var correo = $('#correo').val();
    var correo2 = $('#correo2').val();
    var clave = $('#clave').val();
    var clave2 = $('#clave2').val();
    var foto = $('#foto').val();
    var rol = $('#rol').val();
    var pregunta1 = $('#pregunta1').val();
    var pregunta2 = $('#pregunta2').val();

    if (usuario.indexOf(' ') >= 0) {
        alert('El nombre de usuario no puede contener espacios');
        event.preventDefault();
    } else if (correo != correo2) {
        alert('El correo electrónico no coincide');
        event.preventDefault();
    } else if (clave !== clave2) {
        alert('La contraseña no coincide');
        event.preventDefault();
    } else if (
        usuario === '' ||
        nombre === '' ||
        apellido === '' ||
        correo === '' ||
        correo2 === '' ||
        clave === '' ||
        clave2 === '' ||
        foto === '' ||
        rol === '' ||
        pregunta1 === '' ||
        pregunta2 === ''
    ) {
        alert('Ingrese todos los datos');
        event.preventDefault();
    } else {
        // despues de domprobar todo pasar a enviar los datos del formulario
        var formData = new FormData($('#registroForm')[0]);
        formData.append('foto', $('#foto')[0].files[0]);

        $.ajax({
            type: "POST",
            url: "ajax/registrar-ajax.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response == 'El usuario ya está registrado.' || response == 'El correo electrónico ya está registrado.') {
                    alert(response)
                    event.preventDefault();
                } else {
                    alert(response)
                    $('#registroForm')[0].reset();
                }
            },
            error: function (error) {
                console.log("Error en la solicitud AJAX: ", error);
            }
        });
    }
});


