/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. LIGHTBOX
/*-----------------------------------------------------------------------------------*/
    $('.lightbox-link').magnificPopup({
        type:'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        gallery:{
        enabled:false
        }
    });
});