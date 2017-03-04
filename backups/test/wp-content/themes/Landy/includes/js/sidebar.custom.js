/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";

/*-----------------------------------------------------------------------------------*/
/*  1. NAVIGATION TOGGLE
/*-----------------------------------------------------------------------------------*/
    
       var showRightPush = document.getElementById( 'showRightPush' ),
            showRightPushMobile = document.getElementById( 'showRightPushMobile' ),
            menuRight = document.getElementById( 'sidebar-menu' ),   
            body = document.body;
 
        showRightPush.onclick = function() {
            $(".nano").nanoScroller({iOSNativescrolling: true, preventPageScrolling: true});
            classie.toggle( this, 'active' );
            classie.toggle( body, 'sidebar-menu-push-toleft' );
            classie.toggle( menuRight, 'sidebar-menu-open' );
        };
        showRightPushMobile.onclick = function() {
            $(".nano").nanoScroller({iOSNativescrolling: true, preventPageScrolling: true});
            classie.toggle( this, 'active' );
            classie.toggle( body, 'sidebar-menu-push-toleft' );
            classie.toggle( menuRight, 'sidebar-menu-open' );
            disableOther( 'showRightPushMobile' );
        };
        function disableOther( button ) {
            if( button !== 'showRightPush' ) {
                classie.toggle( showRightPush, 'disabled' );
            }
            if( button !== 'showRightPushMobile' ) {
                classie.toggle( showRightPushMobile, 'disabled' );
            }
        }
 
});