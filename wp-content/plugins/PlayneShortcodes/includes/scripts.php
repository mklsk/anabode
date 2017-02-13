<?php

if( !function_exists ('shortcodes_scripts') ) :
	function shortcodes_scripts() {

		$scripts_dir = plugin_dir_url( __FILE__ );

		wp_enqueue_style('shortcode_styles', $scripts_dir . 'css/elements.css');

		wp_register_script( 'playne_googlemap',  $scripts_dir . 'js/playne_googlemap.js', array('jquery'), '1.0', true );
		wp_register_script( 'playne_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '1.0', true );
		wp_register_script('playne_tabs',  $scripts_dir . 'js/playne_tabs.js', array('jquery'), '1.0', true);
		wp_register_script('playne_accordion',  $scripts_dir . 'js/playne_accordion.js', array('jquery'), '1.0', true);
		wp_register_script('playne_counting',  $scripts_dir . 'js/playne_counting.js', array('jquery'), '1.0', true);
		wp_register_script('playne_waypoint',  $scripts_dir . 'js/playne_waypoint.js', array('jquery'), '1.0', true);
		wp_register_script('playne_chart',  $scripts_dir . 'js/playne_chart.js', array('jquery'), '1.0', true);
		wp_register_script('playne_tipr',  $scripts_dir . 'js/playne_tipr.js', array('jquery'), '1.0', true);
		wp_register_script('playne_bxslider',  $scripts_dir . 'js/playne_bxslider.js', array('jquery'), '1.0', true);
		wp_register_script('playne_toggle',  $scripts_dir . 'js/playne_toggle.js', array('jquery'), '1.0', true);
		wp_register_script('playne_skillbar',  $scripts_dir . 'js/playne_skillbar.js', array('jquery'), '1.0', true);

		wp_enqueue_style( 'playne_fontawesome', $scripts_dir . 'css/font-awesome.css' );
		
	}
	add_action('wp_enqueue_scripts', 'shortcodes_scripts');
endif;