/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. GALLERY CAROUSEL
/*-----------------------------------------------------------------------------------*/

    $(".owl-carousel").owlCarousel({
        items: 3,
        navigation: true,
        navigationText : false,
        itemsCustom : false,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [980,2],
        itemsTablet: [1024,2],
        itemsTabletSmall: [768,2],
        itemsMobile : [479,1],
        singleItem : false,
        itemsScaleUp : false
    });

});