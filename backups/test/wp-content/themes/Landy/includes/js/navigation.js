/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. FIXED SCROLL MENU
/*-----------------------------------------------------------------------------------*/

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 120) {
            $("#dynamic").addClass("show");
        } else {
            $("#dynamic").removeClass("show");
        }
    });
 
/*-----------------------------------------------------------------------------------*/
/*  2. NAVIGATION WAYPOINTS
/*-----------------------------------------------------------------------------------*/
       
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

/*-----------------------------------------------------------------------------------*/
/*  3. SCROLLING NAVIGATION
/*-----------------------------------------------------------------------------------*/

    $('.nav a').click(function() {
        $.scrollTo($(this).attr('href'), {duration: 800, offset:-60});
        return false;
    });

    $('.mobile-menu-inner .nav-mobile li a').click(function() {
        $.scrollTo($(this).attr('href'), {duration: 800, offset:0});
        return false;
    });

/*-----------------------------------------------------------------------------------*/
/*  4. MOBILE NAVIGATION
/*-----------------------------------------------------------------------------------*/

    $("#collapse").hide();
    $("#collapse-menu").toggle(function () {
        
        $("#collapse").slideToggle(300);
        return false;

        }, function () {

        $("#collapse").slideToggle(300);
        return false;
    });

});