/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. SLICK SLIDER MAIN GALLERY
/*-----------------------------------------------------------------------------------*/
    $('.center-slick').slick({
      centerMode: true,
      centerPadding: '60px',
      slidesToShow: 3,
      dots: false,
      draggable: false,
      arrows: true,
      responsive: [
        {
          breakpoint: 770,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });

/*-----------------------------------------------------------------------------------*/
/*  2. SLICK SLIDER TESTIMONIALS
/*-----------------------------------------------------------------------------------*/

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        asNavFor: '.slider-for',
        dots: false,
        draggable: false,
        arrows: true,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 770,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: true,
            centerMode: true,
            slidesToShow: 1
          }
        }
      ]
    });

});