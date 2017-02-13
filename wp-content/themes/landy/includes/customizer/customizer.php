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
	     'title'          => esc_html__( 'Standard Header Image', 'landy' ),
	     'theme_supports' => 'custom-header',
	     'priority'       => 60,
	     'panel' => 'theme_customizer_headerpanel'
	) );

	//Section Style Options
	$wp_customize->add_section( 'theme_customizer_basic', array(
		'title' => esc_html__( 'Logo image', 'landy' ),
		'priority' => 80
	) );
	
	//Logo Image
	$wp_customize->add_setting( 'theme_customizer_logo', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_logo', array(
		'label' => esc_html__( 'Logo Upload', 'landy' ),
		'section' => 'title_tagline',
		'settings' => 'theme_customizer_logo'
	) ) );

	//Header panel
	$wp_customize->add_panel( 'theme_customizer_headerpanel', array(
		'title' => esc_html__( 'Header settings', 'landy' ),
		'priority' => 101
	) );

	//Video background
	$wp_customize->add_section( 'theme_customizer_headervideo', array(
		'title' => esc_html__( 'Video background', 'landy' ),
		'priority' => 103,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headervideourl', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headervideourl', array(
		'label' => esc_html__( 'URL .mp4 file', 'landy' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headervideo',
		'settings' => 'theme_customizer_headervideourl'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headervideourl2', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headervideourl2', array(
		'label' => esc_html__( 'URL .ogg file', 'landy' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headervideo',
		'settings' => 'theme_customizer_headervideourl2'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headervideourl3', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headervideourl3', array(
		'label' => esc_html__( 'URL .webm file', 'landy' ),
		'type'    => 'text',
		'section' => 'theme_customizer_headervideo',
		'settings' => 'theme_customizer_headervideourl3'
	) ) );

	//Animation options
	$wp_customize->add_section( 'theme_customizer_animations', array(
		'title' => esc_html__( 'Animation options', 'landy' ),
		'priority' => 102,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_animationlist', array(
		'sanitize_callback' => 'playne_sanitize_animationlist'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_animationlist', array(
		'label' => esc_html__( 'Main header animations', 'landy' ),
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
		'title' => esc_html__( 'General Options', 'landy' ),
		'priority' => 103
	) );

	$wp_customize->add_setting( 'theme_customizer_general1', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general1', array(
		'label' => esc_html__( 'Disable Preloader', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general1',
		'priority' => 1
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general4', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general4', array(
		'label' => esc_html__( 'Disable scrolling menu', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general4',
		'priority' => 3
	) ) );
	
	$wp_customize->add_setting( 'theme_customizer_general3', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general3', array(
		'label' => esc_html__( 'Disable homepage items animations', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general3',
		'priority' => 4
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general5', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general5', array(
		'label' => esc_html__( 'Disable showcase image animation', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general5'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general6', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general6', array(
		'label' => esc_html__( 'Disable header text scroll animation', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general6'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general7', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general7', array(
		'label' => esc_html__( 'Show footer widget on inner pages', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general7'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general8', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general8', array(
		'label' => esc_html__( 'Enable header left version', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general8'
	) ) );

	$wp_customize->add_setting( 'theme_customizer_general9', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general9', array(
		'label' => esc_html__( 'Disable navigation completely', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_general',
		'settings' => 'theme_customizer_general9'
	) ) );


	$wp_customize->add_section( 'theme_customizer_headeroverlayoptions', array(
		'title' => esc_html__( 'Header overlay', 'landy' ),
		'priority' => 103,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_general11', array(
		'sanitize_callback' => 'playne_sanitize_bgopacity'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general11', array(
		'label' => esc_html__( 'Set opacity of header cover', 'landy' ),
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
  	$colors[] = array( 'slug'=>'overlaybg_color', 'default' => '#000', 'label' => esc_html__( 'Header cover color', 'landy' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'landy' => 'theme_customizer_headeroverlayoptions', 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	$wp_customize->add_setting( 'theme_customizer_general12', array(
		'sanitize_callback' => 'playne_sanitize_checkbox'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_general12', array(
		'label' => esc_html__( 'Disable opacity of header', 'landy' ),
		'type'    => 'checkbox',
		'section' => 'theme_customizer_headeroverlayoptions',
		'settings' => 'theme_customizer_general12',
	) ) );


	//Favicon Image
	$wp_customize->add_section( 'theme_customizer_favicon', array(
		'title' => esc_html__( 'Favicon image', 'landy' ),
		'priority' => 105
	) );
	
	$wp_customize->add_setting( 'theme_customizer_favicon', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_favicon', array(
		'label' => esc_html__( 'Favicon Upload', 'landy' ),
		'section' => 'theme_customizer_favicon',
		'settings' => 'theme_customizer_favicon'
	) ) );

	// Footer panel
	$wp_customize->add_panel( 'theme_customizer_footerpanel', array(
		'title' => esc_html__( 'Footer settings', 'landy' ),
		'priority' => 102
	) );

	//Footer background image
	$wp_customize->add_section( 'theme_customizer_footerbgimage', array(
		'title' => esc_html__( 'Footer background image', 'landy' ),
		'priority' => 107,
		'panel' => 'theme_customizer_footerpanel'
	) );
	
	$wp_customize->add_setting( 'theme_customizer_footerbgimage', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_footerbgimage', array(
		'label' => esc_html__( 'Footer background image Upload', 'landy' ),
		'section' => 'theme_customizer_footerbgimage',
		'settings' => 'theme_customizer_footerbgimage'
	) ) );

	//Favicon Image
	$wp_customize->add_section( 'landy_playne_socials', array(
		'title' => esc_html__( 'Social icons', 'landy' ),
		'priority' => 104
	) );

	$wp_customize->add_setting( 'landy_playne_socials_behance', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_behance', array(
		'label' => esc_html__( 'Behance link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_behance'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_codepen', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_codepen', array(
		'label' => esc_html__( 'Codepen link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_codepen'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_dribbble', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_dribbble', array(
		'label' => esc_html__( 'Dribbble link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_dribbble'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_dropbox', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_dropbox', array(
		'label' => esc_html__( 'Dropbox link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_dropbox'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_email', array(
		'sanitize_callback' => 'esc_url_raw'	
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_email', array(
		'label' => esc_html__( 'Email link (mailto:youremail@email.com)', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_email'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_facebook', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_facebook', array(
		'label' => esc_html__( 'Facebook link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_facebook'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_flickr', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_flickr', array(
		'label' => esc_html__( 'Flickr link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_flickr'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_github', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_github', array(
		'label' => esc_html__( 'Github link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_github'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_google', array(
		'sanitize_callback' => 'esc_url_raw'	
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_google', array(
		'label' => esc_html__( 'Google plus link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_google'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_instagram', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_instagram', array(
		'label' => esc_html__( 'Instagram link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_instagram'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_linkedin', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_linkedin', array(
		'label' => esc_html__( 'Linkedin link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_linkedin'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_medium', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_medium', array(
		'label' => esc_html__( 'Medium link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_medium'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_paypal', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_paypal', array(
		'label' => esc_html__( 'Paypal link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_paypal'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_pinterest', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_pinterest', array(
		'label' => esc_html__( 'Pinterest link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_pinterest'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_reddit', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_reddit', array(
		'label' => esc_html__( 'Reddit link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_reddit'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_rss', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_rss', array(
		'label' => esc_html__( 'Rss link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_rss'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_skype', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_skype', array(
		'label' => esc_html__( 'Skype link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_skype'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_soundcloud', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_soundcloud', array(
		'label' => esc_html__( 'Soundcloud link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_soundcloud'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_spotify', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_spotify', array(
		'label' => esc_html__( 'Spotify link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_spotify'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_tumblr', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_tumblr', array(
		'label' => esc_html__( 'Tumblr link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_tumblr'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_twitter', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_twitter', array(
		'label' => esc_html__( 'Twitter link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_twitter'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_vimeo', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_vimeo', array(
		'label' => esc_html__( 'Vimeo link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_vimeo'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_vine', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_vine', array(
		'label' => esc_html__( 'Vine link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_vine'
	) ) );

	$wp_customize->add_setting( 'landy_playne_socials_youtube', array(
		'sanitize_callback' => 'esc_url_raw'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landy_playne_socials_youtube', array(
		'label' => esc_html__( 'Youtube link', 'landy' ),
		'type'    => 'text',
		'section' => 'landy_playne_socials',
		'settings' => 'landy_playne_socials_youtube'
	) ) );

	// BLOG HEADER IMAGE
	$wp_customize->add_section( 'theme_customizer_headerimageblog', array(
		'title' => esc_html__( 'Blog Header Image', 'landy' ),
		'priority' => 100,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headerimageblog', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_customizer_headerimageblog', array(
		'label' => esc_html__( 'Blog Header Image', 'landy' ),
		'section' => 'theme_customizer_headerimageblog',
		'settings' => 'theme_customizer_headerimageblog'
	) ) );

	//Intro header text
	$wp_customize->add_section( 'theme_customizer_headertextblog', array(
		'title' => esc_html__( 'Blog intro text', 'landy' ),
		'priority' => 101,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headertextlinetwoblog', array(
		'sanitize_callback' => 'sanitize_text_field'	
	) );
 
	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_headertextlinetwoblog', array(
	    'label'   => esc_html__( 'Blog subtext', 'landy' ),
	    'section' => 'theme_customizer_headertextblog',
	    'settings'   => 'theme_customizer_headertextlinetwoblog',
	    'priority' => 1
	) ) );

	$wp_customize->add_setting( 'theme_customizer_headertextlineoneblog', array(
		'sanitize_callback' => 'sanitize_text_field'		
	) );

	$wp_customize->add_control( new WP_Customize_Textarea_Control( $wp_customize, 'theme_customizer_headertextlineoneblog', array(
		'label' => esc_html__( 'Blog header', 'landy' ),
		'section' => 'theme_customizer_headertextblog',
		'settings' => 'theme_customizer_headertextlineoneblog',
		'priority' => 2
	) ) );

	//Intro header text
	$wp_customize->add_section( 'theme_customizer_headertext', array(
		'title' => esc_html__( 'Button settings', 'landy' ),
		'priority' => 102,
		'panel' => 'theme_customizer_headerpanel'
	) );

	$wp_customize->add_setting( 'theme_customizer_headerbuttoneffect', array(
		'sanitize_callback' => 'playne_sanitize_buttoneffect'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_headerbuttoneffect', array(
		'label' => esc_html__( 'First button hover effect', 'landy' ),
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
		'label' => esc_html__( 'Second button hover effect', 'landy' ),
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
		'label' => esc_html__( 'Button corners', 'landy' ),
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
		'title' => esc_html__( 'Footer outro text & buttons', 'landy' ),
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
		'label' => esc_html__( 'Outro Text Header', 'landy' ),
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
		'label' => esc_html__( 'First button icon', 'landy' ),
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
	    'label'   => esc_html__( 'First button custom icon (fa-iconname)', 'landy' ),
	    'section' => 'theme_customizer_footertext',
	    'settings'   => 'theme_customizer_footerbuttoniconcustom',
	    'priority' => 6
	) ) );

	$wp_customize->add_setting( 'theme_customizer_footerbuttoneffect', array(
		'sanitize_callback' => 'playne_sanitize_buttoneffect'		
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoneffect', array(
		'label' => esc_html__( 'First button hover effect', 'landy' ),
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
  	$colors[] = array( 'slug'=>'buttonfooterbg_color', 'default' => '#81b3ab', 'label' => esc_html__( 'First button background', 'landy' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'landy' => 'theme_customizer_footertext', 'priority' => 8, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'buttonfooterbgtext_color', 'default' => '#FFF', 'label' => esc_html__( 'First button color', 'landy' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'landy' => 'theme_customizer_footertext', 'priority' => 9, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
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
		'label' => esc_html__( 'Second button icon', 'landy' ),
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
	    'label'   => esc_html__( 'Second button custom icon (fa-iconname)', 'landy' ),
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
		'label' => esc_html__( 'Second button hover effect', 'landy' ),
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
  	$colors[] = array( 'slug'=>'buttonfooterbgsecond_color', 'default' => '#81b3ab', 'label' => esc_html__( 'Second button background', 'landy' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'landy' => 'theme_customizer_footertext', 'priority' => 15, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	// Accent color
  	$colors = array();
  	$colors[] = array( 'slug'=>'buttonfooterbgsecondtext_color', 'default' => '#FFF', 'label' => esc_html__( 'Second button color', 'landy' ) );

  	foreach($colors as $color)
  	{
   	 // SETTINGS
    	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
	// CONTROLS
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'landy' => 'theme_customizer_footertext', 'priority' => 16, 'settings' => $color['slug'], 'capability' => 'edit_theme_options' )));
  	}

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'theme_customizer_footerbuttoncorners', array(
		'label' => esc_html__( 'Button corners', 'landy' ),
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
		'title' => esc_html__( 'Colors', 'landy' ),
	    'priority' => 95,
	    'capability' => 'edit_theme_options'
	) );

	/*-----------------------------------------------------------------------------------*/
	/*	General colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_general', array(
		'title' => esc_html__( 'General', 'landy' ),
		'priority' => 1,
		'panel' => 'playne_panel_colors'
	) );

	/**
	 * Accent Color
	 */
	$wp_customize->add_setting( 'accent_color', array(
		'default'           => '#35aca8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label'    => esc_html__( 'Accent', 'landy' ),
		'section'  => 'section_general',
		'settings' => 'accent_color',
		'priority' => 1
	) ) );

	/**
	 * Body Titles
	 */
	$wp_customize->add_setting( 'bodytitles_color', array(
		'default'           => '#4d515c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bodytitles_color', array(
		'label'    => esc_html__( 'Body Titles', 'landy' ),
		'section'  => 'section_general',
		'settings' => 'bodytitles_color',
		'priority' => 2
	) ) );

	/**
	 * Body Titles
	 */
	$wp_customize->add_setting( 'bodytext_color', array(
		'default'           => '#7b858b',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bodytext_color', array(
		'label'    => esc_html__( 'Body Text', 'landy' ),
		'section'  => 'section_general',
		'settings' => 'bodytext_color',
		'priority' => 3
	) ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Header colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_header', array(
		'title' => esc_html__( 'Header & Menu', 'landy' ),
		'priority' => 2,
		'panel' => 'playne_panel_colors'
	) );

	/**
	 * Header Logo Accent Color
	 */
	$wp_customize->add_setting( 'headerlogo_color', array(
		'default'           => '#FFF',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headerlogo_color', array(
		'label'    => esc_html__( 'Header Accent', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'headerlogo_color',
		'priority' => 1
	) ) );

	/**
	 * Header Intro
	 */
	$wp_customize->add_setting( 'headerintro_color', array(
		'default'           => '#FFF',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headerintro_color', array(
		'label'    => esc_html__( 'Header intro text', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'headerintro_color',
		'priority' => 2
	) ) );

	/**
	 * Header Text
	 */
	$wp_customize->add_setting( 'headertext_color', array(
		'default'           => '#9c9999',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headertext_color', array(
		'label'    => esc_html__( 'Header text', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'headertext_color',
		'priority' => 3
	) ) );

	/**
	 * Header Background
	 */
	$wp_customize->add_setting( 'footerheader_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerheader_color', array(
		'label'    => esc_html__( 'Header Background', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'footerheader_color',
		'priority' => 4
	) ) );

	/**
	 * Navigation Background
	 */
	$wp_customize->add_setting( 'navbg_color', array(
		'default'           => '#13191f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbg_color', array(
		'label'    => esc_html__( 'Mobile Navigation Background', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'navbg_color',
		'priority' => 5
	) ) );

	/**
	 * Top Navigation Background
	 */
	$wp_customize->add_setting( 'navdropbg_color', array(
		'default'           => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navdropbg_color', array(
		'label'    => esc_html__( 'Drop Down Navigation Background', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'navdropbg_color',
		'priority' => 6
	) ) );

	/**
	 * Top Navigation Background
	 */
	$wp_customize->add_setting( 'navtext_color', array(
		'default'           => '#8e8e8e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navtext_color', array(
		'label'    => esc_html__( 'Main Nav Link', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'navtext_color',
		'priority' => 7
	) ) );

	/**
	 * Navigation Accent
	 */
	$wp_customize->add_setting( 'navaccent_color', array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navaccent_color', array(
		'label'    => esc_html__( 'Main Nav Accent', 'landy' ),
		'section'  => 'section_header',
		'settings' => 'navaccent_color',
		'priority' => 8
	) ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Footer colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_footer', array(
		'title' => esc_html__( 'Footer', 'landy' ),
		'priority' => 3,
		'panel' => 'playne_panel_colors'
	) );

	/**
	 * Footer Background
	 */
	$wp_customize->add_setting( 'footer_color', array(
		'default'           => '#34495e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
		'label'    => esc_html__( 'Footer Background', 'landy' ),
		'section'  => 'section_footer',
		'settings' => 'footer_color',
		'priority' => 1
	) ) );

	/**
	 * Footer Bottom Background
	 */
	$wp_customize->add_setting( 'footerbottom_color', array(
		'default'           => '#191d20',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerbottom_color', array(
		'label'    => esc_html__( 'Footer Bottom Background', 'landy' ),
		'section'  => 'section_footer',
		'settings' => 'footerbottom_color',
		'priority' => 2
	) ) );

	/**
	 * Footer Bottom Accent
	 */
	$wp_customize->add_setting( 'footerbottomaccent_color', array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerbottomaccent_color', array(
		'label'    => esc_html__( 'Footer Bottom Accent', 'landy' ),
		'section'  => 'section_footer',
		'settings' => 'footerbottomaccent_color',
		'priority' => 2
	) ) );

	/**
	 * Footer Bottom Text
	 */
	$wp_customize->add_setting( 'footerbottomtext_color', array(
		'default'           => '#9c9999',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerbottomtext_color', array(
		'label'    => esc_html__( 'Footer Bottom Text', 'landy' ),
		'section'  => 'section_footer',
		'settings' => 'footerbottomtext_color',
		'priority' => 3
	) ) );

	/**
	 * Footer Intro
	 */
	$wp_customize->add_setting( 'footerintro_color', array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerintro_color', array(
		'label'    => esc_html__( 'Footer Intro Text', 'landy' ),
		'section'  => 'section_footer',
		'settings' => 'footerintro_color',
		'priority' => 4
	) ) );

	/**
	 * Footer Text
	 */
	$wp_customize->add_setting( 'footertext_color', array(
		'default'           => '#9c9999',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footertext_color', array(
		'label'    => esc_html__( 'Footer Sub Text', 'landy' ),
		'section'  => 'section_footer',
		'settings' => 'footertext_color',
		'priority' => 5
	) ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Preloader colors
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'section_preloader', array(
		'title' => esc_html__( 'Preloader', 'landy' ),
		'priority' => 4,
		'panel' => 'playne_panel_colors'
	) );

	/**
	 * Preloader Background
	 */
	$wp_customize->add_setting( 'preloader_color', array(
		'default'           => '#13191f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preloader_color', array(
		'label'    => esc_html__( 'Preloader Background', 'landy' ),
		'section'  => 'section_preloader',
		'settings' => 'preloader_color',
		'priority' => 1
	) ) );

	/**
	 * Preloader Accent
	 */
	$wp_customize->add_setting( 'preloaderaccent_color', array(
		'default'           => '#17bcb8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preloaderaccent_color', array(
		'label'    => esc_html__( 'Preloader Accent', 'landy' ),
		'section'  => 'section_preloader',
		'settings' => 'preloaderaccent_color',
		'priority' => 2
	) ) );

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