$(document).ready(function() {

    $("#formulario").submit(function(event) {
        var formularioCorrecto = true;
        var mensajeError = "";

        var user = $("#user").val();
        var pass = $("#password").val();
        var repass = $("#repassword").val();
        var name = $("#name").val();
        var apellido1 = $("#apellido1").val();
        var apellido2 = $("#apellido2").val();
        var direccion = $("#direccion").val();
        
        if(user == "") {
            formularioCorrecto = false;
            $("#user").css('background-color', 'red');
            mensajeError += "El usuario está sin rellenar. ";
        } else {
            $("#user").css('background-color', 'white');
        }

        if(pass == "") {
            formularioCorrecto = false;
            $("#password").css('background-color', 'red');
            mensajeError += " La contraseña está sin rellenar";
        } else {
            $("#password").css('background-color', 'white');
        }

        if(pass != repass) {
            formularioCorrecto = false;
            mensajeError += " Las contraseñas no coinciden";
            $("#repassword").css('background-color', 'red');
        } else {
            $("#repassword").css('background-color', 'white');
        }

        if(!/[A-Z]/.test(pass)) {
            formularioCorrecto = false;
            mensajeError += " No hay mayúscula";
            $("#password").css('background-color', 'red');
        } else {
            $("#password").css('background-color', 'white');
        }

        if(!/[0-9]/.test(pass)) {
            formularioCorrecto = false;
            mensajeError += " No hay número";
            $("#password").css('background-color', 'red');
        } else {
            $("#password").css('background-color', 'white');
        }

        if(pass.length < 7) {
            formularioCorrecto = false;
            mensajeError += " Faltan caracteres en la contraseña";
            $("#password").css('background-color', 'red');
        } else {
            $("#password").css('background-color', 'white');
        }

        if(pass.includes(user)) {
            formularioCorrecto = false;
            mensajeError += " La contraseña no debe incluir el usuario";
            $("#password").css('background-color', 'red');
        } else {
            $("#password").css('background-color', 'white');
        }

        if(!formularioCorrecto) {
            event.preventDefault();
            $("#error").children("p").text(mensajeError);
            $("#error").show();
        }
    });

    $('#repassword').on('change textInput input', function() {
        var pass = $("#password").val();
        if(pass != $(this).val()) {
            $("#repassword").css('background-color', 'red');
        } else {
            $("#repassword").css('background-color', 'white');
        }
    });

    var usuarioExistente = false; // Bandera para verificar si el usuario ya existe

    // Captura el evento de envío del formulario
    $("#formulario").submit(function(event) {
        event.preventDefault();
        var user = $("#user").val();

        // Realiza una llamada AJAX asíncrona para verificar si el usuario existe
        $.ajax({
            url: "http://localhost/chuli/servicios.php",
            type: "POST",
            data: { function: "comprobar_usuario", user: user },
            success: function(data) {
                if(data) {
                    usuarioExistente = true; // Marcar que el usuario existe
                    $("#error").children("p").text("Usuario no válido");
                    $("#error").show();
                } else {
                    usuarioExistente = false; // Marcar que el usuario no existe
                    $("#user").css('background-color', 'white');
                    $("#error").hide();
                    $("#formulario").submit();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        // Si el usuario existe, evita enviar el formulario
        if(usuarioExistente) {
            event.preventDefault(); // Evita que el formulario se envíe
        } else {
            $("#user").css('background-color', 'white');
            $("#error").hide();
        }
    });
});
