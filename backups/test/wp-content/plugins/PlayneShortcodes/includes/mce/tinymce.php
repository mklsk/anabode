<?php

function playne_shortcodes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'playne_shortcodes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'playne_shortcodes_register_mce_button' );
	}
}
add_action('admin_head', 'playne_shortcodes_add_mce_button');


function playne_shortcodes_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['playne_shortcodes_mce_button'] = plugins_url( '/js/tinymce.js', __FILE__ );
	return $plugin_array;
}


function playne_shortcodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'playne_shortcodes_mce_button' );
	return $buttons;
}


function playne_shortcodes_mce_css() {
	wp_enqueue_style('playne_shortcodes-tc', plugins_url('/css/playneshortcodes.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'playne_shortcodes_mce_css' );