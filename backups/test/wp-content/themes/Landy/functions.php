<?php

/*-----------------------------------------------------------------------------------*/
/*	0. Load all scripts and stylesheets into the theme
/*-----------------------------------------------------------------------------------*/

function playne_scripts_styles() {
	
    global $post; 

	//Main Stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	//Media queries css
	wp_enqueue_style( 'media-queries', get_template_directory_uri() . "/media-queries.css", array(), '', 'screen' );

	//Animate css
	wp_enqueue_style( 'animate', get_template_directory_uri() . "/includes/css/animate.min.css", array(), '', 'screen' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . "/includes/css/hover.min.css", array(), '', 'screen' );

	//Google Fonts
	wp_enqueue_style('google_montserrat', 'http://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,400,600,700|Raleway:400,700');

	//Font Awesome css
	wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . "/includes/fontawesome/font-awesome.css", array(), '0.1', 'screen' );
	
	//Lightbox css
	wp_enqueue_style( 'lightbox_css', get_template_directory_uri() . "/includes/lightbox/css/lightbox.css", array(), '0.1', 'screen' );

	//jQuery
	wp_enqueue_script('jquery');

  	//Only load navigation script when not disabled
    $navdisable_script = get_theme_mod( 'theme_customizer_general4' );

    if ( $navdisable_script == '1') { 
    } else {
        wp_enqueue_script('navigation_js', get_template_directory_uri() . '/includes/js/navigation.js', false, false , true);
        wp_enqueue_script('waypoints_js', get_template_directory_uri() . '/includes/js/waypoints.min.js', false, false , true);
		wp_enqueue_script('scrollto_js', get_template_directory_uri() . '/includes/js/jquery.scrollto.js', false, false , true);
    }

  	//Only load preloader script when not disabled
    $preload_script = get_theme_mod( 'theme_customizer_general1' );

    if ( $preload_script !== '1' && is_page_template( 'homepage.php' ) ) {
		wp_enqueue_script('preload_custom_js', get_template_directory_uri() . '/includes/js/preload.custom.js', false, false , true);
    }
    
    if(is_page_template( 'homepage.php' )) {
	//slick
	wp_enqueue_script('slick_js', get_template_directory_uri() . '/includes/js/slick.min.js', false, false , true);
	wp_enqueue_script('slickcustom_js', get_template_directory_uri() . '/includes/js/slick.min.custom.js', false, false , true);
	}

	//retina
	//wp_enqueue_script('retina_js', get_template_directory_uri() . '/includes/js/retina.min.js', false, false , true);

  	//Only load image animation scripts when not disabled
    $imageanimation_script = get_theme_mod( 'theme_customizer_general5' );

    if ( $imageanimation_script == '1') {
    } else if ( get_post_meta($post->ID, '_playne2_showcaseimage', true != '') && is_page_template( 'homepage.php' )) {
		wp_enqueue_script('yui_js', get_template_directory_uri() . '/includes/js/yui.js', false, false , true);
		wp_enqueue_script('yuicustom_js', get_template_directory_uri() . '/includes/js/yui-custom.js', false, false , true);
    }

  	//Only load text animation scripts when not disabled
    $textanimation_script = get_theme_mod( 'theme_customizer_general6' );

    if ( $textanimation_script == '1' ) {
    } else {
		wp_enqueue_script('textscroll_js', get_template_directory_uri() . '/includes/js/text-scroll.js', false, false , true);
    }

	//Only load this when there is a video header background
	if (get_theme_mod('theme_customizer_headervideourl')) {
	wp_enqueue_script('backgroundvideo_js', get_template_directory_uri() . '/includes/js/jquery.backgroundvideo.js', false, false , true);
	wp_enqueue_script('backgroundvideocustom_js', get_template_directory_uri() . '/includes/js/jquery.backgroundvideo.custom.js', false, false , true);
	}

	//MediaCheck
	wp_enqueue_script('mediacheck_js', get_template_directory_uri() . '/includes/js/mediaCheck.js', false, false , true);

	//Fitvid
	wp_enqueue_script('fitvids_js', get_template_directory_uri() . '/includes/js/fitvids.js', false, false , true);

	//Flexslider
	wp_enqueue_script('flexslider_js', get_template_directory_uri() . '/includes/js/flexslider-min.js', false, false , true);

	if(is_page_template( 'homepage.php' )) {
	//Owl Gallery
	wp_enqueue_script('owlgallery_js', get_template_directory_uri() . '/includes/js/owl-gallery.js', false, false , true);
	wp_enqueue_script('owlgallerycustom_js', get_template_directory_uri() . '/includes/js/owl-gallery-custom.js', false, false , true);
	}

	$animations_script = get_theme_mod( 'theme_customizer_general3' );
	if ($animations_script == '1') {
    } else if(is_page_template( 'homepage.php' )) {
	//Scroller
	wp_enqueue_script('wow_js', get_template_directory_uri() . '/includes/js/wow.js', false, false , true);
	wp_enqueue_script('wowcustom_js', get_template_directory_uri() . '/includes/js/wow-custom.js', false, false , true);
	}

	if(is_page_template( 'homepage.php' )) {
	//Lightbox
	wp_enqueue_script('lightbox_js', get_template_directory_uri() . '/includes/lightbox/lightbox.js', false, false , true);
	wp_enqueue_script('lightboxcustom_js', get_template_directory_uri() . '/includes/lightbox/lightbox-custom.js', false, false , true);
	}

	//main
	wp_enqueue_script('main_js', get_template_directory_uri() . '/includes/js/main.js', false, false , true);

}
add_action( 'wp_enqueue_scripts', 'playne_scripts_styles' );

function playne_setup() {

/*-----------------------------------------------------------------------------------*/
/*	00. CONDITIONAL METABOX SCRIPT
/*-----------------------------------------------------------------------------------*/

function playne_conditional_metascript( $hook ) {
 
    global $post;
 
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'post' === $post->post_type ) {
            wp_enqueue_script(  'matter-post-format', get_stylesheet_directory_uri().'/includes/js/playne-metabox-admin.js' );
        }
        wp_enqueue_script(  'matter-page-template', get_template_directory_uri().'/includes/js/playne-metabox-admin-page.js' );
    }
}
add_action( 'admin_enqueue_scripts', 'playne_conditional_metascript', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/*	01. TGM plugin acitvation
/*-----------------------------------------------------------------------------------*/

require_once dirname( __FILE__ ) . '/includes/tgmpluginactivation/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'playne_require_plugins' );
 
function playne_require_plugins() {

    $plugins = array(
        array(
            'name'               => 'Custom Playne Post Types', // The plugin name.
            'slug'               => 'customplayneposttypes', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/includes/tgmpluginactivation/plugins/customplayneposttypes.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        )
    );
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

} 

/*-----------------------------------------------------------------------------------*/
/*	02. Add support for the custom header background image
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'custom-header');

/*-----------------------------------------------------------------------------------*/
/*	03. Add customised read more link for blog posts
/*-----------------------------------------------------------------------------------*/

function playne_new_excerpt_more($more) {
       global $post;
	return '<a class="more-linkd" href="'. get_permalink() . '">...</a>';
}
add_filter('excerpt_more', 'playne_new_excerpt_more');

function playne_readmore() {
	global $post;
	$ismore = @strpos( $post->post_content, '<!--more-->');
	if($ismore) : the_content(__( '<div class="centered"><a class="more-linkd" href="'. get_permalink() . '">Read More</a></div>','playne'));
	else : the_excerpt(__( '<div class="centered"><a class="more-linkd" href="'. get_permalink() . '">Read More</a></div>','playne'));
	endif;
}

// custom excerpt length
function playne_custom_excerpt_length( $length ) {
return 12;
}
add_filter( 'excerpt_length', 'playne_custom_excerpt_length', 999 );

// add more link to excerpt
function playne_custom_excerpt_more($more) {
global $post;
return '<a href="'. get_permalink($post->ID) . '">'. __(' ...', 'playne') .'</a>';
}
add_filter('excerpt_more', 'playne_custom_excerpt_more');

/*-----------------------------------------------------------------------------------*/
/*	04. Add custom background color support
/*-----------------------------------------------------------------------------------*/

$argss = array(
	'default-color'          => '#363d40'
);
add_theme_support( 'custom-background', $argss );

/*-----------------------------------------------------------------------------------*/
/*	05. Flexslider support
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() .'/includes/scripts/rotator.php' );

/*-----------------------------------------------------------------------------------*/
/*	06. Translatable theme files
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain( 'playne', get_template_directory() . '/includes/languages' );
 
$locale = get_locale();
$locale_file = get_template_directory_uri() . "/includes/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);	

/*-----------------------------------------------------------------------------------*/
/*	07. Support shortcodes inside widgets
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	08. Pagination support
/*-----------------------------------------------------------------------------------*/

function playne_page_has_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*-----------------------------------------------------------------------------------*/
/*	09. Support customizer panel
/*-----------------------------------------------------------------------------------*/

require_once(dirname(__FILE__) . "/customizer.php");

/*-----------------------------------------------------------------------------------*/
/*	10. Add support for standard wordpress custom formats
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-formats', array( 'quote', 'image', 'video', 'link', 'aside', 'gallery'));

/*-----------------------------------------------------------------------------------*/
/*	11. Custom fonts inside the post editor 
/*-----------------------------------------------------------------------------------*/

require_once(dirname(__FILE__) . "/includes/scripts/add-styles.php");

add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/*	12. Custom menu support for the main menu
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'menus' );
register_nav_menu('main', 'Front page menu');
register_nav_menu('inner', 'Inner pages menu');
register_nav_menu('footer', 'Footer menu');

/*-----------------------------------------------------------------------------------*/
/*	13. Post thumbnails add specific size for responsiveness
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-thumbnails');
add_image_size( 'large-image', 9999, 9999, false ); // Large Post Image

if ( ! isset( $content_width ) ) $content_width = 720;

/*-----------------------------------------------------------------------------------*/
/*	14. Widgets
/*-----------------------------------------------------------------------------------*/

function playne_widgets_init() {

register_sidebar(array(

	'name' => __( 'Sidebar first', 'playne'),

	'id' => 'sidebar-one',

	'description' => __( 'Widgets in this area are used in the first sidebar column', 'playne'),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Sidebar second', 'playne'),

	'id' => 'sidebar-two',

	'description' => __( 'Widgets in this area are used in the second sidebar column', 'playne' ),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Sidebar third', 'playne'),

	'id' => 'sidebar-three',

	'description' => __( 'Widgets in this area are used in the third sidebar column', 'playne' ),

	'before_widget' => '<div class="widget %2$s last clearfix">',
	'after_widget' => '</div>'

));	

register_sidebar(array(

	'name' => __( 'Header subscribe', 'playne'),

	'id' => 'header-one',

	'description' => __( 'Widgets in this area are used are used in the header subscribe area.', 'playne'),

	'before_widget' => '<div class="widget centered %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Footer subscribe', 'playne'),

	'id' => 'footer-subscribe',

	'description' => __( 'Widgets in this area are used are used in the footer subscribe area.', 'playne'),

	'before_widget' => '<div class="widget centered %2$s clearfix">',
	'after_widget' => '</div>'

));

}
add_action( 'widgets_init', 'playne_widgets_init' );


/*-----------------------------------------------------------------------------------*/
/*	15. Specific comments block 
/*-----------------------------------------------------------------------------------*/

function playne_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		
		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">	
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
					
					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>', 'playne'), get_comment_author_link()) ?>
						<div style="clear:both;"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'playne'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'playne'),'  ','') ?>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
			
			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</p>
			</div>
		
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'playne') ?></em>
			<?php endif; ?>    
		</div>
<?php
}

function playne_alter_comment_form_fields($fields){

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name *', 'playne' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="Your Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email">' . '<label for="email">' . __( 'Your Email *', 'playne' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email" type="text" placeholder="Your Email *" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url">' . '<label for="url">' . __( 'Your Website', 'playne' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="url" name="url" type="text" placeholder="Your Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' /></p>';

    return $fields;
}
add_filter('comment_form_default_fields','playne_alter_comment_form_fields');


function playne_cancel_comment_reply_button($html, $link, $text) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="icon-remove-sign"></i> </div>';
}
 
add_action('cancel_comment_reply_link', 'playne_cancel_comment_reply_button', 10, 3);

/*-----------------------------------------------------------------------------------*/
/*	16. Add home link to the menu options
/*-----------------------------------------------------------------------------------*/

add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/*-----------------------------------------------------------------------------------*/
/*	17. Custom CSS 
/*-----------------------------------------------------------------------------------*/

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
    $accent_color = get_option( 'accent_color' );
    $headerlogo_color = get_option ('headerlogo_color');
    $headerintro_color = get_option ('headerintro_color');
    $headertext_color = get_option ('headertext_color');
    $footerheader_color = get_option ('footerheader_color');
    $mainsection_color = get_option( 'mainsection_color' );
    $oddsection_color = get_option ('oddsection_color');
    $footer_color = get_option ('footer_color');
    $preloader_color = get_option ('preloader_color');
    $preloaderaccent_color = get_option ('preloaderaccent_color');
    $navbg_color = get_option ('navbg_color');
    $navdropbg_color = get_option ('navdropbg_color');
    $navtext_color = get_option ('navtext_color');
    $navaccent_color = get_option ('navaccent_color');
    $footertext_color = get_option ('footertext_color');
    $footerintro_color = get_option ('footerintro_color');
    $footerbottom_color = get_option ('footerbottom_color');
    $footerbottomaccent_color = get_option ('footerbottomaccent_color');
    $footerbottomtext_color = get_option ('footerbottomtext_color');
    $buttonbgsecond_color = get_option ('buttonbgsecond_color');
    $buttonbgsecondtext_color = get_option ('buttonbgsecondtext_color');
    $buttonbg_color = get_option ('buttonbg_color');
    $buttonbgtext_color = get_option ('buttonbgtext_color');
    $buttonfooterbgsecond_color = get_option ('buttonfooterbgsecond_color');
    $buttonfooterbgsecondtext_color = get_option ('buttonfooterbgsecondtext_color');
    $buttonfooterbg_color = get_option ('buttonfooterbg_color');
    $buttonfooterbgtext_color = get_option ('buttonfooterbgtext_color');
    $overlaybg_color = get_option ('overlaybg_color');
    ?>

<style type="text/css"> 
<?php if ( get_option('overlaybg_color')) { ?>
#header:before {background:<?php echo $overlaybg_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonbg_color')) { ?>
#header .first-button .main-button {border: 2px solid <?php echo $buttonbg_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonbgtext_color')) { ?>
#header .first-button .main-button {color: <?php echo $buttonbgtext_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonbg_color')) { ?>
#header .first-button .hvr-sweep-to-top:before, #header .first-button .hvr-sweep-to-bottom:before, #header .first-button .hvr-sweep-to-left:before, #header .first-button .hvr-sweep-to-right:before, #header .first-button .hvr-fade:hover, #header .first-button .hvr-bounce-to-top:before, #header .first-button .hvr-bounce-to-bottom:before, #header .first-button .hvr-bounce-to-left:before, #header .first-button .hvr-bounce-to-right:before {background:<?php echo $buttonbg_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonbgsecond_color')) { ?>
#header .second-button .main-button {border: 2px solid <?php echo $buttonbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonbgsecondtext_color')) { ?>
#header .second-button .main-button {color: <?php echo $buttonbgsecondtext_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonbgsecond_color')) { ?>
#header .second-button .hvr-sweep-to-top:before, #header .second-button .hvr-sweep-to-bottom:before, #header .second-button .hvr-sweep-to-left:before, #header .second-button .hvr-sweep-to-right:before, #header .second-button .hvr-fade:hover, #header .second-button .hvr-bounce-to-top:before, #header .second-button .hvr-bounce-to-bottom:before, #header .second-button .hvr-bounce-to-left:before, #header .second-button .hvr-bounce-to-right:before {background:<?php echo $buttonbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonfooterbg_color')) { ?>
#footer .first-button .main-button {border: 2px solid <?php echo $buttonfooterbg_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonfooterbgtext_color')) { ?>
#footer .first-button .main-button {color: <?php echo $buttonfooterbgtext_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonfooterbg_color')) { ?>
#footer .first-button .hvr-sweep-to-top:before, #footer .first-button .hvr-sweep-to-bottom:before, #footer .first-button .hvr-sweep-to-left:before, #footer .first-button .hvr-sweep-to-right:before, #footer .first-button .hvr-fade:hover, #footer .first-button .hvr-bounce-to-top:before, #footer .first-button .hvr-bounce-to-bottom:before, #footer .first-button .hvr-bounce-to-left:before, #footer .first-button .hvr-bounce-to-right:before {background:<?php echo $buttonfooterbg_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonfooterbgsecond_color')) { ?>
#footer .second-button .main-button {border: 2px solid <?php echo $buttonfooterbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonfooterbgsecondtext_color')) { ?>
#footer .second-button .main-button {color: <?php echo $buttonfooterbgsecondtext_color; ?>;}
<?php } ?>
<?php if ( get_option('buttonfooterbgsecond_color')) { ?>
#footer .second-button .hvr-sweep-to-top:before, #footer .second-button .hvr-sweep-to-bottom:before, #footer .second-button .hvr-sweep-to-left:before, #footer .second-button .hvr-sweep-to-right:before, #footer .second-button .hvr-fade:hover, #footer .second-button .hvr-bounce-to-top:before, #footer .second-button .hvr-bounce-to-bottom:before, #footer .second-button .hvr-bounce-to-left:before, #footer .second-button .hvr-bounce-to-right:before {background:<?php echo $buttonfooterbgsecond_color; ?>;}
<?php } ?>
<?php if ( get_option('mainsection_color')) { ?>
.container .even, .even .entry-content {background:<?php echo $mainsection_color; ?>;}
<?php } ?>
<?php if ( get_option('headerlogo_color')) { ?>
.logo a, #header .socials a:hover, .toggle-sidebar {color:<?php echo $headerlogo_color; ?>;}
<?php } ?>
<?php if ( get_option('headerintro_color')) { ?>
#header h2, .down-arrow a i {color:<?php echo $headerintro_color; ?>;}
<?php } ?>
<?php if ( get_option('navbg_color')) { ?>
.mobile-menu {background:<?php echo $navbg_color; ?>;}
<?php } ?>
<?php if ( get_option('navdropbg_color')) { ?>
#dynamic {background:<?php echo $navdropbg_color; ?>;}
<?php } ?>
<?php if ( get_option('accent_color')) { ?>
.owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, .flex-control-paging li a.flex-active, .flex-control-paging li a:hover, .pricing-table .featured .pricing-header, #footer input[type="button"]:hover, .footer-widget input[type="button"]:hover, #footer input[type="submit"]:hover, .footer-widget input[type="submit"]:hover, #footer input[type="reset"]:hover, .footer-widget input[type="reset"]:hover {background: <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_option('headertext_color')) { ?>
#header .lead, #header .date-title, #header .date-title a, #header .lead a {color:<?php echo $headertext_color; ?>;}
<?php } ?>
<?php if ( get_option('accent_color')) { ?>
#sidebar .widget input.search-form-input, #sidebar .widget_archive select, #sidebar .widget_categories select#cat, #sidebar select, #wp-calendar tbody td#today, .slick-dots li:hover, .slick-dots li.slick-active, .button-more, #respond .form-submit, body input.search-form-input, #sidebar .widget_tag_cloud a {border: 2px solid <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_option('accent_color')) { ?>
.flex-control-paging li a.flex-active, .flex-control-paging li a:hover, .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, #header input[type="button"], #header input[type="submit"], #header input[type="reset"], #footer input[type="button"], .footer-widget input[type="button"], #footer input[type="submit"], .footer-widget input[type="submit"], #footer input[type="reset"], .footer-widget input[type="reset"] {border:2px solid <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_option('accent_color')) { ?>
.nav-toggle, #header input[type="button"]:hover, .header-widget input[type="button"]:hover, #header input[type="submit"]:hover, .header-widget input[type="submit"]:hover, #header input[type="reset"]:hover, .header-widget input[type="reset"]:hover, .slick-dots li:hover, .slick-dots li.slick-active, .border-block, .button-more:hover, #respond .form-submit:hover, #wp-calendar tr th, #sidebar .widget_tag_cloud a:hover {background: <?php echo $accent_color; ?>;}
<?php } ?>
<?php if ( get_option('accent_color')) { ?>
#sidebar .widget a:hover, #sidebar .widget ul li a:before, #sidebar .widget_recent_comments ul li:before, .button, .button.normal, body a, .entry-title a:hover, #commentform #submit, #sidebar select, #sidebar .widget input.search-form-input, #sidebar .widget_archive select, #sidebar .widget_categories select#cat, #wp-calendar tbody td#today, .button-more, body input.search-form-input, #sidebar .widget_tag_cloud a {color:<?php echo $accent_color; ?>;} 
<?php } ?>
<?php if ( get_option('footerheader_color')) { ?>
.error404, #header {background-color:<?php echo $footerheader_color; ?> !important;} 
<?php } ?>
<?php if ( get_option('footer_color')) { ?>
#footer {background-color:<?php echo $footer_color; ?>;} 
<?php } ?>
<?php if ( get_option('preloader_color')) { ?>
#loader {background-color:<?php echo $preloader_color; ?> !important;}
<?php } ?>
<?php if ( get_option('navtext_color')) { ?>
.nav a, #header .socials a, .mobile-menu-inner .nav-mobile li a {color:<?php echo $navtext_color; ?>;}
<?php } ?>
<?php if ( get_option('navaccent_color')) { ?>
.nav a:hover, #header .socials a:hover {color:<?php echo $navaccent_color; ?>;}
<?php } ?>
<?php if ( get_option('navaccent_color')) { ?>
.nav .current-menu-item > a, .nav a:hover, .nav a.selected, .mobile-menu-inner .nav-mobile .current-menu-item > a, .mobile-menu-inner .nav-mobile a:hover, .mobile-menu-inner .nav-mobile a.selected {color:<?php echo $navaccent_color; ?>;}
<?php } ?>
<?php if ( get_option('preloaderaccent_color')) { ?>
.load8 .loader {border-left: 1.1em solid <?php echo $preloaderaccent_color; ?>;}
<?php } ?>
<?php if ( get_option('footertext_color')) { ?>
#footer .lead {color:<?php echo $footertext_color; ?>;}
<?php } ?>
<?php if ( get_option('footerintro_color')) { ?>
#footer h2, #footer .socials a {color:<?php echo $footerintro_color; ?>;}
<?php } ?>
<?php if ( get_option('footerbottom_color')) { ?>
.footer-bottom {background:<?php echo $footerbottom_color; ?>;}
<?php } ?>
<?php if ( get_option('footerbottomaccent_color')) { ?>
.footer-bottom a:hover {color:<?php echo $footerbottomaccent_color; ?>;}
<?php } ?>
<?php if ( get_option('footerbottomtext_color')) { ?>
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

/*-----------------------------------------------------------------------------------*/
/*	18. Alter length of excerpts 
/*-----------------------------------------------------------------------------------*/

function string_limit_words($string, $word_limit) {
$words = explode(' ', $string, ($word_limit + 1));
if(count($words) > $word_limit)
array_pop($words);
return implode(' ', $words);
}

/*-----------------------------------------------------------------------------------*/
/*	19. Full width slider 
/*-----------------------------------------------------------------------------------*/

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}


/*-----------------------------------------------------------------------------------*/
/*	21. Custom meta boxes
/*-----------------------------------------------------------------------------------*/

function playne_video_display() {
?>
<?php global $post; if ( get_post_meta($post->ID, 'playne_featuredvideo', true )) { ?>
	<!-- Get the video -->
	<div class="fitvid">
		<?php $playne_video = esc_url(get_post_meta( $post->ID, 'playne_featuredvideo', true )); echo wp_oembed_get( $playne_video ); ?>
	</div>
<?php }  ?>
<?php 
}

function playne_video_display_page() {
?>
<?php global $post; if ( get_post_meta($post->ID, '_playne_featuredvideo', true )) { ?>
    <!-- Get the video -->
    <div class="fitvid">
        <?php $playne_video = esc_url(get_post_meta( $post->ID, '_playne_featuredvideo', true )); echo wp_oembed_get( $playne_video ); ?>
    </div>
<?php }  ?>
<?php 
}

function playne_video_display_showcase() {
?>
<?php global $post; if ( get_post_meta($post->ID, '_playne2_showcasevideo', true )) { ?>
	<!-- Get the video -->
	<div class="fitvid">
		<?php $playne_video = esc_url(get_post_meta( $post->ID, '_playne2_showcasevideo', true )); echo wp_oembed_get( $playne_video ); ?>
	</div>
<?php }  ?>
<?php 
}

function playne_imagelist_display( $file_list_meta_key, $img_size = 'medium' ) {

    // Get the list of files
    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

    echo '<div class="flexslider-container"><div class="flexslider"><ul class="slides">';
    // Loop through them and output an image
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<li class="slide">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
        echo '</li>';
    }
    echo '</ul></div></div>';
}

add_action( 'cmb2_init', 'playne_custom_featuredimages_metaboxes' );
function playne_custom_featuredimages_metaboxes() {

    $prefix = 'playne_';

    $playne_custom_featuredimages = new_cmb2_box( array(
        'id'            => 'featuredimage_options_gallery',
        'title'         => __( 'Gallery', 'playne' ),
        'object_types'  => array( 'post', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true
    ) );

    $playne_custom_featuredimages->add_field( array(
				'name' => 'Gallery',
				'desc' => 'Add multiple images for use in the gallery. You can drag & drop the images in another order.',
				'id'   => $prefix . 'featuredimages',
				'type' => 'file_list',
				'preview_size' => array( 100, 100 )
    ) );
}

add_action( 'cmb2_init', 'playne_custom_video_metaboxes' );
function playne_custom_video_metaboxes() {

    $prefix = 'playne_';

    $playne_custom_featuredimages = new_cmb2_box( array(
        'id'            => 'featuredvideo_options_video',
        'title'         => __( 'Video', 'playne' ),
        'object_types'  => array( 'post', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true
    ) );

    $playne_custom_featuredimages->add_field( array(
				'name' => '',
				'desc' => 'Add the URL for the video you wish to show. It will automatically find the video (From youtube, vimeo etc.).',
				'id'   => $prefix . 'featuredvideo',
				'type' => 'oembed'
    ) );
}



add_action( 'cmb2_init', 'playne_metaboxes' );
function playne_metaboxes( $meta_boxes ) {

	$prefix = '_playne_'; // Prefix for all fields

    $playne_metabox = new_cmb2_box( array(
        'id'            => 'homepage_items_metabox',
        'title'         => __( 'Homepage item options', 'playne' ),
        'object_types'  => array( 'page', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true
    ) );

    $playne_metabox->add_field( array(
				'name' => 'Featured video',
				'desc' => 'Add the URL for the video you wish to show. It will automatically find the video (From youtube, vimeo etc.).',
				'id'   => $prefix . 'featuredvideo',
				'type' => 'oembed'
    ) );

    $playne_metabox->add_field( array(
                'name' => 'Gallery',
				'desc' => 'Add multiple images for use in the gallery. You can drag & drop the images in another order or delete them by pressing the red circle.',
				'id'   => $prefix . 'featuredimages',
				'type' => 'file_list',
				'preview_size' => array( 200, 200 )
    ) );

    $playne_metabox->add_field( array(
				'name' => 'Background color',
				'desc' => 'Change the background color of the homepage item',
				'id'   => $prefix . 'colorpickerz',
				'type' => 'colorpicker'
    ) );

    $playne_metabox->add_field( array(

	            'name' => 'Header text color',

	            'desc' => 'Change the header text color of the homepage item',

	            'id'   => $prefix . 'colorpickerz2',

	            'type' => 'colorpicker',

		    	'std'  => '#4d515c'
    ) );

    $playne_metabox->add_field( array(

	            'name' => 'Main text color',

	            'desc' => 'Change the main text color of the homepage item',

	            'id'   => $prefix . 'colorpickerz3',

	            'type' => 'colorpicker',

		    	'std'  => '#7b858b'
    ) );

    $playne_metabox->add_field( array(

				'name' => 'Background Image',
				'desc' => 'Upload an image or enter an URL as background of the homepage item (this will overwrite the color background)',
				'id'   => $prefix . 'imagepickerz',
				'type' => 'file',
    ) );

    $playne_metabox->add_field( array(

				'name' => 'Stick image to bottom',
				'desc' => 'Let the image be sticked to the bottom',
				'id'   => $prefix . 'sticktobottom',
				'type' => 'select',
                'options' => array(
                    'no' => __( 'No', 'playne' ),
                    'yes'   => __( 'Yes', 'playne' )
                ),
    ) );

    $playne_metabox->add_field( array(

                'name' => 'Add Parallax effect',
                'desc' => 'add a parallax effect to the background image',
                'id'   => $prefix . 'parallax',
                'type' => 'select',
                'options' => array(
                    'no' => __( 'No', 'playne' ),
                    'yes'   => __( 'Yes', 'playne' )
                ),
    ) );

    $playne_metabox->add_field( array(

				'name' => 'Center text header on full width items',
				'desc' => 'Choose to not center the header text on full width templates',
				'id'   => $prefix . 'dontcenterheader',
				'type' => 'select',
                'options' => array(
                    'yes' => __( 'Yes', 'playne' ),
                    'no'   => __( 'No', 'playne' )
                ),
    ) );

    $playne_metabox->add_field( array(
				'name' => 'Gallery',
				'desc' => 'Add multiple images for use in the gallery. You can drag & drop the images in another order.',
				'id'   => $prefix . 'featuredimages',
				'type' => 'file_list',
				'preview_size' => array( 100, 100 )
    ) );

}

add_action( 'cmb2_init', 'playne2_metaboxes' );
function playne2_metaboxes( $meta_boxes2 ) {

	$prefix = '_playne2_'; // Prefix for all fields

    $playne2_metabox = new_cmb2_box( array(
        'id'            => 'regular_page_metabox',
        'title'         => __( '(Home)page options', 'playne' ),
        'object_types'  => array( 'page', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true
    ) );

    $playne2_metabox->add_field( array(

	            'name' => 'Button text',

	            'desc' => 'Add an button text for the current page',

	            'id'   => $prefix . 'buttontextcustom',

	            'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

	            'name' => 'Button URL',

	            'desc' => 'Add an button url for the current page',

	            'id'   => $prefix . 'buttonurlcustom',

	            'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button icon',

                'desc' => 'Add an icon for your button (fa-iconname). Check the full icon list here (up to version 4.5): '. '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' .'',

                'id'   => $prefix . 'buttonicon',

                'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button background',

                'desc' => 'Choose the background color for this button',

                'id'   => $prefix . 'buttonbg',

                'type' => 'colorpicker'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button color',

                'desc' => 'Choose the text color for this button',

                'id'   => $prefix . 'buttoncolor',

                'type' => 'colorpicker'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button text 2',

                'desc' => 'Add an button text for the current page',

                'id'   => $prefix . 'buttontextcustom2',

                'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button URL 2',

                'desc' => 'Add an button url for the current page',

                'id'   => $prefix . 'buttonurlcustom2',

                'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button icon',

                'desc' => 'Add an icon for your button (fa-iconname). Check the full icon list here (up to version 4.5): '. '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' .'',

                'id'   => $prefix . 'buttonicon2',

                'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button background',

                'desc' => 'Choose the background color for this button',

                'id'   => $prefix . 'buttonbg2',

                'type' => 'colorpicker'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Button color',

                'desc' => 'Choose the text color for this button',

                'id'   => $prefix . 'buttoncolor2',

                'type' => 'colorpicker'
    ) );

    $playne2_metabox->add_field( array(

				'name' => 'Header Background Image',
				'desc' => 'Upload an image or enter an URL as background of the page (this will overwrite the standard background image)',
				'id'   => $prefix . 'imagepickerbg',
				'type' => 'file',
    ) );

    $playne2_metabox->add_field( array(

	            'name' => 'Header title',

	            'desc' => 'Add a title for the current page which will replace the default page title',

	            'id'   => $prefix . 'introtext_header',

	            'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

	            'name' => 'Intro text',

	            'desc' => 'Add an intro text for the current page',

	            'id'   => $prefix . 'introtext_header2',

	            'type' => 'text'
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Header Showcase Image',
                'desc' => 'Upload an image or enter an URL as showcase image for this homepage',
                'id'   => $prefix . 'showcaseimage',
                'type' => 'file',
    ) );

    $playne2_metabox->add_field( array(

                'name' => 'Header Showcase Video',
                'desc' => 'Enter the URL to the video you wish to show in the header area',
                'id'   => $prefix . 'showcasevideo',
                'type' => 'oembed',
    ) );

}


add_action( 'cmb2_init', 'playne3_metaboxes' );
function playne3_metaboxes( $meta_boxes3 ) {

	$prefix = '_playne3_'; // Prefix for all fields

    $playne3_metabox = new_cmb2_box( array(
        'id'            => 'post_header_metabox',
        'title'         => __( 'Regular post options', 'playne' ),
        'object_types'  => array( 'post', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true
    ) );

    $playne3_metabox->add_field( array(

				'name' => 'Header Background Image',
				'desc' => 'Upload an image or enter an URL as background of the page (this will overwrite the standard background image)',
				'id'   => $prefix . 'imagepickerbg',
				'type' => 'file',
    ) );

}

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'includes/metabox/init.php' );
	}
}

}
add_action( 'after_setup_theme', 'playne_setup' );

/*-----------------------------------------------------------------------------------*/
/*	22. RESPONSIVE VIDEOS IN POST CONTENT
/*-----------------------------------------------------------------------------------*/

add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="fitvid">' . $html . '</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	23. WORDPRESS TITLE 
/*-----------------------------------------------------------------------------------*/

function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_front_page() ) ) ? ' - ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' - ' . sprintf( __( 'Page %s', 'playne' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}
add_filter( 'wp_title', 'filter_wp_title' );

/*-----------------------------------------------------------------------------------*/
/*	24. HIDE BACKGROUND IMAGE FROM GALLERY
/*-----------------------------------------------------------------------------------*/

function playne_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return $attachment_id;
}

/*-----------------------------------------------------------------------------------*/
/*	25. ODD & EVEN POSTS
/*-----------------------------------------------------------------------------------*/

function post_even() {
	global $post_num;

	if ( ++$post_num % 2 )
		$class = 'even';
	else
		$class = 'odd';

	echo $class;
}