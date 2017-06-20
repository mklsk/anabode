/*CUSTOM JS EXTENDING LANDY THEME FUNCTIONALITY*/

(function($) {
  $(document).ready(function() {
  

    //insert the video into smart landlords section
    $('#smart-landlords .full-image').append('<video playsinline loop class="landlords_video"><source src="http://anabode.net/develop/wp-content/uploads/2017/03/video.mp4" type="video/mp4"></video>');
    $('#smart-landlords .full-image').append('<img class="cross" src="http://anabode.net/develop/wp-content/uploads/2017/06/cross.svg"></img>');


    $('#smart-landlords .feature_icon').click(function(){

        $('#smart-landlords .row.clearfix.no-bottom').height( $('#smart-landlords .row.clearfix.no-bottom').height() );
        $('#smart-landlords .feature_icon').fadeOut(500);
        $('.to_go').fadeOut(500);

        $('#smart-landlords .full-image').children(':first').fadeOut(500, function(){

          $('.landlords_video').fadeIn(1000, function(){

             $('.landlords_video')[0].play();
          });
          $('.cross').fadeIn(1000);

        });
     });

    $('.cross').click(function(){

      $('.cross').fadeOut(500);
      $('.landlords_video').fadeOut(500, function(){

        $('.landlords_video')[0].currentTime = 0
        $('#smart-landlords .feature_icon').fadeIn(1000);
        $('.to_go').fadeIn(1000);
        $('#smart-landlords .full-image').children(':first').fadeIn(1000);

      });

    });

    //mobile side menu anchors
    $('.mobile-menu-inner .menu-item-313 a').attr("href", '#landlords_target');
    $('.mobile-menu-inner .menu-item-465 a').attr("href", '#features_target');
    $('.mobile-menu-inner .menu-item-466 a').attr("href", '#testimonials_target');
    $('.mobile-menu-inner .menu-item-467 a').attr("href", '#contractors_target');
    $('.mobile-menu-inner .menu-item-679 a').attr("href", '#plans_target');
    $('.mobile-menu-inner .menu-item-468 a').attr("href", '#anchor_target');



    //precedence of learn more blocks
    $('#trusted-contractors .playne_one-third').css('position', 'relative');
    $('#trusted-contractors .playne_one-third').slice(0,1).css('z-index',1);
    $('#trusted-contractors .playne_one-third').slice(1,2).css('z-index',2);
    $('#trusted-contractors .playne_one-third').slice(2,3).css('z-index',3);
    $('#trusted-contractors .playne_one-third').slice(3,4).css('z-index',4);
    $('#trusted-contractors .playne_one-third').slice(4,5).css('z-index',5);
    $('#trusted-contractors .playne_one-third').slice(5,6).css('z-index',6);

    $('#features .playne_one-third').css('position', 'relative');
    $('#features .playne_one-third').slice(0,1).css('z-index',1);
    $('#features .playne_one-third').slice(1,2).css('z-index',2);
    $('#features .playne_one-third').slice(2,3).css('z-index',3);
    $('#features .playne_one-third').slice(3,4).css('z-index',4);
    $('#features .playne_one-third').slice(4,5).css('z-index',5);
    $('#features .playne_one-third').slice(5,6).css('z-index',6);
    $('#features .playne_one-third').slice(6,7).css('z-index',7);
    $('#features .playne_one-third').slice(7,8).css('z-index',8);
    $('#features .playne_one-third').slice(8,9).css('z-index',9);



    //reloading an element
    function refresh() {

      var container = document.getElementById("download_link");
      var content = container.innerHTML;
      container.innerHTML = content;
    }


    //download button and header
    $(window).on('load resize', function() {
      var w = $(window).width();
      var h = $(window).height();
      h = h - $('.mobile-menu.clearfix').height();
      var h_s = h + 'px';

      //set container height equal to image size for smart landlords
      $('#smart-landlords .full-image').height( $('#smart-landlords .full-image').children(':first').height() );

      if(w >= 500){

         $('.landlords_video').width( $('#smart-landlords .full-image').width() );        
      } else {

        $('.landlords_video').width(w);

        $('.landlords_video').css('margin-left', '-' + w*0.05 + 'px')
      }
     


       if (w <= 500) {

          $('#header').css('max-height', 'none');
          $('#header').css('height', h_s);
       } else {

          $('#header').css('max-height', '530px');
          $('#header').css('height', '100%');
       }


      if (w >= 1030) {
        $('.download').hide();
        $('.desktop-button').show();

      } else {

        $('.download').show();
        refresh();
        $('.desktop-button').hide();


        var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
        var ua = navigator.userAgent.toLowerCase();
        var Android = ua.indexOf("android") > -1;
        var link;
        var text;

        if (iOS) {
          link = 'https://www.apple.com/uk/itunes/charts/free-apps/';
          text = '<i class="fa fa-apple"></i> App Store';
        } else if (Android) {
          link = 'https://play.google.com/store?hl=en_GB';
          text = '<i class="fa fa-android"></i> Google Play';
        } else {
          link = 'https://www.microsoft.com/cy-gb/store/apps/windows-phone?rtc=1';
          text = 'Download';
        }

        $('#download_link').attr("href", link);
        $('#download_link')[0].innerHTML = text;

      }
    }
    );


   



    /*FEATURES SECTION*/

    $('.learn').data('stuck', 'false');

    $('.hidden_descrp').on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(e) {

      $(this).css('display', 'none');

    });

    //hover of learn 
    $('.learn').hover(function(e) {

      e.stopPropagation();
      var status = $(this).data('open');
      var is_stuck = $(this).data('stuck')
      var source = $(this).attr('class').split(' ').pop();

      if (is_stuck != 'true') {
        $('.hidden_descrp.' + source).css('display', 'block');
        $('.hidden_descrp.' + source).css('opacity', '1');
      }



    }, function(e) {

      e.stopPropagation();
      var status = $(this).data('open');
      var source = $(this).attr('class').split(' ').pop();
      var is_stuck = $(this).data('stuck');

      if (is_stuck != 'true') {

        $('.hidden_descrp.' + source).css('opacity', '0');
      }


    });


    //click learn
    $('.learn').click(function(event) {


      var is_stuck = $(this).data('stuck');
      var source = $(this).attr('class').split(' ').pop();

      //if not displayed
      if (is_stuck != 'true') {

        $(this).data('stuck', 'true');
        $('.hidden_descrp.' + source).css('display', 'block');
        $('.hidden_descrp.' + source).css('opacity', '1');

      } else {

        $(this).data('stuck', 'false');
        $('.hidden_descrp.' + source).css('opacity', '0');
      }
    });


    //window click
    $(window).click(function(evt) {


      if (evt.target.innerHTML == 'Learn more') {

        return;

      } else {

        $('.hidden_descrp').css('opacity', '0');
        $('.learn').data('stuck', 'false');
      }
    });


    /*TESTIMONIALS SECTION*/


    //add quotation marks to the quotes
    $('.text-blockquote.custom').children('.quote').append('<span class="quote_mark">&ldquo;</span>');
    $('.text-blockquote.custom').children('.quote').prepend('<span class="quote_mark">&rdquo;</span>');


    /* GET STARTED SECTION*/

    //hide tenant from
    $('.tenant_form').hide();
    $('.landlord').addClass('switcher_on');


    //add color switching to form changing buttons

    $('.landlord').click(function() {

      if (!$(this).hasClass('switcher_on')) {

        $(this).addClass('switcher_on');
        $('.tenant').removeClass('switcher_on');

        $('.landlord_form').show();
        $('.tenant_form').hide();

      }

    });

    $('.tenant').click(function() {

      if (!$(this).hasClass('switcher_on')) {

        $(this).addClass('switcher_on');
        $('.landlord').removeClass('switcher_on');

        $('.landlord_form').hide();
        $('.tenant_form').show();

      }
    });

  });


  $(document).ready(function() {
    $('#dropdown').css('color', 'gray');
    $('#dropdown').change(function() {
      var current = $('#dropdown').val();
      if (current != 'null') {
        $('#dropdown').css('color', '#4d515cx');
      } else {
        $('#dropdown').css('color', 'gray');
      }
    });
  });



})(jQuery);
