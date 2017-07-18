$(document).ready(function(){
    if($("#dropzone-user-edit").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone-user-edit', {
            url: "uploadimage",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#user-image").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Click en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#user-image").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/dash/assets/images/users/thumbnail/"+$("#user-image").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }
    if($("#image-principal-dz").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#image-principal-dz', {
            url: "uploadimagenote",
            uploadMultiple : false,
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 1 ,
            parallelUploads : 1,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
                formData.append("position_image",2);
                formData.append("image_post",1);
                formData.append("post_id",$("#post_id").val());
                formData.append("uniqid-id-image",$("#uniqid-id-image").val());
            },
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
    }
    if($("#image-investigador").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#image-investigador', {
            url: "uploadimage",
            uploadMultiple : false,
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 1 ,
            parallelUploads : 1,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
                formData.append("position_image",2);
                formData.append("image_post",1);
                formData.append("post_id",$("#post_id").val());
                formData.append("uniqid-id-image",$("#uniqid-id-image").val());
            },
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
    }
    if($("#dropzone-investigador-edit").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone-investigador-edit', {
            url: "uploadimage",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Click en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#input-image-principal").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/front/src/images/attorneys/200x200/"+$("#input-image-principal").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }
    if($("#dropzone-note-edit").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone-note-edit', {
            url: "uploadimagenote",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Click en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#input-image-principal").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/dash/img/notes/100x80/"+$("#input-image-principal").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }
})