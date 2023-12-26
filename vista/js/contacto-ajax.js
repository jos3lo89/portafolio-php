$('#btnContactar').click(function (event) {
    event.preventDefault();
    var nombreUserF = $('#nombreUser').val();
    var correoUserF = $('#correoUser').val();
    var textoUserF = $('#textoUser').val();

    if (nombreUserF == '' || correoUserF == '' || textoUserF == '') {
        if (nombreUserF == '' && correoUserF == '' && textoUserF == '') {
            alert("Insertar todos los campos");
            event.preventDefault();
        } else if (nombreUserF == '') {
            alert("Insertar el nombre");
            event.preventDefault();
        } else if (correoUserF == '') {
            alert("Insertar el coreeo");
            event.preventDefault();
        } else if (textoUserF == '') {
            alert("Insertar el mensaje");
            event.preventDefault();
        }
    } else {
        $.ajax({
            type: "POST",
            url: "ajax/contacto-ajax.php",
            data: {
                nombre: nombreUserF,
                correo: correoUserF,
                mensaje: textoUserF,
            },
            success: function (response) {
                alert(response)
                $('#formContacto')[0].reset();

            },
            error: function (error) {
                console.log(error)

            }
        })
    }
})