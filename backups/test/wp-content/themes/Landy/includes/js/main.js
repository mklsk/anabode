/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  0. PARALLAX
/*-----------------------------------------------------------------------------------*/

    (function($) {

        $.fn.parallax = function(options) {

            var windowHeight = $(window).height();
            // Establish default settings
            var settings = $.extend({
                speed        : 0.15
            }, options);
            // Iterate over each object in collection
            return this.each( function() {
                // Save a reference to the element
                var $this = $(this);
                // Set up Scroll Handler
                $(document).scroll(function(){

                    var scrollTop = $(window).scrollTop();
                    var offset = $this.offset().top;
                    var height = $this.outerHeight();

                    // Check if above or below viewport
                    if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
                        return;
                    }

                    var yBgPosition = Math.round((offset - scrollTop) * settings.speed);

                        // Apply the Y Background Position to Set the Parallax Effect
                    $this.css('background-position', 'center ' + yBgPosition + 'px');
                        
                });
            });
        }
        
    }(jQuery));

    $('.parallax').parallax({
        speed : 0.15
    });

/*-----------------------------------------------------------------------------------*/
/*  1. FITVIDS
/*-----------------------------------------------------------------------------------*/

    $(".fitvid").fitVids();

/*-----------------------------------------------------------------------------------*/
/*	2. FLEXSLIDER SETTINGS
/*-----------------------------------------------------------------------------------*/

    $(".flexslider").flexslider({
        animation: 'fade',
        touch: true,
        slideshow: true,
        controlNav: true,
        directionNav: false,
        smoothHeight: true
    });

/*-----------------------------------------------------------------------------------*/
/*  3. SCROLL TO TOP BUTTON
/*-----------------------------------------------------------------------------------*/
     
    $('.totop').click(function () { 
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });

/*-----------------------------------------------------------------------------------*/
/*  4. MOBILE NAVIGATION
/*-----------------------------------------------------------------------------------*/

    $("#collapse").hide();
    $(".collapse-menu-inner").toggle(function () {
        
      $("#collapse").slideToggle(300);
      return false;

    }, function () {

      $("#collapse").slideToggle(300);
      return false;
    });
 
/*-----------------------------------------------------------------------------------*/
/*  5. SCROLL DOWN BUTTON HEADER
/*-----------------------------------------------------------------------------------*/

mediaCheck({
media: '(max-width: 1024px)', 
      entry: function () {
      },
      exit: function () {

    $('.down-arrow a').click(function() {
        $.scrollTo($(this).attr('href'), {duration: 800, offset:-60});
        return false;
    });
    }
});

    $('#mobile-device-down a').click(function() {
        $.scrollTo($(this).attr('href'), {duration: 800, offset:0});
        return false;
    });

});