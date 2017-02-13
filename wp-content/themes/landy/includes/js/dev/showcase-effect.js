(function($) {

  // Ready functions
  $(document).ready(function() {
      landyShowcaseParallax();
  });

  function landyShowcaseParallax() {

    mediaCheck({
    media: '(max-width: 1024px)', 
        entry: function () {
        },
        exit: function () {

          var divs = $('#move-showcase');
          $(window).on('scroll', function() {
            var st = $(this).scrollTop();
            divs.css({ 'transform' : 'translate3d(0,' + Math.round(st/20) + 'px,0)' });

          });

        }

    });

  }

})(jQuery);