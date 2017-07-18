function touch_detect() {
    return 'ontouchstart' in window || 'onmsgesturechange' in window || navigator.msMaxTouchPoints > 0;
}
var map;
jQuery(document).ready(function () {
if(jQuery('#vmap').length>=1){
    // Store currentRegion
    var currentRegion = 'mx';
    var enabledRegions = ['mx', 'gt', 'bz', 'ar', 'bo', 'br', 'cl', 'co', 'cr', 'cu', 'ec', 'es', 'hn', 'ni', 'pa', 'pe', 'pt', 'sv', 'tt', 'uy', 've', 'do', 'py'];


    map = jQuery('#vmap').vectorMap({
        map: 'world_en',
        enableZoom: true,
        showTooltip: true,
        center: [3.0014129,-69.2226524],
        selectedColor: '#333333',
        selectedRegions: ['mx'],
        hoverColor: null,
        responsive: true,
        colors: {
            mx: '#552030',
            gt: '#552030',
            bz: '#552030',
            ar: '#552030',
            bo: '#552030',
            br: '#552030',
            cl: '#552030',
            co: '#552030',
            cr: '#552030',
            cu: '#552030',
            ec: '#552030',
            es: '#552030',
            hn: '#552030',
            ni: '#552030',
            pa: '#552030',
            pe: '#552030',
            pt: '#552030',
            sv: '#552030',
            tt: '#552030',
            uy: '#552030',
            ve: '#552030',
            do: '#552030',
            py: '#552030'
        },
        onRegionClick: function (event, code, region) {
            console.log("1");
            if(enabledRegions.indexOf(code) === -1 || currentRegion === code){
                event.preventDefault();
            } else {
                currentRegion = code;
            }
        },
        onLoad:function(event, map){
            jQuery("#content-lote-element").removeClass("hidden");
            var data = {region:"mx"};
            jQuery.ajax({
                type : "POST",
                data : data,
                url : "/sendcountry",
                dataType : "json",
                success : function(response){
                    code = response.code;
                    switch (code){
                        case 200:
                            jQuery(".jurisprudencia").find("a").remove();
                            jQuery(".leyes").find("a").remove();
                            jQuery("#constitucion").find("a").remove();
                            jQuery(".jurisprudencia").find("br").remove();
                            jQuery(".leyes").find("br").remove();
                            jQuery("#constitucion").find("br").remove();
                            setTimeout(function(){
                                jQuery("#content-lote-element h2").text(response.content.country);
                                /*jQuery("#content-lote-element h3").text(response.electorales[0].law);*/

                                /* jQuery("#constitucion").html("<a download='/dash/api/"+response.consti[0].file+"' href='/front/leyes/"+response.consti[0].file+"'></a>");
                                 $("#constitucion a").text("Constitución de "+response.content.country);*/


                                /* Constitución */
                                var con = response.consti;
                                jQuery.each(con, function( index, value ) {
                                    $number = index+1;
                                    jQuery("#constitucion").append("<a  download='" + value.file + "' href='/dash/api/" + value.file + "'>" +$number+".- "+ value.law + "</a><br>");
                                });
                                /* Constitución */


                                /* Leyes Electorales */
                                var len = response.electorales;
                                jQuery.each(len, function( index, value ) {
                                    $number = index+1;
                                    jQuery(".leyes").append("<a  download='" + value.file + "' href='/dash/api/" + value.file + "'>" +$number+".- "+ value.law + "</a><br>");
                                });
                                /* Leyes Electorales */


                                /* Jurisprudencia */
                                var jur = response.jurisprudencia;
                                jQuery.each(jur, function( index, value ) {
                                    $number = index+1;
                                    jQuery(".jurisprudencia").append("<a  download='" + value.file + "' href='/dash/api/" + value.file + "'>" +$number+".- "+ value.law + "</a><br>");
                                });
                                /* Jurisprudencia */


                            },1000);
                            break;
                        case 404:
                            break;
                    };
                },
                error : function(){
                    console.log("error");
                },
                complete : function(){
                    setTimeout(function(){
                        switch (code){
                            case 200:
                                break;
                            case 404:
                                break;
                        }
                    },3000);
                }
            });


        },
        onRegionSelect: function(event, code, region){

            jQuery("#content-lote-element").removeClass("hidden");
            console.log(region);
            var data = {region:code};
            jQuery.ajax({
                type : "POST",
                data : data,
                url : "/sendcountry",
                dataType : "json",
                success : function(response){
                    code = response.code;
                    switch (code){
                        case 200:
                            jQuery(".jurisprudencia").find("a").remove();
                            jQuery(".leyes").find("a").remove();
                            jQuery("#constitucion").find("a").remove();
                            jQuery(".jurisprudencia").find("br").remove();
                            jQuery(".leyes").find("br").remove();
                            jQuery("#constitucion").find("br").remove();
                            setTimeout(function(){
                                jQuery("#content-lote-element h2").text(response.content.country);
                                /*jQuery("#content-lote-element h3").text(response.electorales[0].law);*/

                                /* jQuery("#constitucion").html("<a download='/dash/api/"+response.consti[0].file+"' href='/front/leyes/"+response.consti[0].file+"'></a>");
                                 $("#constitucion a").text("Constitución de "+response.content.country);*/


                                /* Constitución */
                                var con = response.consti;
                                jQuery.each(con, function( index, value ) {
                                    $number = index+1;
                                    jQuery("#constitucion").append("<a  download='" + value.file + "' href='/dash/api/" + value.file + "'>" +$number+".- "+ value.law + "</a><br>");
                                });
                                /* Constitución */


                                /* Leyes Electorales */
                                var len = response.electorales;
                                jQuery.each(len, function( index, value ) {
                                    $number = index+1;
                                    jQuery(".leyes").append("<a  download='" + value.file + "' href='/dash/api/" + value.file + "'>" +$number+".- "+ value.law + "</a><br>");
                                });
                                /* Leyes Electorales */


                                /* Jurisprudencia */
                                var jur = response.jurisprudencia;
                                jQuery.each(jur, function( index, value ) {
                                    $number = index+1;
                                    jQuery(".jurisprudencia").append("<a  download='" + value.file + "' href='/dash/api/" + value.file + "'>" +$number+".- "+ value.law + "</a><br>");
                                });
                                /* Jurisprudencia */


                            },1000);
                            break;
                        case 404:
                            break;
                    };
                },
                error : function(){
                    console.log("error");
                },
                complete : function(){
                    setTimeout(function(){
                        switch (code){
                            case 200:
                                break;
                            case 404:
                                break;
                        }
                    },3000);
                }
            });
        },
        onLabelShow: function(event, label, code){
            if(enabledRegions.indexOf(code) === -1){
                event.preventDefault();
            }
        }
    });
    map.setScale(1);
}

});