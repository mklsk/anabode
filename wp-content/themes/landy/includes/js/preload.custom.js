/*global jQuery:false */
(function($) {
    $(window).load(function() {
        "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. PRELOADING ANIMATION
/*-----------------------------------------------------------------------------------*/

        $('#loading-status').fadeOut(); 
        $('#loader').fadeOut('fast');
        $('body').css({'overflow':'visible'});
         setTimeout(function(){$('#main-wrap').removeClass('nopreload')},200);

    });
})(jQuery);