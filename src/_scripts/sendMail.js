'use strict';

var SendMail = function() { 
    var submitButton = $('.contacto__form__button');
    var nombre = $('#nombre');
    var email = $('#mail');
    var consulta = $('#mensaje');
    
    submitButton.on('click', function(e) {
        inputName = nombre.val()
        inputEmail = email.val()
        inputMessage = consulta.val()
        
        var consultaDetails = {
            nombre: inputName,
            email: inputEmail,
            consulta: inputMessage,
        };

        mailer(consultaDetails)
    });

    function mailer(mailInfo) {
        $.ajax({
            type: "POST",
            url: '/enviar.php',
            crossDomain: true,
            data: {            
                nombre: mailInfo.nombre,
                email: mailInfo.email,
                consulta: mailInfo.consulta,
            }
        }).done(function(response) {
            console.log('success AJAX', response);
            // if(response === 'success') {
            // }
        }).fail(function(response) {
            console.log('fail', response);
        });
    }
}

module.exports = SendMail;