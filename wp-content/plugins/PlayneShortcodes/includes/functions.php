<?php

/*-----------------------------------------------------------------------------------*/
/*	1. ALLOW SHORTCODES IN WIDGETS
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	2. CLEAR FLOATS
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('clear_floats_shortcode') ) {

	function clear_floats_shortcode() {

	   return '<div class="clear-floats"></div>';

	}

	add_shortcode( 'clear_floats', 'clear_floats_shortcode' );
}


/*-----------------------------------------------------------------------------------*/
/*	3. SHORTCODES WRAPPER FIX
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_fix_shortcodes') ) {

	function playne_fix_shortcodes($content){   

		$array = array (

			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'

		);

		$content = strtr($content, $array);

		return $content;

	}

	add_filter('the_content', 'playne_fix_shortcodes');
}

/*-----------------------------------------------------------------------------------*/
/*	4. HR SPACING BETWEEN ELEMENTS
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_spacing_shortcode') ) {

	function playne_spacing_shortcode( $atts ) {

		extract( shortcode_atts( array(

			'size' => '20px',

		  ), $atts ) );

	 return '<hr class="spacing" style="height: '. $size .'"></hr>';

	}

	add_shortcode( 'playne_spacing', 'playne_spacing_shortcode' );
}

/*-----------------------------------------------------------------------------------*/
/*	5. TOGGLES
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_toggle_shortcode') ) {

	function playne_toggle_shortcode( $atts, $content = null ) {

		wp_enqueue_script('playne_toggle');

		extract( shortcode_atts( array(

			'title' => 'Toggle Title',
			'headercolor' => '',
			'headerbackground' => '',
			'bodycolor' => '',
			'bodybackground' => '',

		), $atts ) );

				if ( $headercolor !== '' && $headercolor !== '#' ) {
					$header_color = ' style="color:'. $headercolor .';"';
				} else { 
					$header_color = ''; 
				}
				if ( $headerbackground !== '' && $headerbackground !== '#' ) {
					$header_background = 'background:'.$headerbackground.';';
				} else { 
					$header_background = ''; 
				}
				if ( $bodycolor !== '' && $bodycolor !== '#' ) {
					$body_color = ' style="color:'. $bodycolor .';"';
				} else { 
					$body_color = ''; 
				}
				if ( $bodybackground !== '' && $bodybackground !== '#' ) {
					$body_background = 'style="background:'.$bodybackground.';"';
				} else { 
					$body_background = ''; 
				}

		return '<div class="playne_toggle" style="display:block;'.$header_background.'"><h3 class="toggle-trigger"'.$header_color.'>'. $title .'</h3><div class="toggle-container" '.$body_background.'><div '.$body_color.'>' . do_shortcode($content) . '</div></div></div>';

	}
	add_shortcode('playne_toggle', 'playne_toggle_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	6. SKILLBARS
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_skillbar_shortcode') ) {

	function playne_skillbar_shortcode( $atts  ) {		

		wp_enqueue_script('playne_skillbar');
		wp_enqueue_script('playne_waypoint');

		extract( shortcode_atts( array(

			'title' => '',
			'percentage' => '100',
			'color' => '#6adcfa',
			'background' => '',
			'class' => '',
			'show_percent' => 'true',
			'type' => ''

		), $atts ) );

		if ( $type == 'striped' ) {
			$type_display = 'bar_striped';
		} else if ( $type == 'moving' ) {
			$type_display = 'bar_striped bar_animated';
		} else {
			$type_display = '';
		}

		if ( $background != '' ) {
			$background_skill = ' style="background: '. $background .';"';
		} else {
			$background_skill = '';
		}

		if ( $show_percent == 'true' ) {
			$percentage_display = '<span class="percentage-right">'.$percentage.'%</span>';
		} else {
			$percentage_display = '';
		}
			
		if ( $title !== '' ) {
			$title_display = '<span class="title-left">'. $title .'</span>';
		} else {
			$title_display = '';
		}

		$output = '<div class="playne_skillbar-wrapper"><div class="playne_skillbar-title clearfix">'.$title_display.' '.$percentage_display.'</div><div class="playne_skillbar clearfix" data-percent="'. $percentage .'%"'.$background_skill.'>';

			$output .= '<div class="playne_skillbar-bar '. $type_display .'" style="background-color: '. $color .';"></div>';

		$output .= '</div></div>';

		return $output;

	}
	add_shortcode( 'playne_skillbar', 'playne_skillbar_shortcode' );
}

/*-----------------------------------------------------------------------------------*/
/*	7. HIGHLIGHTS
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'playne_highlight_shortcode' ) ) {

	function playne_highlight_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' => '',
			'background' => '',
			'color' => ''
		  ), $atts ) );


		if ( $color != '' && $color != '#' && $style == 'none' or $style == 'None' ) {
			$highlight_color = 'color:'.$color.';';
		} else {
			$highlight_color = '';
		}

		if ( $background != '' && $background != '#' && $style == 'none' or $style == 'None' ) {
			$highlight_bg = 'background:'.$background.';';
		} else {
			$highlight_bg = '';
		}

		  return '<span class="playne_highlight playne_highlight-'. $style .'" style="display:inline-block;'.$highlight_bg.''.$highlight_color.'">' . $content . '</span>';

	}
	add_shortcode('playne_highlight', 'playne_highlight_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	8. DIVIDER LINE
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'playne_divider_shortcode' ) ) {

	function playne_divider_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
				'color' 	=> '#EEE',
				'height' 	=> '1px',
				'top' 		=> '30px',
				'bottom' 	=> '30px',
				'width'		=> '',
		  ), $atts ) );

		  return '<div class="playne_divider-line" style="max-width:'. $width .';background:'. $color .';height:'. $height .';margin-top:'. $top .';margin-bottom:'. $bottom .'"></div>';

	}

	add_shortcode('playne_divider', 'playne_divider_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	9. BLOCKQUOTES
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'playne_blockquote_shortcode' ) ) {

	function playne_blockquote_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
		  ), $atts ) );

		  return '<div class="playne_blockquote"><p>' . do_shortcode( $content ) . '</p></div>';

	}
	add_shortcode('playne_blockquote', 'playne_blockquote_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	10. CODE BOX
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'playne_code_shortcode' ) ) {

	function playne_code_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
		  ), $atts ) );

		  return '<div class="playne_code">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('playne_code', 'playne_code_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	11. INTRO TEXT
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'playne_intro_shortcode' ) ) {

	function playne_intro_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
		  ), $atts ) );

		  return '<div class="playne_intro">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('playne_intro', 'playne_intro_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	12. DROPCAPS
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'playne_dropcap_shortcode' ) ) {

	function playne_dropcap_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'border'		=> '',
			'bordercolor'	=> '',
			'background'	=> '',
			'color'			=> '',

		  ), $atts ) );

		if ( $border != 'No' && $border != 'none' or $background != '#' && $background != '' ) {
			$bordered = ' boxed-dropcap';
		} else {
			$bordered = '';
		}

		if ( $border != 'No' && $border != 'none' ) {
			$border_cap = 'border:2px solid '.$bordercolor.';';
		} else {
			$border_cap = '';
		}

		if ( $background != '' && $background != '#' ) {
			$background_cap = 'background:'.$background.';';
		} else {
			$background_cap = '';
		}

		if ( $color != '' && $color != '#' ) {
			$color_cap = 'color:'.$color.';';
		} else {
			$color_cap = '';
		}

		return '<span class="playne_dropcap'.$bordered.'" style="position:relative;'.$border_cap.''.$background_cap.''.$color_cap.'">' .do_shortcode( $content ) . '</span>';

	}
	add_shortcode('playne_dropcap', 'playne_dropcap_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	13. TABS
/*-----------------------------------------------------------------------------------*/

if (!function_exists('playne_tabgroup_shortcode')) {

	function playne_tabgroup_shortcode( $atts, $content = null ) {

		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('playne_tabs');

		$defaults = array();

		extract( shortcode_atts( $defaults, $atts ) );

		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();

		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

		$output = '';

		if( count($tab_titles) ){

		    $output .= '<div id="tab-'. rand(1, 100) .'" class="playne_tabs">';
			$output .= '<ul class="ui-tabs-nav clearfix">';

			foreach( $tab_titles as $tab ){

				$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';

			}

		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';

		} else {

			$output .= do_shortcode( $content );

		}

		return $output;

	}

	add_shortcode( 'playne_tabgroup', 'playne_tabgroup_shortcode' );

}

if (!function_exists('playne_tab_shortcode')) {

	function playne_tab_shortcode( $atts, $content = null ) {

		$defaults = array(

			'title' => 'Tab',
			'class' => ''

		);

		extract( shortcode_atts( $defaults, $atts ) );

		return '<div id="tab-'. sanitize_title( $title ) .'" class="tab-content '. $class .'">'. do_shortcode( $content ) .'</div>';

	}

	add_shortcode( 'playne_tab', 'playne_tab_shortcode' );
}

/*-----------------------------------------------------------------------------------*/
/*	14. BUTTONS
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_button_shortcode') ) {

	function playne_button_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'color' => 'green',
			'size' => 'regular',
			'border' => '0px',
			'customcolor' => '',
			'custombg' => '',
			'icon_left' => '',
			'icon_right' => '',
			'url' => 'put your url here',
			'title' => '',
			'target' => 'self',
			'rel' => '',

		), $atts ) );

		$iconleft = strtolower($icon_left);
		$iconright = strtolower($icon_right);

				if ( $iconleft !== '' && $iconleft !== 'none' ) {
					$lefticon = '<i class="fa fa-'. $icon_left .' left-icon"></i>';
				} else { $lefticon = ''; }
				if ( $iconright !== '' && $iconright !== 'none' ) {
					$righticon = '<i class="fa fa-'. $icon_right .' right-icon"></i>';
				} else { $righticon = ''; }

		return '<a href="' . $url . '" class="playne_button ' . $color . ' ' . $size . '" target="_'.$target.'" title="'. $title .'" rel="'.$rel.'" style="border-radius:' . $border . '">'.$lefticon.' ' . $content . ' '.$righticon.'</a>';

	}

	add_shortcode('playne_button', 'playne_button_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	15. MESSAGE BOXES
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_message_box_shortcode') ) { 

	function playne_message_box_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(

			'color' 		=> 'gray',
			'align' 		=> 'left',
			'custombg' 		=> '#',
			'customcolor' 	=> '#'

		  ), $atts ) );

		if ( $customcolor !== '' && $customcolor !== '#' ) {
			$custom_color = 'color:'. $customcolor .';';
		} else { $custom_color = ''; }
		if ( $custombg !== '' && $custombg !== '#' ) {
			$custom_bg = 'background:'. $custombg .';';
		} else { $custom_bg = ''; }

		$alert_content = '';
		$alert_content .= '<div class="playne_message_box-'. $color . '" style="text-align:'. $align . ';'. $custom_color . ''. $custom_bg . '">';
		$alert_content .= ' '. do_shortcode($content) .'</div>';
		return $alert_content;
	}

	add_shortcode('playne_message_box', 'playne_message_box_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	16. COLUMN SHORTCODE
/* 	@since v1.0
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_column_shortcode') ) {

	function playne_column_shortcode( $atts, $content = null ){

		extract( shortcode_atts( array(

			'size' => 'one-third',
			'position' =>'first'

		  ), $atts ) );

		  return '<div class="playne_' . $size . ' column-'.$position.'">' . do_shortcode($content) . '</div>';

	}

	add_shortcode('playne_column', 'playne_column_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	17. PRICING BOX
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_pricing_table_shortcode') ) {

	function playne_pricing_table_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(

			'class'			=> '',
			'visibility'	=> 'all',

		), $atts ) );

		return '<div class="playne_pricing-table clearfix '. $class .' table-'. $visibility .'">' . do_shortcode($content) . '</div><div class="clear-floats"></div>';
	}
}
add_shortcode( 'playne_pricing_table', 'playne_pricing_table_shortcode' );

if( !function_exists('playne_pricing_shortcode') ) {

	function playne_pricing_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(

			'size'					=> 'one-half',
			'position'				=> '',
			'featured'				=> 'no',
			'plan'					=> 'Basic',
			'cost'					=> '$20',
			'per'					=> 'month',
			'button_url'			=> '',
			'button_text'			=> 'Purchase',
			'button_color'			=> 'blue',
			'class'					=> '',

		), $atts ) );
		
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
		
		$pricing_content ='';
		$pricing_content .= '<div class="pricing playne_'. $size .' '. $featured_pricing .' pricing-column-'. $position. ' '. $class .'">';
		$pricing_content .= '<div class="pricing-header">';
		$pricing_content .= '<h5>'. $plan. '</h5>';
		$pricing_content .= '<div class="pricing-cost">'. $cost .'</div><div class="pricing-per">'. $per .'</div>';
		$pricing_content .= '</div>';
		$pricing_content .= '<div class="pricing-content">';
		$pricing_content .= ''. $content. '';
		$pricing_content .= '</div>';
		if( $button_url ) {
			$pricing_content .= '<div class="pricing-button"><a href="'. $button_url .'" class="table-button"><span class="playne_pricing-button-inner grow">';
			$pricing_content .= $button_text;
			$pricing_content .='</span></a></div>';
		}
		$pricing_content .= '</div>';
		return $pricing_content;
	}
}
add_shortcode( 'playne_pricing', 'playne_pricing_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	18. GOOGLE MAPS
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if (! function_exists( 'playne_shortcode_googlemaps' ) ) {

	function playne_shortcode_googlemaps($atts, $content = null) {

		wp_enqueue_script('playne_googlemap');
		wp_enqueue_script('playne_googlemap_api');

		extract(shortcode_atts(array(

				'title'			=> '',
				'location'		=> '',
				'width'			=> '',
				'height'		=> '300',
				'zoom'			=> 8,
				'align'			=> '',
				'class'			=> '',
				'visibility'	=> 'all',

		), $atts));
		
		$output = '<div id="map_canvas_'.rand(1, 100).'" class="playne_googlemap '. $class .' '. $visibility .'" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';
		
		return $output;
	}
}
add_shortcode("playne_googlemap", "playne_shortcode_googlemaps");

/*-----------------------------------------------------------------------------------*/
/*	19. SOCIAL ICONS
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_social_shortcode') ) {

	function playne_social_shortcode( $atts ){   

		extract( shortcode_atts( array(

			'icon'				=> 'twitter',
			'size'				=> '14px',
			'url'				=> 'http://www.twitter.com/playnethemes',
			'title'				=> 'Follow Us',
			'color'				=> '',
			'circle'			=> 'no',
			'circlecolor'	=> '',
			'target'			=> 'self',
			'rel'				=> '',
			'class'				=> '',

		), $atts ) );

		if ( $circlecolor !== '' && $circlecolor !== '#') {
			$circle_background_color = 'color:'.$circlecolor.';';
		} else { $circle_background_color = ''; }

		if ( $circle !== 'no' && $circle !== 'No') {
			$circle_background = '<span class="icon-background-wrapper clearfix"><i class="fa fa-circle icon-background" style="font-size:' . $size * 3 . 'px;'.$circle_background_color.'width:' . $size * 3 . 'px;"></i>';
			$circle_padding = ' style="padding:' . $size . ';"';
		} else { $circle_background = ''; $circle_padding = ''; }

		if ( $circle !== 'no' && $circle !== 'No') {
			$circle_background_end = '</span>';
		} else { $circle_background_end = ''; }

		return '<a href="' . esc_url($url) . '" style="font-size:' . $size . ';color:'. $color . ';" class="ontopsocial-icon '. $class .'" target="_'.$target.'" title="'. $title .'" rel="'. $rel .'">'.$circle_background.'<i class="ontop fa fa-'. $icon .'"'.$circle_padding.'></i>'.$circle_background_end.'</a>';
	}
}
add_shortcode('playne_social', 'playne_social_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	20. ICONS
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_icons_shortcode') ) {

	function playne_icons_shortcode( $atts ){   

		extract( shortcode_atts( array(

			'icon'				=> 'rocket',
			'size'				=> '14px',
			'color'				=> '',
			'boxed'				=> '',
			'boxcolor'			=> '',
			'boxbackground'		=> '',
			'circle'			=> 'no',
			'circlecolor'		=> ''

		), $atts ) );

		if ( $color !== '' && $color !== '#') {
			$icon_color = 'color:'.$color.';';
		} else { $icon_color = ''; }

		if ( $boxcolor !== '' && $boxcolor !== '#') {
			$boxed_color = 'color:'.$boxcolor.';';
		} else { $boxed_color = ''; }

		if ( $boxbackground !== '' && $boxbackground !== '#') {
			$boxed_background = 'color:'.$boxbackground.';';
		} else { $boxed_background = ''; }

		if ( $circlecolor !== '' && $circlecolor !== '#') {
			$circle_background_color = 'color:'.$circlecolor.';';
		} else { $circle_background_color = ''; }

		if ( $circle !== 'no' && $circle !== 'No') {
			$circle_background = '<span class="icon-background-wrapper clearfix"><i class="fa fa-circle icon-background" style="font-size:' . $size * 3 . 'px;'.$circle_background_color.'width:' . $size * 3 . 'px;"></i>';
			$circle_padding = 'padding:' . $size . ';';
		} else { $circle_background = ''; $circle_padding = ''; }

		if ( $circle !== 'no' && $circle !== 'No') {
			$circle_background_end = '</span>';
		} else { $circle_background_end = ''; }

		return ''.$circle_background.'<i class="ontop fa fa-'. $icon .'" style="font-size:' . $size . ';'. $icon_color . ''.$circle_padding.'"></i>'.$circle_background_end.'';
	}
}
add_shortcode('playne_icon', 'playne_icons_shortcode');


if( !function_exists('playne_icon_box_shortcode') ) {

	function playne_icon_box_shortcode( $atts, $content = null ){   

		extract( shortcode_atts( array(

			'color'			=> '',
			'background'	=> '',
			'align'			=> ''

		), $atts ) );

		if ( $align !== 'Left' && $align !== 'left') {
			$boxed_align = 'text-align:'.$align.';';
		} else { $boxed_align = ''; }

		if ( $color !== '' && $color !== '#') {
			$boxed_color = 'color:'.$color.';';
		} else { $boxed_color = ''; }

		if ( $background !== '' && $background !== '#') {
			$boxed_background = 'background:'.$background.';';
		} else { $boxed_background = ''; }

		return '<div class="playne_icon_box" style="display:block;'.$boxed_color.''.$boxed_background.''.$boxed_align.'">' . do_shortcode( $content ) . '</div>';
	}
}
add_shortcode('playne_icon_box', 'playne_icon_box_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	21. COUNTER
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_counter_shortcode') ) {

	function playne_counter_shortcode( $atts, $content = null ){   

		wp_enqueue_script('playne_counting');
		wp_enqueue_script('playne_waypoint');

		extract( shortcode_atts( array(

			'size'				=> '14px',
			'align'				=> 'left',
			'titlesize' 		=> '',
			'title' 			=> '',
			'color'				=> '',
			'titlecolor'		=> ''

		), $atts ) );

		if ( $color !== '' && $color !== '#' ) {
			$color_counter = 'color:' . $color . '';
		} else { $color_counter = ''; }

		if ( $titlecolor !== '' && $titlecolor !== '#' ) {
			$title_color = 'color:' . $titlecolor . '';
		} else { $title_color = ''; }

		if ( $title !== '' ) {
			$custom_title = '<div class="counter-title" style="font-size:' . $titlesize . ';'.$title_color.'">' . $title . '</div>';
		} else { $custom_title = ''; }

		return '<div class="playne_counter" style="text-align:' . $align . ';font-size:' . $size . ';'. $color_counter . '"><div class="counter-number">' . $content . '</div>'.$custom_title.'</div>';
	}
}
add_shortcode('playne_counter', 'playne_counter_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	22. SIMPLE CHART
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_circlecount_shortcode') ) {

	function playne_circlecount_shortcode( $atts, $content = null ){   

		wp_enqueue_script('playne_chart');
		wp_enqueue_script('playne_waypoint');

		extract( shortcode_atts( array(

			'value'				=> '50',
			'titlesize' 		=> '20px',
			'titlecolor' 		=> '#',
			'size'				=> '140',
			'title' 			=> '',
			'color'				=> '#e6ae48',
			'background'		=> '#EEE',
			'align'				=> ''

		), $atts ) );

		if ( $align !== 'normal' && $align !== 'Normal' ) {
			$align_bar = 'display:block;margin:0 auto;';
		} else { $align_bar = ''; }

		if ( $titlecolor !== '' && $titlecolor !== '#' ) {
			$color_title = 'color:' . $titlecolor . '';
		} else { $color_title = ''; }

		return '<div class="percentage playne_chart" data-scales="no" data-bar-color="'.$color.'" data-track-color="'.$background.'" data-size="'. $size .'" data-percent="' . $value . '"" style="'.$align_bar.'position:relative;font-size:'.$titlesize.';'.$titlecolor.'">' . $content . '</div>';
	}
}
add_shortcode('playne_circlecount', 'playne_circlecount_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	23. TESTIMONIAL SLIDER
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if (!function_exists('playne_testimonialgroup_shortcode')) {

	function playne_testimonialgroup_shortcode( $atts, $content = null ) {

		wp_enqueue_script('playne_bxslider');

		$defaults = array(
		);

		extract( shortcode_atts( array(

			'color'				=> ''

		), $atts ) );

		if ( $color !== '' && $color !== '#' ) {
			$color_text = ' style="color:' . $color . '"';
		} else { $color_text = ''; }

		$output = '';

		extract( shortcode_atts( $defaults, $atts ) );

			$output .= '<ul class="playne_bxslider bxslider"'.$color_text.'>';

		    $output .= do_shortcode( $content );

		    $output .= '</ul>';

		return $output;

	}

	add_shortcode( 'playne_testimonialgroup', 'playne_testimonialgroup_shortcode' );

}

if (!function_exists('playne_testimonial_shortcode')) {

	function playne_testimonial_shortcode( $atts, $content = null ) {

		$defaults = array(
		);

		extract( shortcode_atts( array(

			'title'				=> 'Name of person',
			'color'				=> ''

		), $atts ) );

		if ( $color !== '' && $color !== '#' ) {
			$color_text = ' style="color:' . $color . '"';
		} else { $color_text = ''; }

		if ( $color !== '' && $color !== '#' ) {
			$color_header = ' style="color:' . $color . '"';
		} else { $color_header = ''; }

		extract( shortcode_atts( $defaults, $atts ) );

		return '<li class="playne_bxslide"><div class="quote-image"></div><blockquote><q>'. do_shortcode( $content ) .'</q></blockquote><h5'.$color_header.'>'.$title.'</h5></li>';

	}

	add_shortcode( 'playne_testimonial', 'playne_testimonial_shortcode' );
}

if (!function_exists('playne_testimonial_image_shortcode')) {

	function playne_testimonial_image_shortcode( $atts, $content = null ) {

		$defaults = array(

			'image' => ''

		);

		extract( shortcode_atts( $defaults, $atts ) );

		return '<div class="quote-image">'. do_shortcode( $content ) .'</div>';

	}

	add_shortcode( 'playne_testimonial_image', 'playne_testimonial_image_shortcode' );
}

/*-----------------------------------------------------------------------------------*/
/*	24. ACCORDION
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if( !function_exists('playne_accordion_main_shortcode') ) {
	function playne_accordion_main_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'class'			=> '',
			'visibility'	=> 'all',
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('playne_accordion');
		
		// Display the accordion	
		return '<div class="playne_accordion '. $class .' playne_'. $visibility .'">' . do_shortcode($content) . '</div>';
	}
}
add_shortcode( 'playne_accordion', 'playne_accordion_main_shortcode' );


// Section
if( !function_exists('playne_accordion_section_shortcode') ) {
	function playne_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title'	=> 'Title',
			'class'	=> '',
		), $atts ) );
		return '<h4 class="playne_accordion-trigger '. $class .'"><a href="#">'. $title .'</a><span class="trigger-icon">+</span></h4><div>' . do_shortcode($content) . '</div>';
	}
}
add_shortcode( 'playne_accordion_section', 'playne_accordion_section_shortcode' );


/*-----------------------------------------------------------------------------------*/
/*	25. IMAGE SLIDER
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if (!function_exists('playne_slidergroup_shortcode')) {

	function playne_slidergroup_shortcode( $atts, $content = null ) {

		wp_enqueue_script('playne_bxslider');

		$defaults = array(
		);

		extract( shortcode_atts( array(

			'arrows'	=> 'no',
			'dots'		=> 'yes'

		), $atts ) );

		$output = '';

		extract( shortcode_atts( $defaults, $atts ) );

			$output .= '<ul class="playne_bxslider bxslider">';

		    $output .= do_shortcode( $content );

		    $output .= '</ul>';

		return $output;

	}

	add_shortcode( 'playne_slidergroup', 'playne_slidergroup_shortcode' );

}

if (!function_exists('playne_slide_image_shortcode')) {

	function playne_slide_image_shortcode( $atts, $content = null ) {

		$defaults = array(
		);

		$output = '';

		extract( shortcode_atts( $defaults, $atts ) );

			$output .= '<li class="playne_bxslide-image">';

		    $output .= do_shortcode( $content );

		    $output .= '</li>';

		return $output;

	}

	add_shortcode( 'playne_slide_image', 'playne_slide_image_shortcode' );
}

/*-----------------------------------------------------------------------------------*/
/*	26. TOOLTIPS
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if (!function_exists('playne_tooltip_shortcode')) {

	function playne_tooltip_shortcode( $atts, $content = null ) {

		wp_enqueue_script('playne_tipr');

		$defaults = array(
			'text'			=> 'This is a tooltip',
			'align' 		=> 'top'
		);

		extract( shortcode_atts( array(

		), $atts ) );

		$output = '';

		extract( shortcode_atts( $defaults, $atts ) );

			$output .= '<span class="playne_tip" data-mode="'.$align.'" data-tip="'.$text.'">';

		    $output .= do_shortcode( $content );

		    $output .= '</span>';

		return $output;

	}

	add_shortcode( 'playne_tooltip', 'playne_tooltip_shortcode' );

}

/*-----------------------------------------------------------------------------------*/
/*	27. CLEAR FLOAT
/* 	@since v1.3
/*-----------------------------------------------------------------------------------*/

if (!function_exists('playne_clear_shortcode')) {

	function playne_clear_shortcode( $atts, $content = null ) {


		$defaults = array(
		);

		extract( shortcode_atts( array(

		), $atts ) );

		$output = '';

		extract( shortcode_atts( $defaults, $atts ) );

			$output .= '<div class="clearfix"></div>';

		return $output;

	}

	add_shortcode( 'playne_clear', 'playne_clear_shortcode' );

}