/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. SCROLLING OPACITY OF INTRO TEXT
/*-----------------------------------------------------------------------------------*/
 
mediaCheck({
media: '(max-width: 1024px)', 
    entry: function () {
    },
    exit: function () {

        var divs = $('#fadeOut');
        $(window).on('scroll', function() {
            var st = $(this).scrollTop();
            divs.css({ 'opacity' : (1 - st/450) });
        });
    }

});
 
});