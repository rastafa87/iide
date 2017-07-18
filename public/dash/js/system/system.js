var laid =$("#laid").val();
var form = $("#updateLaw");

$(document).ready(function(){


    deleteRow("deleteElement","/dashboard/system/delete");

    if(form.length>=1){
        form.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            // This option will not ignore invisible fields which belong to inactive panels
            excluded: ':disabled',
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'El Nombre es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El Nombre debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: 'La categoria no puede estar vacio.'
                        }
                    }
                },
                country: {
                    validators: {
                        notEmpty: {
                            message: 'El país es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#message-box-info").toggleClass("open");
            $.ajax({
                type : "POST",
                url : "/dashboard/system/update",
                data : $(this).serialize(),
                dataType : "json",
                success : function(response){
                    if(response.code==200) {
                        messages(1,null);
                    }else{
                        messages(2,response.message);
                    }
                },
                error : function(){
                    messages(3,response.message);
                }
            });
        });
        if($("#sendMailPersonal").length>=1){
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone('#sendMailPersonal', {
                url: "/dashboard/system/uploadfile",
                uploadMultiple : true,
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 450, // MB
                maxFiles: 2,
                parallelUploads : 1,
                addRemoveLinks : true,
                dictResponseError: "No se puede subir esta archivo!",
                autoProcessQueue: true,
                thumbnailWidth: 138,
                thumbnailHeight: 120,
                previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style=font-weight: bold;"></span></div><div class="dz-size"><span data-dz-size></span></div></div><div class="dz-error-message"><span data-dz-errormessage></span></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
                resize: function(file) {
                    var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                        srcRatio = file.width / file.height;
                    if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                        info.trgHeight = this.options.thumbnailHeight;
                        info.trgWidth = info.trgHeight * srcRatio;
                        if (info.trgWidth > this.options.thumbnailWidth) {
                            info.trgWidth = this.options.thumbnailWidth;
                            info.trgHeight = info.trgWidth / srcRatio;
                        }
                    } else {
                        info.trgHeight = file.height;
                        info.trgWidth = file.width;
                    }
                    return info;
                },
                sending : function(file, xhr, formData){
                    formData.append("laid",laid);
                },
                success: function(file, response){
                    var values= response;
                    $(".dz-preview").addClass("dz-success");
                    $("div.progress").remove();
                    file.previewElement.accessKey = values.name;
                    $("#files").val(values.name);
                },
                removedfile: function(file) {
                    name = file.previewElement.accessKey;
                    $.ajax({
                        url: "/dashboard/system/deletedfile",
                        type: "post",
                        data: {name:name,laid:laid},
                        dataType:"json",
                        success : function(response){

                            $(file.previewElement).remove();
                        },
                        error : function(){
                            alert("Ha ocurrido un error");
                        }
                    });
                }
            });
            value = $('input[name="files"]').val();

            var mockFile = { name: "Click para remover el archivo", size: 12345};
            myDropzone.emit("addedfile",mockFile);
            myDropzone.element.lastChild.accessKey = value;
            image_load = "/dash/api/"+value;
            if($("#files").val()=="icon.png"){
                image_load = "/api/images/icon.png";
            }
            myDropzone.emit("thumbnail", mockFile,image_load);
            var existingFileCount = 1; // The number of files already uploaded
            myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
        }
    }
    /* Personal Information */
    if($("#newLaw").length>=1){
        function validateEditor() {
            // Revalidate the content when its value is changed by Summernote
            $('#summernoteForm').formValidation('revalidateField', 'content');
        }
        $('#newLaw').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'El Nombre de la Ley es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 200,
                            message: 'El titulo debe ser mayor de 10 y menor de 200 caracteres de longitud.'
                        }
                    }
                },
                country: {
                    validators: {
                        notEmpty: {
                            message: 'El País es necesario y no puede estar vacío.'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: 'El País es necesario y no puede estar vacío.'
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
                content:$('.summernote').code()
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/system/savelaw",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            window.location = "/dashboard/paises";
                        },3000);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                    $("#message-box-info").removeClass("open");
                }
            });
        });
        if($("#sendMailPersonal").length>=1){
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone('#sendMailPersonal', {
                url: "/dashboard/system/uploadfile",
                uploadMultiple : true,
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 450, // MB
                maxFiles: 2,
                parallelUploads : 1,
                addRemoveLinks : true,
                dictResponseError: "No se puede subir esta archivo!",
                autoProcessQueue: true,
                thumbnailWidth: 138,
                thumbnailHeight: 120,
                previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style=font-weight: bold;"></span></div><div class="dz-size"><span data-dz-size></span></div></div><div class="dz-error-message"><span data-dz-errormessage></span></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
                resize: function(file) {
                    var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                        srcRatio = file.width / file.height;
                    if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                        info.trgHeight = this.options.thumbnailHeight;
                        info.trgWidth = info.trgHeight * srcRatio;
                        if (info.trgWidth > this.options.thumbnailWidth) {
                            info.trgWidth = this.options.thumbnailWidth;
                            info.trgHeight = info.trgWidth / srcRatio;
                        }
                    } else {
                        info.trgHeight = file.height;
                        info.trgWidth = file.width;
                    }
                    return info;
                },
                sending : function(file, xhr, formData){
                    formData.append("laid",laid);
                },
                success: function(file, response){
                    var values= response;
                    $(".dz-preview").addClass("dz-success");
                    $("div.progress").remove();
                    file.previewElement.accessKey = values.name;
                    $("#files").val(values.name);
                },
                removedfile: function(file) {
                    id = file.previewElement.accessKey;
                    name = file.previewElement.id;
                    $.ajax({
                        url: "/dashboard/system/deletedfile",
                        type: "post",
                        data: {name:name,laid:laid},
                        dataType:"json",
                        success : function(response){

                            $(file.previewElement).remove();
                        },
                        error : function(){
                            alert("Ha ocurrido un error");
                        }
                    });
                }
            });
            value = $('input[name="files"]').val();
            var mockFile = { name: "Click para remover el archivo", size: 12345};
            myDropzone.emit("addedfile",mockFile);
            myDropzone.element.lastChild.accessKey = value;
            image_load = "/api/images/system/"+laid+"/file/"+value;
            if($("#files").val()=="icon.png"){
                image_load = "/api/images/icon.png";
            }
            myDropzone.emit("thumbnail", mockFile,image_load);
            var existingFileCount = 1; // The number of files already uploaded
            myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
        }
    }
});

function messages($type){
    if($type==1){
        setTimeout(function(){
            $("#message-box-info").removeClass("open");
            $("#message-box-success").toggleClass("open");
        },1500);
        setTimeout(function(){
            $("#message-box-success").removeClass("open");
        },2000);
    }
    else if($type==2){
        setTimeout(function(){
            $("#message-box-info").removeClass("open");
            $("#message-box-warning").toggleClass("open");
        },1500);
        setTimeout(function(){
            $("#message-box-warning").removeClass("open");
        },3000);
    }else if($type==3){
        setTimeout(function(){
            $("#message-box-info").removeClass("open");
            $("#message-box-warning").toggleClass("open");
        },1500);
        setTimeout(function(){
            $("#message-box-warning").removeClass("open");
        },3000);
    }
    else if($type==4){
        setTimeout(function(){
            $("#message-box-process").removeClass("open");
            $("#message-box-pay").toggleClass("open");
        },1500);
        setTimeout(function(){
            $("#message-box-pay").removeClass("open");
        },3000);
    }
}
function deleteRow(selector,url){
    var box = $("#mb-remove-row");
    var id = "0";
    $(document.body).on("click","table tbody tr td span."+selector,function(){
        id = $(this).parent().attr("data-id");
        box.addClass("open");
    });
    box.find(".mb-control-yes").on("click",function(){
        $.ajax({
            url : url,
            type : "POST",
            data : {id:id},
            dataType : "json",
            success : function(response){
                box.removeClass("open");
                if(response.code==200){
                    $("."+id).hide("slow",function(){
                        $(this).remove();
                    });
                }else{
                    alert("No se ha podido eliminar este fila por que esta ligado a otros registros.");
                }
            },error : function(){
                alert("Ha ocurrido un error intente nuevamente.");
            }
        });
    });
}




