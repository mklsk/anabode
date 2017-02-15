<?php

/**
 * Set the content width based on the theme's design and stylesheet
 */
function landy_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'landy_content_width', 1200 );
}
add_action( 'after_setup_theme', 'landy_content_width', 0 );


if ( ! function_exists( 'landy_setup' ) ) :
/**
 * Sets up resto's defaults and registers support for various WordPress features
 */
function landy_setup() {

    /**
     * Load Getting Started page and initialize theme updater
     */
    if (file_exists(get_template_directory() . '/includes/admin/getting-started/getting-started.php' ) ) {
    require_once( get_template_directory() . '/includes/admin/getting-started/getting-started.php' );
    }

    /**
     * Add styles to post editor (editor-style.css)
     */
    add_editor_style();

    /*
     * Make theme available for translation
     */
    load_theme_textdomain( 'landy', get_template_directory() . '/includes/languages' );

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );

    /*
     * Post thumbnail support and image sizes
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Add title output
     */
    add_theme_support( 'title-tag' );

    // Large post image
    add_image_size( 'resto-full-width', 1500 );

    // Gallery thumb - small
    add_image_size( 'resto-three-column', 425 );

    // Gallery thumb - medium
    add_image_size( 'resto-two-column', 650 );

    // Gallery thumb - large
    add_image_size( 'resto-one-column', 1400 );

    // Featured post thumb
    add_image_size( 'resto-mini-grid-thumb', 600, 410, true );

    // Logo
    add_image_size( 'resto-logo' );

    /**
     * Register Navigation menu
     */
    register_nav_menus( array(
        'main'              => esc_html__( 'Front page menu', 'landy' ),
        'inner'             => esc_html__( 'Inner pages menu', 'landy' ),
        'footer'            => esc_html__( 'Footer Menu', 'landy'),
    ) );

    /**
     * Post Type Support
     */
    add_theme_support('post-formats', array( 
        'quote', 
        'image', 
        'video', 
        'link', 
        'aside', 
        'gallery')
    );

    /**
     * Custom Header support
     */
    $defaults = array(
        'default-image'      => '',
        'flex-width'         => true,
        'width'              => 1400,
        'flex-height'        => true,
        'header-text'        => true,
        'default-text-color' => '#fff'
    );
    add_theme_support( 'custom-header', $defaults );

    /**
     * Enable HTML5 markup
     */
    add_theme_support( 'html5', array(
        'comment-list',
        'search-form',
        'comment-form',
        'gallery',
    ) );

}
endif; // resto_setup
add_action( 'after_setup_theme', 'landy_setup' );




function landy_scripts() {
	
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

    /**
     * Main scripts
     */
    wp_enqueue_script('scripts_js', get_template_directory_uri() . '/includes/js/scripts.js', array( 'jquery' ), '1.0', true );

  	//Only load navigation script when not disabled
    $navdisable_script = get_theme_mod( 'theme_customizer_general4' );

    if ( $navdisable_script == '1') { 
    } else {
        wp_enqueue_script('navigation_js', get_template_directory_uri() . '/includes/js/navigation.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script('waypoints_js', get_template_directory_uri() . '/includes/js/waypoints.min.js', array( 'jquery' ), '1.1.4', true );
		wp_enqueue_script('scrollto_js', get_template_directory_uri() . '/includes/js/jquery.scrollto.js', array( 'jquery' ), '1.4.6', true );
    }

  	//Only load preloader script when not disabled
    $preload_script = get_theme_mod( 'theme_customizer_general1' );

    if ( $preload_script !== '1' && is_page_template( 'homepage.php' ) ) {
		wp_enqueue_script('preload_custom_js', get_template_directory_uri() . '/includes/js/preload.custom.js', array( 'jquery' ), '1.0', true );
    }
    
    if(is_page_template( 'homepage.php' )) {
	//slick
	wp_enqueue_script('slick_js', get_template_directory_uri() . '/includes/js/slick.min.js', array( 'jquery' ), '1.3.15', true );
	wp_enqueue_script('slickcustom_js', get_template_directory_uri() . '/includes/js/slick.min.custom.js', array( 'jquery' ), '1.0', true );
	}

    /**
     * Image Animations
     */
    $imageanimation_script = get_theme_mod( 'theme_customizer_general5' );

    if ( $imageanimation_script == '1') {
    } else if ( get_post_meta($post->ID, '_playne2_showcaseimage', true != '') && is_page_template( 'homepage.php' )) {
		wp_enqueue_script('showcase-effect_js', get_template_directory_uri() . '/includes/js/showcase-effect.js', false, false , true);
    }

    /**
     * Text Scroll
     */
    $textanimation_script = get_theme_mod( 'theme_customizer_general6' );

    if ( $textanimation_script == '1' ) {
    } else {
		wp_enqueue_script('text-effect_js', get_template_directory_uri() . '/includes/js/text-effect.js', array( 'jquery' ), '1.0', true );
    }

    /**
     * Video Header Background
     */
	if (get_theme_mod('theme_customizer_headervideourl')) {
	wp_enqueue_script('backgroundvideo_js', get_template_directory_uri() . '/includes/js/jquery.backgroundvideo.js', false, false , true);
	wp_enqueue_script('backgroundvideocustom_js', get_template_directory_uri() . '/includes/js/jquery.backgroundvideo.custom.js', false, false , true);
	}

	if(is_page_template( 'homepage.php' )) {
    /**
     * Owl Gallery
     */
	wp_enqueue_script('owlgallery_js', get_template_directory_uri() . '/includes/js/owl-gallery.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('owlgallerycustom_js', get_template_directory_uri() . '/includes/js/owl-gallery-custom.js', array( 'jquery' ), '1.0', true );
	}

	$animations_script = get_theme_mod( 'theme_customizer_general3' );
	if ($animations_script == '1') {
    } else if(is_page_template( 'homepage.php' )) {
    /**
     * Wow scroller
     */
	wp_enqueue_script('wow_js', get_template_directory_uri() . '/includes/js/wow.js', array( 'jquery' ), '0.1.4', true );
	wp_enqueue_script('wowcustom_js', get_template_directory_uri() . '/includes/js/wow-custom.js', array( 'jquery' ), '1.0', true );
	}

	if(is_page_template( 'homepage.php' )) {
    /**
     * Lightbox
     */
	wp_enqueue_script('lightbox_js', get_template_directory_uri() . '/includes/lightbox/lightbox.js', array( 'jquery' ), '0.9.9', true );
	wp_enqueue_script('lightboxcustom_js', get_template_directory_uri() . '/includes/lightbox/lightbox-custom.js', array( 'jquery' ), '1.0', true );
	}
    /**
     * Main scripts
     */
	wp_enqueue_script('landy_js', get_template_directory_uri() . '/includes/js/landy.js', array( 'jquery' ), '2.0', true );

    /**
     * Load the comment reply script
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'landy_scripts' );


// adding custom stylesheet with higher precendence
function custom_scripts() {

        wp_enqueue_style( 'custom_css', get_template_directory_uri() . "/custom_css.css", array(), '', 'screen' );
        wp_enqueue_script('custom_js', get_template_directory_uri() . '/custom_js.js', array( 'jquery' ), true );
}


add_action( 'wp_enqueue_scripts', 'custom_scripts' );

/**
 * Metabox
 */
if (file_exists(get_template_directory() . '/includes/metabox/cmb2/init.php' ) ) {
require_once (get_template_directory() . '/includes/metabox/cmb2/init.php');
} 
if (file_exists(get_template_directory() . '/includes/metabox/metabox-output.php' ) ) {
require_once (get_template_directory() . '/includes/metabox/metabox-output.php');
} 

/**
 * Customizer theme options
 */
if (file_exists(get_template_directory() . '/includes/customizer/customizer.php' ) ) {
require_once (get_template_directory() . '/includes/customizer/customizer.php');
}
if (file_exists(get_template_directory() . '/includes/customizer/customizer-output.php' ) ) {
require_once (get_template_directory() . '/includes/customizer/customizer-output.php');
}

/**
 * Activate Plugins
 */
if (file_exists(get_template_directory() . '/includes/tgmpluginactivation/class-tgm-plugin-activation.php' ) ) {
require_once (get_template_directory() . '/includes/tgmpluginactivation/class-tgm-plugin-activation.php');
}
if (file_exists(get_template_directory() . '/includes/tgmpluginactivation/class-tgm-plugin-activation-output.php' ) ) {
require_once (get_template_directory() . '/includes/tgmpluginactivation/class-tgm-plugin-activation-output.php');
}

/**
 * Custom template tags
 */
if (file_exists(get_template_directory() . '/includes/template-tags.php' ) ) {
require_once (get_template_directory() . '/includes/template-tags.php');
}

/**
 * Conditional Metabox Scripts
 */
function playne_conditional_metascript( $landy_hook ) {
 
    global $post;
 
    if ( $landy_hook == 'post-new.php' || $landy_hook == 'post.php' ) {
        if ( 'post' === $post->post_type ) {
            wp_enqueue_script(  'matter-post-format', get_stylesheet_directory_uri().'/includes/js/playne-metabox-admin.js' );
        }
        wp_enqueue_script(  'matter-page-template', get_template_directory_uri().'/includes/js/playne-metabox-admin-page.js' );
    }
}
add_action( 'admin_enqueue_scripts', 'playne_conditional_metascript', 10, 1 );

/**
 * Custom Read More Link
 */
function playne_new_excerpt_more($more) {
    global $post;
	return '<a class="more-linkd" href="'. get_permalink() . '">...</a>';
}
add_filter('excerpt_more', 'playne_new_excerpt_more');

/**
 * Custom Excerpt Length
 */
function playne_custom_excerpt_length( $length ) {
return 12;
}
add_filter( 'excerpt_length', 'playne_custom_excerpt_length', 999 );

/**
 * More Link to Excerpt
 */
function playne_custom_excerpt_more($more) {
global $post;
return '<a href="'. get_permalink($post->ID) . '">'. __(' ...', 'landy') .'</a>';
}
add_filter('excerpt_more', 'playne_custom_excerpt_more');

/**
 * Custom Pagination
 */
function playne_page_has_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/**
 * Sidebar areas
 */
function playne_widgets_init() {

register_sidebar(array(

	'name' => __( 'Sidebar first', 'landy'),

	'id' => 'sidebar-one',

	'description' => __( 'Widgets in this area are used in the first sidebar column', 'landy'),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Sidebar second', 'landy'),

	'id' => 'sidebar-two',

	'description' => __( 'Widgets in this area are used in the second sidebar column', 'landy' ),

	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Sidebar third', 'landy'),

	'id' => 'sidebar-three',

	'description' => __( 'Widgets in this area are used in the third sidebar column', 'landy' ),

	'before_widget' => '<div class="widget %2$s last clearfix">',
	'after_widget' => '</div>'

));	

register_sidebar(array(

	'name' => __( 'Header subscribe', 'landy'),

	'id' => 'header-one',

	'description' => __( 'Widgets in this area are used are used in the header subscribe area.', 'landy'),

	'before_widget' => '<div class="widget centered %2$s clearfix">',
	'after_widget' => '</div>'

));

register_sidebar(array(

	'name' => __( 'Footer subscribe', 'landy'),

	'id' => 'footer-subscribe',

	'description' => __( 'Widgets in this area are used are used in the footer subscribe area.', 'landy'),

	'before_widget' => '<div class="widget centered %2$s clearfix">',
	'after_widget' => '</div>'

));

}
add_action( 'widgets_init', 'playne_widgets_init' );

/**
 * Specific Comments Block
 */
function playne_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		
		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">	
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
					
					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>', 'landy'), get_comment_author_link()) ?>
						<div style="clear:both;"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'landy'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'landy'),'  ','') ?>
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
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'landy') ?></em>
			<?php endif; ?>    
		</div>
<?php
}

function playne_alter_comment_form_fields($fields){

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name *', 'landy' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="Your Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email">' . '<label for="email">' . __( 'Your Email *', 'landy' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email" type="text" placeholder="Your Email *" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url">' . '<label for="url">' . __( 'Your Website', 'landy' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
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


/**
 * Full Width Slider
 */
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

/**
 * Responsive Videos
 */
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="fitvid">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);