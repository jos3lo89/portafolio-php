$('#btnVerificarCorreo').click(function (event) {
    event.preventDefault();

    var correoF = $('#correo').val();
    var pregunta1F = $('#pregunta1').val();
    var pregunta2F = $('#pregunta2').val();

    if (
        correoF == '' ||
        pregunta1F == '' ||
        pregunta2F == ''
    ) {
        if (
            correoF == '' &&
            pregunta1F == '' &&
            pregunta2F == ''
        ) {
            alert("Ingrese Todos los datos")
            event.preventDefault();
        }
        else if (correoF == '') {
            alert("Ingrese el Correo")
            event.preventDefault();
        } else if (pregunta1F == '') {
            alert("Ingrese la Pregunta 1")
            event.preventDefault();
        } else if (pregunta2F == '') {
            alert("Ingrese la Pregunta 2")
            event.preventDefault();
        }

    } else {
        // console.log(correoF + "\n" + pregunta1F + "\n" + pregunta2F)
        $.ajax({
            type: "POST",
            url: "ajax/recuperarClave-ajax.php",
            data: {
                correo: correoF,
                pregunta1: pregunta1F,
                pregunta2: pregunta2F
            },
            success: function (response) {
                console.log(response);

                if (response == 'pase cambiar la contra') {
                    window.location.href = "http://localhost/proyectoWeb/index.php?ruta=cambiarClave";
                } else if (response == 'las pregumtas no coinciden') {
                    alert(response)
                    event.preventDefault();
                } else if (response == 'El correo no esta registrado') {
                    alert(response)
                    event.preventDefault();
                } else {
                    alert(response)
                    event.preventDefault();
                }
            },
            error: function (error) {
                console.log(error);
            }

        })
    }

})