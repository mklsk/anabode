<?php
 
add_filter( 'customize_register', 'theme_customizer_register' );

// Sanitize background opacity option
function playne_sanitize_bgopacity( $input ) {
    $valid = array(
            '60' => 'Default (60%)',
            '10' => '10%',
            '15' => '15%',
            '20' => '20%',
            '25' => '25%',
            '30' => '30%',
            '35' => '35%',
            '40' => '40%',
            '45' => '45%',
            '50' => '50%',
            '55' => '55%',
            '65' => '65%',
            '70' => '70%',
            '75' => '75%',
            '80' => '80%',
            '85' => '85%',
            '90' => '90%',
            '95' => '95%'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize button icon list
function playne_sanitize_buttoneffect( $input ) {
    $valid = array(
        	'value0' => 'Standard',
        	'value1' => 'To bottom',
        	'value2' => 'To right',
        	'value3' => 'To left',
        	'value4' => 'Fade',
        	'value5' => 'Bounce to bottom',
        	'value6' => 'Bounce to top',
        	'value7' => 'Bounce to left',
        	'value8' => 'Bounce to right',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize button icon list
function playne_sanitize_buttoniconlist( $input ) {
    $valid = array(
        	'value0' => 'None',
        	'value1' => 'Apple logo',
        	'value2' => 'Android logo',
        	'value3' => 'Heart',
        	'value4' => 'Bolt',
        	'value5' => 'Check',
        	'value6' => 'Cloud',
        	'value7' => 'Credit card',
        	'value8' => 'Comment',
        	'value9' => 'Camera',
        	'value10' => 'Gamepad',
        	'value11' => 'Inbox',
        	'value12' => 'Music note',
        	'value13' => 'Mobile phone',
        	'value14' => 'Thumbs up',
        	'value15' => 'User group',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize button corners
function playne_sanitize_buttoncorners( $input ) {
    $valid = array(
			'value0' => 'Default',
        	'value2' => 'Semi rounded',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize animation list
function playne_sanitize_animationlist( $input ) {
    $valid = array(
        	'value1' => 'Fade in',
        	'value2' => 'Pulse',
        	'value3' => 'Tada',
        	'value4' => 'Bounce',
        	'value5' => 'Horizontal flip',
        	'value6' => 'Vertical flip',
        	'value7' => 'Fade in left',
        	'value8' => 'Fade in right',
        	'value9' => 'Fade in up',
        	'value10' => 'Fade in down',
        	'value11' => 'Bounce in left',
        	'value12' => 'Bounce in right',
        	'value13' => 'Bounce in up',
        	'value14' => 'Bounce in down',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize checkboxes
function playne_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// Sanitize text fields
function playne_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Add two custom controls to the panel
function theme_customizer_register($wp_customize) {

	class Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    								}
	}	

		class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

	//Remove certain useless functions for this theme
	$wp_customize->remove_control( 'display_header_text');
	$wp_customize->remove_control( 'header_textcolor');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_control('background_color');

	$wp_customize->add_section( 'header_image', array(
	     'title'          => __( 'Standard Header Image', 'section' ),
	     'theme_supports' => 'custom-header',
	     'priority'       => 60,
	     'panel' => 'theme_customizer_headerpanel'
	) );

	//Section Style Options
	$wp_customize->add_section( 'theme_customizer_basic', array(
		'title' => __( 'Logo image', 'section' ),
		'priority' => 80
	) );
	
	//Logo Image
	$wp_customize->add_setting( 'theme_customizer_logo', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_logo', array(
		'label' => __( 'Logo Upload', 'section' ),
		'section' => 'theme_customizer_basic',
		'settings' => 'theme_customizer_logo'
	) ) );

	//Header panel
	$wp_customize->add_panel( 'theme_customizer_headerpanel', array(
		'title' => __( 'Header settings', 'section' ),
		'priority' => 101
	) );

	//Video background
	$wp_customize->add_section( 'theme_customizer_headervideo', array(
		'title' => __( 'Video background', 'section' ),
		'priority' => 103,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headervideourl', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headervideourl', array(
		'label' => __( 'URL .mp4 file', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headervideo',
		'settings' => 'theme_customizer_headervideourl'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headervideourl2', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headervideourl2', array(
		'label' => __( 'URL .ogg file', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headervideo',
		'settings' => 'theme_customizer_headervideourl2'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headervideourl3', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headervideourl3', array(
		'label' => __( 'URL .webm file', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headervideo',
		'settings' => 'theme_customizer_headervideourl3'
	) ) );

	//Animation options
	$wp_customize->add_section( 'theme_customizer_animations', array(
		'title' => __( 'Animation options', 'section' ),
		'priority' => 102,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_animationlist', array(
		'sanitize_callback' => 'playne_sanitize_animationlist'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animationlist', array(
		'label' => __( 'Main header animations', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_animations',
		'settings' => 'theme_customizer_animationlist',
		'priority' => 1,
		'default' => 'value1',
		'choices'    => array(
        	'value1' => 'Fade in',
        	'value2' => 'Pulse',
        	'value3' => 'Tada',
        	'value4' => 'Bounce',
        	'value5' => 'Horizontal flip',
        	'value6' => 'Vertical flip',
        	'value7' => 'Fade in left',
        	'value8' => 'Fade in right',
        	'value9' => 'Fade in up',
        	'value10' => 'Fade in down',
        	'value11' => 'Bounce in left',
        	'value12' => 'Bounce in right',
        	'value13' => 'Bounce in up',
        	'value14' => 'Bounce in down',
        	),
	) ) );

	//General options
	$wp_customize->add_section( 'theme_customizer_general', array(
		'title' => __( 'General Options', 'section' ),
		'priority' => 103
	) );

	$wp_customize->add_setting( 'theme_customizer_general1', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general1', array(
		'label' => __( 'Disable Preloader', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general1',
		'priority' => 1
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general4', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general4', array(
		'label' => __( 'Disable scrolling menu', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general4',
		'priority' => 3
	) ) );
	
	$wp_customize->add_setting( 'theme_customizer_general3', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general3', array(
		'label' => __( 'Disable homepage items animations', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general3',
		'priority' => 4
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general5', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general5', array(
		'label' => __( 'Disable showcase image animation', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general5'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general6', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general6', array(
		'label' => __( 'Disable header text scroll animation', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general6'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general7', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general7', array(
		'label' => __( 'Show footer widget on inner pages', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general7'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general8', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general8', array(
		'label' => __( 'Enable header left version', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general8'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general9', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general9', array(
		'label' => __( 'Disable navigation completely', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general9'
	) ) );


	$wp_customize->add_section( 'theme_customizer_headeroverlayoptions', array(
		'title' => __( 'Header overlay', 'section' ),
		'priority' => 103,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_general11', array(
		'sanitize_callback' => 'playne_sanitize_bgopacity'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general11', array(
		'label' => __( 'Set opacity of header cover', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_headeroverlayoptions',
		'settings' => 'theme_customizer_general11',
		'choices' => array(
            '60' => 'Default (60%)',
            '10' => '10%',
            '15' => '15%',
            '20' => '20%',
            '25' => '25%',
            '30' => '30%',
            '35' => '35%',
            '40' => '40%',
            '45' => '45%',
            '50' => '50%',
            '55' => '55%',
            '65' => '65%',
            '70' => '70%',
            '75' => '75%',
            '80' => '80%',
            '85' => '85%',
            '90' => '90%',
            '95' => '95%'
        ),
	) ) );

	// Header overlay color
	$colors = array();
  	$colors[] = array( 'slug'=>'overlaybg_color', 'default' => '#000', 'label' => __( 'Header cover color', 'playne' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'theme_customizer_headeroverlayoptions', 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	$wp_customize->add_setting( 'theme_customizer_general12', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general12', array(
		'label' => __( 'Disable opacity of header', 'section' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_headeroverlayoptions',
		'settings' => 'theme_customizer_general12',
	) ) );


	//Favicon Image
	$wp_customize->add_section( 'theme_customizer_favicon', array(
		'title' => __( 'Favicon image', 'section' ),
		'priority' => 105
	) );
	
	$wp_customize->add_setting( 'theme_customizer_favicon', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_favicon', array(
		'label' => __( 'Favicon Upload', 'section' ),
		'section' => 'theme_customizer_favicon',
		'settings' => 'theme_customizer_favicon'
	) ) );

	// Footer panel
	$wp_customize->add_panel( 'theme_customizer_footerpanel', array(
		'title' => __( 'Footer settings', 'section' ),
		'priority' => 102
	) );

	//Footer background image
	$wp_customize->add_section( 'theme_customizer_footerbgimage', array(
		'title' => __( 'Footer background image', 'section' ),
		'priority' => 107,
		'panel' => 'theme_customizer_footerpanel'
	) );
	
	$wp_customize->add_setting( 'theme_customizer_footerbgimage', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_footerbgimage', array(
		'label' => __( 'Footer background image Upload', 'section' ),
		'section' => 'theme_customizer_footerbgimage',
		'settings' => 'theme_customizer_footerbgimage'
	) ) );

	//Favicon Image
	$wp_customize->add_section( 'landy_playne_socials', array(
		'title' => __( 'Social icons', 'section' ),
		'priority' => 104
	) );

	$wp_customize->add_setting( 'landy_playne_socials_behance', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_behance', array(
		'label' => __( 'Behance link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_behance'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_codepen', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_codepen', array(
		'label' => __( 'Codepen link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_codepen'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_dribbble', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_dribbble', array(
		'label' => __( 'Dribbble link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_dribbble'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_dropbox', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_dropbox', array(
		'label' => __( 'Dropbox link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_dropbox'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_email', array(
		'sanitize_callback' => 'esc_url_raw'	
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_email', array(
		'label' => __( 'Email link (mailto:youremail@email.com)', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_email'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_facebook', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_facebook', array(
		'label' => __( 'Facebook link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_facebook'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_flickr', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_flickr', array(
		'label' => __( 'Flickr link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_flickr'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_github', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_github', array(
		'label' => __( 'Github link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_github'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_google', array(
		'sanitize_callback' => 'esc_url_raw'	
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_google', array(
		'label' => __( 'Google plus link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_google'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_instagram', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_instagram', array(
		'label' => __( 'Instagram link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_instagram'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_linkedin', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_linkedin', array(
		'label' => __( 'Linkedin link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_linkedin'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_medium', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_medium', array(
		'label' => __( 'Medium link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_medium'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_paypal', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_paypal', array(
		'label' => __( 'Paypal link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_paypal'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_pinterest', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_pinterest', array(
		'label' => __( 'Pinterest link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_pinterest'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_reddit', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_reddit', array(
		'label' => __( 'Reddit link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_reddit'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_rss', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_rss', array(
		'label' => __( 'Rss link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_rss'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_skype', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_skype', array(
		'label' => __( 'Skype link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_skype'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_soundcloud', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_soundcloud', array(
		'label' => __( 'Soundcloud link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_soundcloud'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_spotify', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_spotify', array(
		'label' => __( 'Spotify link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_spotify'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_tumblr', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_tumblr', array(
		'label' => __( 'Tumblr link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_tumblr'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_twitter', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_twitter', array(
		'label' => __( 'Twitter link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_twitter'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_vimeo', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_vimeo', array(
		'label' => __( 'Vimeo link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_vimeo'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_vine', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_vine', array(
		'label' => __( 'Vine link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_vine'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_youtube', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_youtube', array(
		'label' => __( 'Youtube link', 'section' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_youtube'
	) ) );

	// BLOG HEADER IMAGE
	$wp_customize->add_section( 'theme_customizer_headerimageblog', array(
		'title' => __( 'Blog Header Image', 'playne' ),
		'priority' => 100,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headerimageblog', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_headerimageblog', array(
		'label' => __( 'Blog Header Image', 'playne' ),
		'section' => 'theme_customizer_headerimageblog',
		'settings' => 'theme_customizer_headerimageblog'
	) ) );

	//Intro header text
	$wp_customize->add_section( 'theme_customizer_headertextblog', array(
		'title' => __( 'Blog intro text', 'section' ),
		'priority' => 101,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headertextlinetwoblog', array(
		'sanitize_callback' => 'sanitize_text_field'	
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_headertextlinetwoblog', array(
	    'label'   => __( 'Blog subtext', 'section' ),
	    'section' => 'theme_customizer_headertextblog',
	    'settings'   => 'theme_customizer_headertextlinetwoblog',
	    'priority' => 1
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headertextlineoneblog', array(
		'sanitize_callback' => 'sanitize_text_field'		
	) );

	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_headertextlineoneblog', array(
		'label' => __( 'Blog header', 'section' ),
		'section' => 'theme_customizer_headertextblog',
		'settings' => 'theme_customizer_headertextlineoneblog',
		'priority' => 2
	) ) );

	//Intro header text
	$wp_customize->add_section( 'theme_customizer_headertext', array(
		'title' => __( 'Button settings', 'section' ),
		'priority' => 102,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headerbuttoneffect', array(
		'sanitize_callback' => 'playne_sanitize_buttoneffect'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbuttoneffect', array(
		'label' => __( 'First button hover effect', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_headertext',
		'settings' => 'theme_customizer_headerbuttoneffect',
		'priority' => 7,
		'default' => 'value1',
		'choices'    => array(
        	'value0' => 'Standard',
        	'value1' => 'To bottom',
        	'value2' => 'To right',
        	'value3' => 'To left',
        	'value4' => 'Fade',
        	'value5' => 'Bounce to bottom',
        	'value6' => 'Bounce to top',
        	'value7' => 'Bounce to left',
        	'value8' => 'Bounce to right',
        	),
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headerbuttoneffect2', array(
		'sanitize_callback' => 'playne_sanitize_buttoneffect'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbuttoneffect2', array(
		'label' => __( 'Second button hover effect', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_headertext',
		'settings' => 'theme_customizer_headerbuttoneffect2',
		'priority' => 14,
		'default' => 'value1',
		'choices'    => array(
        	'value0' => 'Standard',
        	'value1' => 'To bottom',
        	'value2' => 'To right',
        	'value3' => 'To left',
        	'value4' => 'Fade',
        	'value5' => 'Bounce to bottom',
        	'value6' => 'Bounce to top',
        	'value7' => 'Bounce to left',
        	'value8' => 'Bounce to right',
        	),
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headerbuttoncorners', array(
		'sanitize_callback' => 'playne_sanitize_buttoncorners'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbuttoncorners', array(
		'label' => __( 'Button corners', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_headertext',
		'settings' => 'theme_customizer_headerbuttoncorners',
		'priority' => 15,
		'default' => 'value0',
		'choices'    => array(
			'value0' => 'Default',
        	'value2' => 'Semi rounded',
        	),
	) ) );

	//Footer header text
	$wp_customize->add_section( 'theme_customizer_footertext', array(
		'title' => __( 'Footer outro text & buttons', 'section' ),
		'priority' => 107,
		'panel' => 'theme_customizer_footerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_footertextlinetwo', array(	
		'sanitize_callback' => 'sanitize_text_field'
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_footertextlinetwo', array(
	    'label'   => 'Outro text',
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footertextlinetwo',
	    'priority' => 1
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextlineone', array(
		'sanitize_callback' => 'sanitize_text_field'		
	) );

	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_footertextlineone', array(
		'label' => __( 'Outro Text Header', 'section' ),
		'type'    => 'text',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footertextlineone',
		'priority' => 2
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton1', array(	
		'sanitize_callback' => 'sanitize_text_field'
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton1', array(
	    'label'   => 'First button',
	    'type' => 'text',
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footertextbutton1',
	    'priority' => 3
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton1url', array(	
		'sanitize_callback' => 'esc_url_raw'
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton1url', array(
	    'label'   => 'First button link',
	    'type' => 'text',
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footertextbutton1url',
	    'priority' => 4
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoniconlist', array(
		'sanitize_callback' => 'playne_sanitize_buttoniconlist'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoniconlist', array(
		'label' => __( 'First button icon', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footerbuttoniconlist',
		'priority' => 5,
		'default' => 'value1',
		'choices'    => array(
			'value0' => 'None',
        	'value1' => 'Apple logo',
        	'value2' => 'Android logo',
        	'value3' => 'Heart',
        	'value4' => 'Bolt',
        	'value5' => 'Check',
        	'value6' => 'Cloud',
        	'value7' => 'Credit card',
        	'value8' => 'Comment',
        	'value9' => 'Camera',
        	'value10' => 'Gamepad',
        	'value11' => 'Inbox',
        	'value12' => 'Music note',
        	'value13' => 'Mobile phone',
        	'value14' => 'Thumbs up',
        	'value15' => 'User group',
        	),
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoniconcustom', array(	
		'sanitize_callback' => 'sanitize_text_field'
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoniconcustom', array(
	    'label'   => __( 'First button custom icon (fa-iconname)', 'section' ),
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footerbuttoniconcustom',
	    'priority' => 6
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoneffect', array(
		'sanitize_callback' => 'playne_sanitize_buttoneffect'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoneffect', array(
		'label' => __( 'First button hover effect', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footerbuttoneffect',
		'priority' => 7,
		'default' => 'value1',
		'choices'    => array(
        	'value0' => 'Standard',
        	'value1' => 'To bottom',
        	'value2' => 'To right',
        	'value3' => 'To left',
        	'value4' => 'Fade',
        	'value5' => 'Bounce to bottom',
        	'value6' => 'Bounce to top',
        	'value7' => 'Bounce to left',
        	'value8' => 'Bounce to right',
        	),
	) ) );

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'buttonfooterbg_color', 'default' => '#81b3ab', 'label' => __( 'First button background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'theme_customizer_footertext', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'buttonfooterbgtext_color', 'default' => '#FFF', 'label' => __( 'First button color', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'theme_customizer_footertext', 'priority' => 9, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	$wp_customize->add_setting( 'theme_customizer_footertextbutton2', array(	
		'sanitize_callback' => 'sanitize_text_field'
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton2', array(
	    'label'   => 'Second button',
	    'type' => 'text',
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footertextbutton2',
	    'priority' => 10
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footertextbutton2url', array(	
		'sanitize_callback' => 'esc_url_raw'
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footertextbutton2url', array(
	    'label'   => 'Second button link',
	    'type' => 'text',
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footertextbutton2url',
	    'priority' => 11
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoniconlist2', array(
		'sanitize_callback' => 'playne_sanitize_buttoniconlist'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoniconlist2', array(
		'label' => __( 'Second button icon', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footerbuttoniconlist2',
		'priority' => 12,
		'default' => 'value1',
		'choices'    => array(
			'value0' => 'None',
        	'value1' => 'Apple logo',
        	'value2' => 'Android logo',
        	'value3' => 'Heart',
        	'value4' => 'Bolt',
        	'value5' => 'Check',
        	'value6' => 'Cloud',
        	'value7' => 'Credit card',
        	'value8' => 'Comment',
        	'value9' => 'Camera',
        	'value10' => 'Gamepad',
        	'value11' => 'Inbox',
        	'value12' => 'Music note',
        	'value13' => 'Mobile phone',
        	'value14' => 'Thumbs up',
        	'value15' => 'User group',
        	),
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoniconcustom2', array(	
		'sanitize_callback' => 'sanitize_text_field'
	) );
 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoniconcustom2', array(
	    'label'   => __( 'Second button custom icon (fa-iconname)', 'section' ),
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footerbuttoniconcustom2',
	    'priority' => 13
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoncorners', array(
		'sanitize_callback' => 'playne_sanitize_buttoncorners'		
	) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoneffect2', array(
		'sanitize_callback' => 'playne_sanitize_buttoneffect'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoneffect2', array(
		'label' => __( 'Second button hover effect', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footerbuttoneffect2',
		'priority' => 14,
		'default' => 'value1',
		'choices'    => array(
        	'value0' => 'Standard',
        	'value1' => 'To bottom',
        	'value2' => 'To right',
        	'value3' => 'To left',
        	'value4' => 'Fade',
        	'value5' => 'Bounce to bottom',
        	'value6' => 'Bounce to top',
        	'value7' => 'Bounce to left',
        	'value8' => 'Bounce to right',
        	),
	) ) );

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'buttonfooterbgsecond_color', 'default' => '#81b3ab', 'label' => __( 'Second button background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'theme_customizer_footertext', 'priority' => 15, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'buttonfooterbgsecondtext_color', 'default' => '#FFF', 'label' => __( 'Second button color', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'theme_customizer_footertext', 'priority' => 16, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoncorners', array(
		'label' => __( 'Button corners', 'section' ),
		'type'    => 'select',
		'section' => 'theme_customizer_footertext',
		'settings' => 'theme_customizer_footerbuttoncorners',
		'priority' => 17,
		'default' => 'value0',
		'choices'    => array(
			'value0' => 'Default',
        	'value2' => 'Semi rounded',
        	),
	) ) );

	$wp_customize->add_panel( 'playne_panel_colors', array(
		'title' => __( 'Colors', 'playne' ),
	    'priority' => 95,
	    'capability' => 'edit_theme_options'
	) );

	/*-----------------------------------------------------------------------------------*/
	/*	General colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_general', array(
		'title' => __( 'General', 'playne' ),
		'priority' => 1,
		'panel' => 'playne_panel_colors'
	) );

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'accent_color', 'default' => '#35aca8', 'label' => __( 'Accent', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_general', 'priority' => 1, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	/*-----------------------------------------------------------------------------------*/
	/*	Header colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_header', array(
		'title' => __( 'Header & Menu', 'playne' ),
		'priority' => 2,
		'panel' => 'playne_panel_colors'
	) );

 	// Header logo
  	$colors = array();
  	$colors[] = array( 'slug'=>'headerlogo_color', 'default' => '#FFF', 'label' => __( 'Header accent', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 2, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Header intro
  	$colors = array();
  	$colors[] = array( 'slug'=>'headerintro_color', 'default' => '#FFFFFF', 'label' => __( 'Header intro text', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 3, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Header text
  	$colors = array();
  	$colors[] = array( 'slug'=>'headertext_color', 'default' => '#9c9999', 'label' => __( 'Header sub text', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 4, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Header background
  	$colors = array();
  	$colors[] = array( 'slug'=>'footerheader_color', 'default' => '#000000', 'label' => __( 'Header Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 7, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Navigation background
  	$colors = array();
  	$colors[] = array( 'slug'=>'navbg_color', 'default' => '#13191f', 'label' => __( 'Mobile Navigation Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 9, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Top Navigation background
  	$colors = array();
  	$colors[] = array( 'slug'=>'navdropbg_color', 'default' => '#111', 'label' => __( 'Drop Down Navigation Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 9, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Navigation text 
  	$colors = array();
  	$colors[] = array( 'slug'=>'navtext_color', 'default' => '#8e8e8e', 'label' => __( 'Main Nav Link', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 10, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Navigation accent 
  	$colors = array();
  	$colors[] = array( 'slug'=>'navaccent_color', 'default' => '#FFFFFF', 'label' => __( 'Main Nav Accent', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_header', 'priority' => 11, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	/*-----------------------------------------------------------------------------------*/
	/*	Footer colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_footer', array(
		'title' => __( 'Footer', 'playne' ),
		'priority' => 3,
		'panel' => 'playne_panel_colors'
	) );

  	// Footer background
  	$colors = array();
  	$colors[] = array( 'slug'=>'footer_color', 'default' => '#34495e', 'label' => __( 'Footer Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_footer', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Footer bottom background
  	$colors = array();
  	$colors[] = array( 'slug'=>'footerbottom_color', 'default' => '#191d20', 'label' => __( 'Footer Bottom Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_footer', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Footer bottom accent
  	$colors = array();
  	$colors[] = array( 'slug'=>'footerbottomaccent_color', 'default' => '#FFF', 'label' => __( 'Footer Bottom Accent', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_footer', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Footer bottom text
  	$colors = array();
  	$colors[] = array( 'slug'=>'footerbottomtext_color', 'default' => '#9c9999', 'label' => __( 'Footer Bottom Text', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_footer', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Footer intro
  	$colors = array();
  	$colors[] = array( 'slug'=>'footerintro_color', 'default' => '#FFFFFF', 'label' => __( 'Footer intro text', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_footer', 'priority' => 14, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

 	// Footer text
  	$colors = array();
  	$colors[] = array( 'slug'=>'footertext_color', 'default' => '#9c9999', 'label' => __( 'Footer sub text', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_footer', 'priority' => 15, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	/*-----------------------------------------------------------------------------------*/
	/*	Preloader colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_preloader', array(
		'title' => __( 'Preloader', 'playne' ),
		'priority' => 3,
		'panel' => 'playne_panel_colors'
	) );

  	// Preloader background
  	$colors = array();
  	$colors[] = array( 'slug'=>'preloader_color', 'default' => '#13191f', 'label' => __( 'Preloader Background', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_preloader', 'priority' => 12, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

  	// Preloader accent
  	$colors = array();
  	$colors[] = array( 'slug'=>'preloaderaccent_color', 'default' => '#17bcb8', 'label' => __( 'Preloader Accent', 'section' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'section_preloader', 'priority' => 13, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	//Real Time Settings Preview
	
	$wp_customize->get_setting('blogname')->transport='postMessage';
	
	if ( $wp_customize->is_preview() && ! is_admin() )
	add_filter( 'wp_footer', 'customizer_preview', 21);
	
	function customizer_preview() {
		?>
		<script type="text/javascript">
		( function( $ ){
		
		wp.customize('blogname',function( value ) {
			value.bind(function(to) {
				$('#logo h1 a, #logo h2 a').html(to);
			});
		});
		
		} )( jQuery )
		</script>
		<?php 
	}
	
}