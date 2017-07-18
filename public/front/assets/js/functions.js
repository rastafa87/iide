(function($) {
    "use strict";
    
    // Navigation Menu Expander
    $('#nav-expander').sidr({
        side: 'right'
    });
    
    $('#sidr li a.more').click(function(e) {
        e.preventDefault();
        $(this).parent().find('ul').toggle();
    });
    
    // Subnav article loader
    $('#menu .subnav-menu li').hover(function() {
        $(this).parent().find('li').removeClass('current');
        $(this).addClass('current');
    });
    
    // Homepage slider
    function runCarousel() {
        $('#slider-carousel').carouFredSel({
            responsive	: true,
            items		: 4,
            width: '100%',
            height: 'auto',
            prev: '#slider-prev',
            next: '#slider-next',
            auto: true,
            transition: true,
            direction            : "up",
            swipe: {
                    onMouse: true,
                    onTouch: true
            },
            scroll : {
                items           : 1,
                easing          : "elastic",
                duration        : 100,
                pauseOnHover    : true
            }
        });
    }
    $("#slider-carousel").imagesLoaded(runCarousel);
    // Init photobox
    $('#weekly-gallery').photobox('a',{ time:0 });
    $('#article-gallery').photobox('a',{ time:0 });
    
    // Init datepicker for archive page
    $('#archive-date-picker').datepicker({
        format: 'mm/dd/yyyy'
    });
    
    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    
})(jQuery);