jQuery(document).ready(function($){"use strict";$('a[data-rel]').each(function(){$(this).attr('rel',$(this).data('rel'));});if($('#cp-home-banner').length){$('#cp-home-banner').bxSlider({auto:true,infiniteLoop:true,hideControlOnEnd:true});}
if($('#cp-tweet-slider').length){$('#cp-tweet-slider').bxSlider({auto:true,infiniteLoop:true,hideControlOnEnd:true});}
if($('#cp-welcome-slider').length){$('#cp-welcome-slider').bxSlider({auto:true,infiniteLoop:true,hideControlOnEnd:true});}
if($('#cp-practice').length){$('#cp-practice').owlCarousel({loop:true,margin:0,responsiveClass:true,nav:true,responsive:{0:{items:1,nav:true},600:{items:2,nav:false},1000:{items:5,}}})}
if($('.counter').length){$('.counter').counterUp({delay:10,time:1000});}
if($('#cp-client').length){$('#cp-client').bxSlider({auto:true,mode:'fade',infiniteLoop:true,hideControlOnEnd:true});}
if($('#cp-footer-twitter').length){$('#cp-footer-twitter').bxSlider({auto:true,mode:'fade',infiniteLoop:true,hideControlOnEnd:true});}
if($('#cp_side-menu-btn, #cp-close-btn').length){$('#cp_side-menu-btn, #cp-close-btn').on('click',function(){var $navigacia=$('body, #cp_side-menu'),val=$navigacia.css('right')==='375px'?'0px':'375px';$navigacia.animate({right:val},375)});}
if($('#searchtoggl').length){var $searchlink=$('#searchtoggl i');var $searchbar=$('.cp-search-outer');$('#searchtoggl').on('click',function(e){e.preventDefault();if($(this).attr('id')=='searchtoggl'){if(!$searchbar.is(":visible")){$searchlink.removeClass('fa-search').addClass('fa-search-minus');}else{$searchlink.removeClass('fa-search-minus').addClass('fa-search');}
$searchbar.slideToggle(300,function(){});}});$('#searchform').submit(function(e){e.preventDefault();});}
if($('.cp-navigation-section').length){var stickyNavTop=$('.cp-navigation-section').offset().top;var stickyNav=function(){var scrollTop=$(window).scrollTop();if(scrollTop>stickyNavTop){$('.cp-navigation-section').addClass('cp_sticky');}else{$('.cp-navigation-section').removeClass('cp_sticky');}};stickyNav();$(window).scroll(function(){stickyNav();});}
if($(".cp-gallery-metro-1 .isotope").length){var $container=$('.cp-gallery-metro-1 .isotope');$container.isotope({itemSelector:'.item',transitionDuration:'0.6s',masonry:{columnWidth:$container.width()/ 12
},layoutMode:'masonry'});$(window).resize(function(){$container.isotope({masonry:{columnWidth:$container.width()/ 12
}});});}
if($(".cp-gallery-metro-2 .isotope").length){var $container=$('.cp-gallery-metro-2 .isotope');$container.isotope({itemSelector:'.item',transitionDuration:'0.6s',masonry:{columnWidth:$container.width()/ 12
},layoutMode:'masonry'});$(window).resize(function(){$container.isotope({masonry:{columnWidth:$container.width()/ 12
}});});}
function attWorkGrid_2(){if($('#gallery-grid-1-masonrywrap').length){var options={itemWidth:262,autoResize:true,container:$('#gallery-grid-1-masonrywrap'),offset:30,flexibleWidth:262};var handler=$('#gallery-grid-1-masonrywrap li');handler.wookmark(options);}}
$(window).load(function(){attWorkGrid_2();});$('#gallery-grid-1-masonrywrap li div div img').load(function(){attWorkGrid_2();});if($('#testimonial-style-1').length){$('#testimonial-style-1').owlCarousel({loop:true,margin:30,responsiveClass:true,nav:true,responsive:{0:{items:1,nav:true},600:{items:2,nav:false},1000:{items:2,}}})}
if($('#testimonial-style-2').length){$('#testimonial-style-2').owlCarousel({loop:true,margin:30,responsiveClass:true,nav:false,responsive:{0:{items:1,nav:true},600:{items:2,nav:false},1000:{items:2,}}})}
if($('#testimonial-style-3').length){$('#testimonial-style-3').owlCarousel({loop:true,margin:30,responsiveClass:true,nav:true,responsive:{0:{items:1,nav:true},600:{items:2,nav:false},1000:{items:3,}}})}
if($('#blog-slider').length){$("#blog-slider").owlCarousel({items:1,autoPlay:true,nav:true});}
if($('#cp-attorneys-slider').length){$("#cp-attorneys-slider").owlCarousel({autoPlay:true,nav:true,items:1,itemsDesktop:[1199,3],itemsDesktopSmall:[979,3]});}
if($('#cp-client-slider').length){$("#cp-client-slider").owlCarousel({autoPlay:true,items:1,itemsDesktop:[1199,3],itemsDesktopSmall:[979,3]});}
if($('.countdown236').length){var austDay=new Date();austDay=new Date(2015,11- 1,11,15,35,0);$('.countdown236').countdown({until:austDay,});$('#year').text(austDay.getFullYear());}
$.fn.slideFadeToggle=function(speed,easing,callback){return this.animate({opacity:'toggle',height:'toggle'},speed,easing,callback);};if($('.accordion_cp').length){$('.accordion_cp').accordion({defaultOpen:'section1',cookieName:'nav',speed:'slow',animateOpen:function(elem,opts){elem.next().stop(true,true).slideFadeToggle(opts.speed);},animateClose:function(elem,opts){elem.next().stop(true,true).slideFadeToggle(opts.speed);}});}
if($('#map_contact_2').length){var map;var myLatLng=new google.maps.LatLng(19.4494479,-99.1362409);var myOptions={zoom:12,center:myLatLng,zoomControl:true,mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel: false,mapTypeControl:false,styles:[{saturation:-100,lightness:10}],}
map=new google.maps.Map(document.getElementById('map_contact_2'),myOptions);var marker=new google.maps.Marker({position:map.getCenter(),map:map,icon:'images/map-icon.png'});marker.getPosition();}
if($('#content-1').length){$("#content-1").mCustomScrollbar({horizontalScroll:false});$(".content.inner").mCustomScrollbar({scrollButtons:{enable:true}});}
if($('#map_contact_1').length){var map;var myLatLng=new google.maps.LatLng(48.85661,2.35222);var myOptions={zoom:12,center:myLatLng,zoomControl:true,mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControl:false,styles:[{saturation:-100,lightness:10}],}
map=new google.maps.Map(document.getElementById('map_contact_1'),myOptions);var marker=new google.maps.Marker({position:map.getCenter(),map:map,icon:'images/map-icon.png'});marker.getPosition();}});