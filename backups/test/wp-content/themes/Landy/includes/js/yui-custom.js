/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  12. PARALLAX SCROLL AND FADE IMAGE SHOWCASE
/*-----------------------------------------------------------------------------------*/

  mediaCheck({
  media: '(max-width: 1024px)', 
      entry: function () {
      },
      exit: function () {

      YUI().use('node', function (Y) {
        Y.on('domready', function () {
          
          var scrolling = false,
              lastScroll,
              i = 0;
          
          Y.on('scroll', function () {
            if (scrolling === false) {
              fade();
            }
            scrolling = true;
            setTimeout(function () {
              scrolling = false;
              fade();
            }, 0);
          });
          
          function fade() {
            
            lastScroll = window.scrollY;
            
            Y.one('#move-showcase').setStyles({
              'transform' : 'translate3d(0,' + Math.round(lastScroll/10) + 'px,0)'
            });
            
            if (scrolling === true) {
              window.requestAnimationFrame(fade);
            }
          }
          
        });
      });

      }
  });

});
