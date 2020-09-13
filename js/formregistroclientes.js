const nombres = document.getElementById("nombres");
const apellidos = document.getElementById("apellidos");
const correo = document.getElementById("correo");
const password = document.getElementById("password");

const formulario = document.getElementById("formregistro");
const mensaje = document.getElementById("contenedorAlert");
const mensaje2 = document.getElementById("contenedorAlertCorreo");
const mensaje3 = document.getElementById("contenedorAlertPassword");
const mensaje4 = document.getElementById("contenedorAlertPrivacidad");

function validarformulario() {

    $('#contenedorAlertEmailRepetido').hide('fast');
    $('#contenedorAlertExito').hide('fast');

    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    if (nombres.value == "") {
        mensaje.style.display = 'block';
    } else {
        mensaje.style.display = 'none';
    }
    if (apellidos.value == "") {
        mensaje.style.display = 'block';
    } else {
        mensaje.style.display = 'none';
    }

    function validadocorreo() {
        if (!regexEmail.test(correo.value)) {
            mensaje2.style.display = 'block';
            return false;
        } else {
            mensaje2.style.display = 'none';
            return true;
        }
    }

    function validadopassword() {
        if (password.value.length < 6) {
            mensaje3.style.display = 'block';
            return false;
        } else {
            mensaje3.style.display = 'none';
            return true;
        }
    }


    if (!$('#acepto').prop('checked')) {
        mensaje4.style.display = 'block';
    } else {
        mensaje4.style.display = 'none';
    }

    if (nombres.value != "" && apellidos.value != "" && correo.value != "" && password.value != "") {
        if ($('#acepto').prop('checked')) {
            if (validadocorreo() && validadopassword()) {
                // start enviar los datos con ajax
                let nombres2 = nombres.value;
                let apellidos2 = apellidos.value;
                let correo2 = correo.value;
                let password2 = password.value;
                console.log(nombres2, apellidos2, correo2, password2);

                $.ajax({
                    type: "POST",
                    url: "registroclientes.php",
                    data: { nombres2, apellidos2, correo2, password2 },
                    beforeSend: function() {
                        $('#contenedorAlertEmailRepetido').hide('fast');
                        $('#contenedorAlertExito').hide('fast');
                        $('#cargando').show('fast');
                    },
                    success: function(resp) {
                        if (resp == "exito") {
                            $('#cargando').hide("fast");
                            $('#contenedorAlertEmailRepetido').hide('fast');
                            $('#contenedorAlertExito').show('fast');
                        }
                        if (resp == "emailrepetido") {
                            $('#cargando').hide("fast");
                            $('#contenedorAlertExito').hide('fast');
                            $('#contenedorAlertEmailRepetido').show('fast');
                        }

                    }
                });
                //end enviar datos
            }
        }
    }

}

function validarNombres() {
    $('#contenedorAlert').hide("fast");
}

function validarCorreo() {
    $('#contenedorAlertCorreo').hide("fast");
}

function validarPassword() {
    $('#contenedorAlertPassword').hide("fast");
}

function validarPrivacidad() {
    if ($('#acepto').prop('checked')) {
        mensaje4.style.display = 'none';
    }
}

$('#close-btn').click(function() {
    $('#contenedorAlert').hide("fast");
});
$('#close-btn-correo').click(function() {

    $('#contenedorAlertCorreo').hide("fast");

});
$('#close-btn-password').click(function() {

    $('#contenedorAlertPassword').hide("fast");
});
$('#close-btn-privacidad').click(function() {

    $('#contenedorAlertPrivacidad').hide("fast");
});
$('#close-btn-repetido').click(function() {

    $('#contenedorAlertEmailRepetido').hide('fast');
});
$('#close-btn-exito').click(function() {

    $('#contenedorAlertExito').hide('fast');
});