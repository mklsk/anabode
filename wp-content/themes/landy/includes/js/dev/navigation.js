(function($) {

    // Ready functions
    $(document).ready(function() {
        landyNavigation();
    });

    // Navigation
    function landyNavigation() {

        // Fixed navigation
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
            if (scroll >= 120) {
                $("#dynamic").addClass("show");
            } else {
                $("#dynamic").removeClass("show");
            }
        });
     
        // Waypoints
        var sections = $("section");
        var navigation_links = $(".nav a");
        
        sections.waypoint({
            handler: function(event, direction) {
            
                var active_section;
                active_section = jQuery(this);
                if (direction === "up") { active_section = active_section.prev(); }

                var active_link = jQuery('.nav a[href="#' + active_section.attr("id") + '"]');
                navigation_links.removeClass("selected");
                active_link.addClass("selected");

            },
            offset: '30'
        });

        // Scrolling navigation
        $('.nav a').click(function() {
            $.scrollTo($(this).attr('href'), {duration: 800, offset:-60});
            return false;
        });

        $('.mobile-menu-inner .nav-mobile li a').click(function() {
            $.scrollTo($(this).attr('href'), {duration: 800, offset:0});
            return false;
        });

        // Mobile Navigation
        $("#collapse").hide();
        $("#collapse-menu").toggle(function () {
            
            $("#collapse").slideToggle(300);
            return false;

            }, function () {

            $("#collapse").slideToggle(300);
            return false;
        });

    }


})(jQuery);