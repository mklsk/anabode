(function($) {

  // Ready functions
  $(document).ready(function() {
    landyFeature();
    landyGeneral();
    landyMobileMenu();
    landyDown();
  });

  // Feature left & right
  function landyFeature() {
    $(".feature").each(function() {
      i = $(this).children(".feature-text").height();
      $(this).children(".feature-img").css("min-height", i + "px");
    });
  }

  // General functions
  function landyGeneral() {
    $(".fitvid").fitVids();
    $(".flexslider").flexslider({
      animation: 'fade',
      touch: true,
      slideshow: true,
      controlNav: true,
      directionNav: false,
      smoothHeight: true
    });
    $('.totop').click(function() {
      $('html, body').animate({
        scrollTop: 0
      }, 600);
      return false;
    });
  }

  // Mobile Menu
  function landyMobileMenu() {
    //$("#collapse").hide();
    $(".collapse-menu-inner").toggle(function() {
      $("#collapse").toggleClass("burger-open");
      return false;
    }, function() {
      $("#collapse").toggleClass("burger-open");
      return false;
    });

    //    $(".collapse-menu-inner i").click(function () {
    //      $('#collapse').addClass('burger-open');
    //    });

    $("#collapse").click(function(e) {
      if (!$('.collapse-darker').is(e.target)) {
        $("#collapse").removeClass("burger-open");
      }
    });
  }
  //Burger Social 
  $(document).ready(function() {
    $icons = $(".footer_icons").clone();
    //console.log($icons);
    $(".burger-icons").append($icons);
  });

  function landyDown() {
    mediaCheck({
      media: '(max-width: 1024px)',
      entry: function() {},
      exit: function() {

        $('.down-arrow a').click(function() {
          $.scrollTo($(this).attr('href'), {
            duration: 800,
            offset: -60
          });
          return false;
        });
      }
    });

    $('#mobile-device-down a').click(function() {
      $.scrollTo($(this).attr('href'), {
        duration: 800,
        offset: 0
      });
      return false;
    });

  }




  /*TESTIMONIALS SLIDER*/

  $(document).ready(function() {

    $('.testims_row').on('init', function(slick) {

      $('.testims_wrap').bind('oanimationend animationend webkitAnimationEnd', function() {
        $('.slick-current .one_testim').children('.filter').css('opacity', '0.7');
        $('.slick-current .one_testim').children('.text-blockquote.custom').children('.quote').css('opacity', '1');
        $('.slick-current .one_testim').children('.text-blockquote.custom').children('h6').css('opacity', '0');
        $('.slick-current .one_testim').children('.text-blockquote.custom').children('.excerpt').css('opacity', '0');


        $('.slick-slide:not(.slick-current) .one_testim').children('.filter').css('opacity', '0');
        $('.slick-slide:not(.slick-current) .one_testim').children('.text-blockquote.custom').children('.quote').css('opacity', '0');
        $('.slick-slide:not(.slick-current) .one_testim').children('.text-blockquote.custom').children('h6').css('opacity', '1');
        $('.slick-slide:not(.slick-current) .one_testim').children('.text-blockquote.custom').children('.excerpt').css('opacity', '1');
      });




      $('.slick-current .one_testim').click(function() {

        //hide
        if ($(this).children('.filter').css('opacity') > 0) {

          $(this).children('.filter').css('opacity', '0');
          $(this).children('.text-blockquote.custom').children('.quote').css('opacity', '0');
          $(this).children('.text-blockquote.custom').children('h6').css('opacity', '1');
          $(this).children('.text-blockquote.custom').children('.excerpt').css('opacity', '1');

        //show
        } else {

          $('.slick-current .one_testim').children('.filter').css('opacity', '0.7');
          $('.slick-current .one_testim').children('.text-blockquote.custom').children('.quote').css('opacity', '1');
          $('.slick-current .one_testim').children('.text-blockquote.custom').children('h6').css('opacity', '0');
          $('.slick-current .one_testim').children('.text-blockquote.custom').children('.excerpt').css('opacity', '0');
        }


      });

    });



    $('.testims_row').on('afterChange', function(slick, currentSlide) {


      $('.slick-slide:not(.slick-current) .one_testim').unbind('click');


      $('.slick-current .one_testim').click(function() {

        //hide
        if ($(this).children('.filter').css('opacity') > 0) {

          $(this).children('.filter').css('opacity', '0');
          $(this).children('.text-blockquote.custom').children('.quote').css('opacity', '0');
          $(this).children('.text-blockquote.custom').children('h6').css('opacity', '1');
          $(this).children('.text-blockquote.custom').children('.excerpt').css('opacity', '1');

        //show
        } else {

          $('.slick-current .one_testim').children('.filter').css('opacity', '0.7');
          $('.slick-current .one_testim').children('.text-blockquote.custom').children('.quote').css('opacity', '1');
          $('.slick-current .one_testim').children('.text-blockquote.custom').children('h6').css('opacity', '0');
          $('.slick-current .one_testim').children('.text-blockquote.custom').children('.excerpt').css('opacity', '0');
        }


      });


      $('.slick-current .one_testim').children('.filter').css('opacity', '0.7');
      $('.slick-current .one_testim').children('.text-blockquote.custom').children('.quote').css('opacity', '1');
      $('.slick-current .one_testim').children('.text-blockquote.custom').children('h6').css('opacity', '0');
      $('.slick-current .one_testim').children('.text-blockquote.custom').children('.excerpt').css('opacity', '0');


      $('.slick-slide:not(.slick-current) .one_testim').children('.filter').css('opacity', '0');
      $('.slick-slide:not(.slick-current) .one_testim').children('.text-blockquote.custom').children('.quote').css('opacity', '0');
      $('.slick-slide:not(.slick-current) .one_testim').children('.text-blockquote.custom').children('h6').css('opacity', '1');
      $('.slick-slide:not(.slick-current) .one_testim').children('.text-blockquote.custom').children('.excerpt').css('opacity', '1');

    });



    $('.testims_row').slick({
      dots: true,
      arrows: false,
      infinite: true,
      centerMode: true,
      centerPadding: '9%',
      speed: 1500,
      focusOnSelect: true,
      slidesToShow: 3,
      responsive: [

        {
          breakpoint: 1450,
          settings: {
            centerPadding: '7%'
          }
        },
        {
          breakpoint: 1350,
          settings: {
            centerPadding: '4%'
          }
        },
        {
          breakpoint: 1260,
          settings: {
            centerPadding: '0px'
          }
        },
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
          }
        }

      ]

    });




  });


  // $(window).on('load resize', function() {
  //   var w = $(window).width();

  //   if (w >= 700) {



  //   } else {
  //     if (!$('.testims_row').hasClass('slick-slider')) {
  //       $('.testims_row').slick({
  //         slidesToShow: 1,
  //         slidesToScroll: 1
  //       });
  //     }
  //   }
  // });




})(jQuery);
