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
        $('.totop').click(function () { 
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    }

    // Mobile Menu
    function landyMobileMenu() {
        $("#collapse").hide();
        $(".collapse-menu-inner").toggle(function () {
            
          $("#collapse").slideToggle(300);
          return false;

        }, function () {

          $("#collapse").slideToggle(300);
          return false;
        });
    }

    function landyDown() {
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

    }

})(jQuery);