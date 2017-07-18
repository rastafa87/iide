
/*tjq(document).ready(function() {
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
 message: 'El Nombre es necesario y no puede estar vacÃ­o.'
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
 message: 'Su numero de telefono es necesario y no puede estar vacÃ­o.'
 },
 regexp: {
 regexp: /^\d{10}$/,
 message: 'Agregue 10 digitos validos de su numero de telÃ©fono.'
 }
 }
 },
 email: {
 validators: {
 notEmpty: {
 message: 'Es necesaria la direcciÃ³n de correo electrÃ³nico y esta no puede estar vacÃ­a'
 },
 emailAddress: {
 message: 'Este campo no contiene una direcciÃ³n de correo electrÃ³nico vÃ¡lida.'
 }
 }
 },
 msg: {
 validators: {
 notEmpty: {
 message: 'El Mensaje es necesario y no puede estar vacÃ­o.'
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
 var form = $(this);
 var data = $(this).serialize();
 var code;
 $("#wm").removeClass("hide");
 $("#mail-c").removeClass("hide");
 $("#background-contact").modal({backdrop:'static',keyboard:false, show:true});
 var form = $(this);
 var data = $(this).serialize();
 var code;
 $.ajax({
 type : "POST",
 data : data,
 url : "/index/sendMessageContact",
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
 case 404:$("#dg-c").removeClass("hide").addClass("in");$("#error-contact").removeClass("hide");
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
 $(".message-background").addClass("hide");
 $("#wm").removeClass("hide");
 },3000);
 }
 });
 return false;
 });
 }
 function resetForm($form) {
 $form.find('input:text, input:password, input:file, input[type=email], select, textarea').val('');
 $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
 }});
 */
jQuery(document).ready(function($) {

    $("#myTab .bhoechie-tab-content").mCustomScrollbar({
        setHeight:390,
        theme:"inset-2-dark"
    });
    $("#myTabMagazine .bhoechie-tab-content").mCustomScrollbar({
        setHeight:390,
        theme:"inset-2-dark"
    });

    $("#content-lote-element").mCustomScrollbar({
        setHeight:550,
        theme:"inset-2-dark"
    });


    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });


    /* Owl Carousel*/
    var owl = $("#owl-demo");

    owl.owlCarousel({
        items : 6, //10 items above 1000px browser width
        itemsDesktop : [1000,6], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
        itemsTablet: [600,3], //2 items between 600 and 0;
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true
    });

    var owlOPLES = $("#owl-demoOPLES");

    owlOPLES.owlCarousel({

        items : 8, //10 items above 1000px browser width
        itemsDesktop : [1000,5], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0;
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true

    });

    // Custom Navigation Events
    $(".next").click(function(){
        owlOPLES.trigger('owl.next');
    })
    $(".prev").click(function(){
        owlOPLES.trigger('owl.prev');
    })
    $(".play").click(function(){
        owlOPLES.trigger('owl.play',1000);
    })
    $(".stop").click(function(){
        owlOPLES.trigger('owl.stop');
    })


    $(document).ready(function() {
        $('.pgwSlideshow').pgwSlideshow();
    });
});
