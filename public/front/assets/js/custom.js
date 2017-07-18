$(document).ready(function(){
//---- Contact Form ----//
    if($("#contact-form").length>=1){
        $('#contact-form').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'El Nombre es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El nombre debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Su numero de telefono es necesario y no puede estar vacío.'
                        },
                        regexp: {
                            regexp: /^\d{10}$/,
                            message: 'Agregue 10 digitos validos de su numero de teléfono.'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Es necesaria la dirección de correo electrónico y esta no puede estar vacía'
                        },
                        emailAddress: {
                            message: 'Este campo no contiene una dirección de correo electrónico válida.'
                        }
                    }
                },
                msg: {
                    validators: {
                        notEmpty: {
                            message: 'El Mensaje es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 500,
                            message: 'El mensajee debe ser mayor de 10 y menor de 500 caracteres de longitud.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            var form = $(this);
            var data = $(this).serialize();
            var code;
            $("#mail-c").removeClass("hide");
            $("#background-contact").modal({backdrop:'static',keyboard:false, show:true});
            $.ajax({
                type : "POST",
                data : data,
                url : "index/sendMessageContact",
                dataType : "json",
                success : function(response){
                    code = response.code;
                    switch (code){
                        case 200:$("#sc-c").removeClass("hide").addClass("in");
                            setTimeout(function(){
                                $("#wm").addClass("hide");
                                $("#sc").removeClass("hide");
                            },1000);
                            break;
                        case 404:
                            $("#wm").addClass("hide");
                            $("#dg-c").removeClass("hide").addClass("in");
                            $("#error-contact").removeClass("hide");
                            break;
                    };
                },
                error : function(){
                    console.log("error");
                },
                complete : function(){
                    setTimeout(function(){
                        switch (code){
                            case 200:resetForm(form);
                                break;
                            case 404:$("#dg-c").removeClass("in").addClass("hide");
                                break;
                        }
                        $("#background-contact").modal("hide");
                        $("#contact-form input#send-msg").removeAttr("disabled");
                        $(".message-background").addClass("hide");
                        $("#wm").removeClass("hide");
                    },3000);
                }
            });
            return false;
        });
    }
//--- End Contact Form ---//
    function resetForm($form) {
        $form.find('input:text, input:password, input:file, input[type=email], select, textarea').val('');
        $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
    }
});