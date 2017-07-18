$(document).ready(function(){
    /* Area */
    if($("#newArea").length>=1){
        $('#newArea').formValidation({
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
                icon: {
                    validators: {
                        notEmpty: {
                            message: 'El Icono es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El Icono debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'El área necesita tener un status.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "save",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            window.location = "/dashboard/area/index";
                        },3000);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        });
    }
    /* Personal Information */
    /* Personal Information */
    if($("#updateArea").length>=1){
        $('#updateArea').formValidation({
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
                icon: {
                    validators: {
                        notEmpty: {
                            message: 'El Icono es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El Icono debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'El área necesita tener un status.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "update",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            window.location = "/dashboard/area/index";
                        },3000);
                    }else if(response.code==404){
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        });
    }
    /* Personal Information */
});