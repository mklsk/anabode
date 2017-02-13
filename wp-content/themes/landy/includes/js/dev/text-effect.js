(function($) {

    // Ready functions
    $(document).ready(function() {
        landyTextScroll();
    });

    function landyTextScroll() {

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
    }
 
})(jQuery);