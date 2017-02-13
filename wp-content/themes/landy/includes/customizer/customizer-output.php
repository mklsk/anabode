<?php
/**
 * Theme Customizer Output.
 *
 * @package landy
 */

//Header bg opacity disable
function theme_customizer_general12()
{
?>
<?php if( get_theme_mod('theme_customizer_general12') == '1') { ?>
<style type="text/css">
#header:before  {background: none !important;}
</style>
<?php } ?>

<?php
}
add_action( 'wp_head', 'theme_customizer_general12');

//Header bg opacity
function theme_customizer_general11()
{
?>
<?php if( get_theme_mod('theme_customizer_general11') && get_theme_mod('theme_customizer_general11') !== '70' && get_theme_mod('theme_customizer_general12') !== '1')  { ?>
<style type="text/css">
#header:before  {opacity: 0.<?php echo get_theme_mod( 'theme_customizer_general11', 'general11-1' ); ?>;}
</style>
<?php } ?>

<?php
}
add_action( 'wp_head', 'theme_customizer_general11');

function headerbackground_video()
{ ?>

    <?php if ( get_theme_mod('theme_customizer_headervideourl')) { ?><script>var url_video ="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_headervideourl', '' )."");?>";</script><?php } ?> 
    <?php if ( get_theme_mod('theme_customizer_headervideourl2')) { ?><script>var url_video2 ="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_headervideourl2', '' )."");?>";</script><?php } ?>
    <?php if ( get_theme_mod('theme_customizer_headervideourl3')) { ?><script>var url_video3 ="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_headervideourl3', '' )."");?>";</script><?php } ?>

    <?php
}
add_action( 'wp_head', 'headerbackground_video');

function headershow_image()
{ ?>
	<?php global $post; ?>
	<?php if ( is_home() && get_theme_mod('theme_customizer_headerimageblog', true)) { ?>
		<style type="text/css">
		#header {background-image: url("<?php echo '' .get_theme_mod( 'theme_customizer_headerimageblog', '' )."";?>"); }
		</style>
	<?php } else if ( is_single() && get_post_meta($post->ID, '_playne3_imagepickerbg', true)) { ?>
		<style type="text/css">
		#header {background-image: url("<?php global $post; $imagez = get_post_meta( $post->ID, '_playne3_imagepickerbg', true ); echo "$imagez" ?>"); }
		</style>
	<?php } else if (get_post_meta($post->ID, '_playne2_imagepickerbg', true)) { ?>
		<style type="text/css">
		#header {background-image: url("<?php global $post; $images = get_post_meta( $post->ID, '_playne2_imagepickerbg', true ); echo "$images" ?>"); }
		</style>
	<?php } else if ( get_header_image() != '' ) { ?>
		<style type="text/css">
		#header {background-image: url("<?php header_image(); ?>"); }
		</style>
    <?php } ?>

    <?php
}
add_action( 'wp_head', 'headershow_image');

function footer_image()
{
	$footer_bg = get_theme_mod('theme_customizer_footerbgimage');

    if ( $footer_bg !== '' ) { ?>
		<style type="text/css">
			#footer {background-image: url("<?php echo esc_url('' .get_theme_mod( 'theme_customizer_footerbgimage', '' )."");?>");}
		</style>
    <?php } ?>

    <?php
}
add_action( 'wp_head', 'footer_image');

function accent_color()
{
    $bodytitles_color                   = get_theme_mod( 'bodytitles_color' );
    $bodytext_color                     = get_theme_mod( 'bodytext_color' );
    $accent_color                       = get_theme_mod( 'accent_color' );
    $headerlogo_color                   = get_theme_mod('headerlogo_color');
    $headerintro_color                  = get_theme_mod('headerintro_color');
    $headertext_color                   = get_theme_mod('headertext_color');
    $footerheader_color                 = get_theme_mod('footerheader_color');
    $mainsection_color                  = get_theme_mod('mainsection_color' );
    $oddsection_color                   = get_theme_mod('oddsection_color');
    $footer_color                       = get_theme_mod('footer_color');
    $preloader_color                    = get_theme_mod('preloader_color');
    $preloaderaccent_color              = get_theme_mod('preloaderaccent_color');
    $navbg_color                        = get_theme_mod('navbg_color');
    $navdropbg_color                    = get_theme_mod('navdropbg_color');
    $navtext_color                      = get_theme_mod('navtext_color');
    $navaccent_color                    = get_theme_mod('navaccent_color');
    $footertext_color                   = get_theme_mod('footertext_color');
    $footerintro_color                  = get_theme_mod('footerintro_color');
    $footerbottom_color                 = get_theme_mod('footerbottom_color');
    $footerbottomaccent_color           = get_theme_mod('footerbottomaccent_color');
    $footerbottomtext_color             = get_theme_mod('footerbottomtext_color');
    $buttonbgsecond_color               = get_theme_mod('buttonbgsecond_color');
    $buttonbgsecondtext_color           = get_theme_mod('buttonbgsecondtext_color');
    $buttonbg_color                     = get_theme_mod('buttonbg_color');
    $buttonbgtext_color                 = get_theme_mod('buttonbgtext_color');
    $buttonfooterbgsecond_color         = get_theme_mod('buttonfooterbgsecond_color');
    $buttonfooterbgsecondtext_color     = get_theme_mod('buttonfooterbgsecondtext_color');
    $buttonfooterbg_color               = get_theme_mod('buttonfooterbg_color');
    $buttonfooterbgtext_color           = get_theme_mod('buttonfooterbgtext_color');
    $overlaybg_color                    = get_theme_mod('overlaybg_color');
?>

<style type="text/css"> 
<?php if ( get_theme_mod('bodytitles_color')) { ?>
h1, h2, h3, h4, h5, h6 {color:<?php echo $bodytitles_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('bodytext_color')) { ?>
body {color:<?php echo $bodytext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('overlaybg_color')) { ?>
#header:before {background:<?php echo $overlaybg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonbg_color')) { ?>
#header .first-button .main-button {border: 2px solid <?php echo $buttonbg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonbgtext_color')) { ?>
#header .first-button .main-button {color: <?php echo $buttonbgtext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonbg_color')) { ?>
#header .first-button .hvr-sweep-to-top:before, #header .first-button .hvr-sweep-to-bottom:before, #header .first-button .hvr-sweep-to-left:before, #header .first-button .hvr-sweep-to-right:before, #header .first-button .hvr-fade:hover, #header .first-button .hvr-bounce-to-top:before, #header .first-button .hvr-bounce-to-bottom:before, #header .first-button .hvr-bounce-to-left:before, #header .first-button .hvr-bounce-to-right:before {background:<?php echo $buttonbg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonbgsecond_color')) { ?>
#header .second-button .main-button {border: 2px solid <?php echo $buttonbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonbgsecondtext_color')) { ?>
#header .second-button .main-button {color: <?php echo $buttonbgsecondtext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonbgsecond_color')) { ?>
#header .second-button .hvr-sweep-to-top:before, #header .second-button .hvr-sweep-to-bottom:before, #header .second-button .hvr-sweep-to-left:before, #header .second-button .hvr-sweep-to-right:before, #header .second-button .hvr-fade:hover, #header .second-button .hvr-bounce-to-top:before, #header .second-button .hvr-bounce-to-bottom:before, #header .second-button .hvr-bounce-to-left:before, #header .second-button .hvr-bounce-to-right:before {background:<?php echo $buttonbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonfooterbg_color')) { ?>
#footer .first-button .main-button {border: 2px solid <?php echo $buttonfooterbg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonfooterbgtext_color')) { ?>
#footer .first-button .main-button {color: <?php echo $buttonfooterbgtext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonfooterbg_color')) { ?>
#footer .first-button .hvr-sweep-to-top:before, #footer .first-button .hvr-sweep-to-bottom:before, #footer .first-button .hvr-sweep-to-left:before, #footer .first-button .hvr-sweep-to-right:before, #footer .first-button .hvr-fade:hover, #footer .first-button .hvr-bounce-to-top:before, #footer .first-button .hvr-bounce-to-bottom:before, #footer .first-button .hvr-bounce-to-left:before, #footer .first-button .hvr-bounce-to-right:before {background:<?php echo $buttonfooterbg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonfooterbgsecond_color')) { ?>
#footer .second-button .main-button {border: 2px solid <?php echo $buttonfooterbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonfooterbgsecondtext_color')) { ?>
#footer .second-button .main-button {color: <?php echo $buttonfooterbgsecondtext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('buttonfooterbgsecond_color')) { ?>
#footer .second-button .hvr-sweep-to-top:before, #footer .second-button .hvr-sweep-to-bottom:before, #footer .second-button .hvr-sweep-to-left:before, #footer .second-button .hvr-sweep-to-right:before, #footer .second-button .hvr-fade:hover, #footer .second-button .hvr-bounce-to-top:before, #footer .second-button .hvr-bounce-to-bottom:before, #footer .second-button .hvr-bounce-to-left:before, #footer .second-button .hvr-bounce-to-right:before {background:<?php echo $buttonfooterbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('mainsection_color')) { ?>
.container .even, .even .entry-content {background:<?php echo $mainsection_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('headerlogo_color')) { ?>
.logo a, #header .socials a:hover, .toggle-sidebar {color:<?php echo $headerlogo_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('headerintro_color')) { ?>
#header h2, .down-arrow a i {color:<?php echo $headerintro_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('navbg_color')) { ?>
.mobile-menu {background:<?php echo $navbg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('navdropbg_color')) { ?>
#dynamic {background:<?php echo $navdropbg_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('accent_color')) { ?>
.owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, .flex-control-paging li a.flex-active, .flex-control-paging li a:hover, .pricing-table .featured .pricing-header, #footer input[type="button"]:hover, .footer-widget input[type="button"]:hover, #footer input[type="submit"]:hover, .footer-widget input[type="submit"]:hover, #footer input[type="reset"]:hover, .footer-widget input[type="reset"]:hover {background: <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('headertext_color')) { ?>
#header .lead, #header .date-title, #header .date-title a, #header .lead a {color:<?php echo $headertext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('accent_color')) { ?>
#sidebar .widget input.search-form-input, #sidebar .widget_archive select, #sidebar .widget_categories select#cat, #sidebar select, #wp-calendar tbody td#today, .slick-dots li:hover, .slick-dots li.slick-active, .button-more, #respond .form-submit, body input.search-form-input, #sidebar .widget_tag_cloud a {border: 2px solid <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('accent_color')) { ?>
.flex-control-paging li a.flex-active, .flex-control-paging li a:hover, .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, #header input[type="button"], #header input[type="submit"], #header input[type="reset"], #footer input[type="button"], .footer-widget input[type="button"], #footer input[type="submit"], .footer-widget input[type="submit"], #footer input[type="reset"], .footer-widget input[type="reset"] {border:2px solid <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('accent_color')) { ?>
.nav-toggle, #header input[type="button"]:hover, .header-widget input[type="button"]:hover, #header input[type="submit"]:hover, .header-widget input[type="submit"]:hover, #header input[type="reset"]:hover, .header-widget input[type="reset"]:hover, .slick-dots li:hover, .slick-dots li.slick-active, .border-block, .button-more:hover, #respond .form-submit:hover, #wp-calendar tr th, #sidebar .widget_tag_cloud a:hover {background: <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('accent_color')) { ?>
#sidebar .widget a:hover, #sidebar .widget ul li a:before, #sidebar .widget_recent_comments ul li:before, .button, .button.normal, body a, .entry-title a:hover, #commentform #submit, #sidebar select, #sidebar .widget input.search-form-input, #sidebar .widget_archive select, #sidebar .widget_categories select#cat, #wp-calendar tbody td#today, .button-more, body input.search-form-input, #sidebar .widget_tag_cloud a {color:<?php echo $accent_color; ?>;} 
<?php } ?>
<?php if ( get_theme_mod('footerheader_color')) { ?>
.error404, #header {background-color:<?php echo $footerheader_color; ?> !important;} 
<?php } ?>
<?php if ( get_theme_mod('footer_color')) { ?>
#footer {background-color:<?php echo $footer_color; ?>;} 
<?php } ?>
<?php if ( get_theme_mod('preloader_color')) { ?>
#loader {background-color:<?php echo $preloader_color; ?> !important;}
<?php } ?>
<?php if ( get_theme_mod('navtext_color')) { ?>
.nav a, #header .socials a, .mobile-menu-inner .nav-mobile li a {color:<?php echo $navtext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('navaccent_color')) { ?>
.nav a:hover, #header .socials a:hover {color:<?php echo $navaccent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('navaccent_color')) { ?>
.nav .current-menu-item > a, .nav a:hover, .nav a.selected, .mobile-menu-inner .nav-mobile .current-menu-item > a, .mobile-menu-inner .nav-mobile a:hover, .mobile-menu-inner .nav-mobile a.selected {color:<?php echo $navaccent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('preloaderaccent_color')) { ?>
.load8 .loader {border-left: 1.1em solid <?php echo $preloaderaccent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('footertext_color')) { ?>
#footer .lead {color:<?php echo $footertext_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('footerintro_color')) { ?>
#footer h2, #footer .socials a {color:<?php echo $footerintro_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('footerbottom_color')) { ?>
.footer-bottom {background:<?php echo $footerbottom_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('footerbottomaccent_color')) { ?>
.footer-bottom a:hover {color:<?php echo $footerbottomaccent_color; ?>;}
<?php } ?>
<?php if ( get_theme_mod('footerbottomtext_color')) { ?>
.footer-bottom, .footer-bottom a {color:<?php echo $footerbottomtext_color; ?>;}
<?php } ?>
</style>
    <?php
}
add_action( 'wp_head', 'accent_color');
	

// Buttons and intro text on full homepage
function playne_custom_button_colors()
{ ?>

<?php global $post; if ( get_post_meta($post->ID, '_playne2_buttoncolor', true) or get_post_meta($post->ID, '_playne2_buttonbg', true) or get_post_meta($post->ID, '_playne2_buttoncolor2', true) or get_post_meta($post->ID, '_playne_buttonbg2', true)) { ?> 
        <?php 
        $_playne_custom_page_buttoncolor = get_post_meta( $post->ID, '_playne2_buttoncolor', true );
        $_playne_custom_page_buttoncolor2 = get_post_meta( $post->ID, '_playne2_buttoncolor2', true );
        $_playne_custom_page_buttonbg = get_post_meta( $post->ID, '_playne2_buttonbg', true );
        $_playne_custom_page_buttonbg2 = get_post_meta( $post->ID, '_playne2_buttonbg2', true );
        ?>
<style type="text/css"> 
<?php if (get_post_meta( $post->ID, '_playne2_buttoncolor', true )) { ?> #header .first-button .main-button {color:<?php echo esc_attr("$_playne_custom_page_buttoncolor");  ?>}<?php } ?>
<?php if (get_post_meta( $post->ID, '_playne2_buttoncolor2', true )) { ?> #header .second-button .main-button { color:<?php echo esc_attr("$_playne_custom_page_buttoncolor2");  ?>}<?php } ?>
<?php if (get_post_meta( $post->ID, '_playne2_buttonbg', true )) { ?> #header .first-button .hvr-sweep-to-top:before, #header .first-button .hvr-sweep-to-bottom:before, #header .first-button .hvr-sweep-to-left:before, #header .first-button .hvr-sweep-to-right:before, #header .first-button .hvr-fade:hover, #header .first-button .hvr-bounce-to-top:before, #header .first-button .hvr-bounce-to-bottom:before, #header .first-button .hvr-bounce-to-left:before, #header .first-button .hvr-bounce-to-right:before {background: <?php echo esc_attr("$_playne_custom_page_buttonbg");  ?>} #header .first-button .main-button {border:2px solid <?php echo esc_attr("$_playne_custom_page_buttonbg");  ?>}<?php } ?>
<?php if (get_post_meta( $post->ID, '_playne2_buttonbg2', true )) { ?> #header .second-button .hvr-sweep-to-top:before, #header .second-button .hvr-sweep-to-bottom:before, #header .second-button .hvr-sweep-to-left:before, #header .second-button .hvr-sweep-to-right:before, #header .second-button .hvr-fade:hover, #header .second-button .hvr-bounce-to-top:before, #header .second-button .hvr-bounce-to-bottom:before, #header .second-button .hvr-bounce-to-left:before, #header .second-button .hvr-bounce-to-right:before {background: <?php echo esc_attr("$_playne_custom_page_buttonbg2");  ?>} #header .second-button .main-button {border:2px solid <?php echo esc_attr("$_playne_custom_page_buttonbg2");  ?>}<?php } ?>
</style>
<?php } ?>

<?php
}
add_action( 'wp_head', 'playne_custom_button_colors');