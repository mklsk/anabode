<?php

/*
 Plugin Name: Custom Playne Post Types
 Plugin URI: http://themeforest.net/user/playnethemes
 Description: Custom post types for use in the Landy theme.
 Author: Playne Themes
 Author URI: http://themeforest.net/user/playnethemes
 Version: 1.0
 */

add_action('init', 'testimonials_custom_init');
	/*-- Custom Post Init Begin --*/
	function testimonials_custom_init()
	{
	  $labels = array(
		'name' => _x('Testimonials', 'post type general name', 'playne'),
		'singular_name' => _x('Testimonial', 'post type singular name', 'playne'),
		'add_new' => _x('Add New', 'Testimonial', 'playne'),
		'add_new_item' => __('Add New Testimonial', 'playne'),
		'edit_item' => __('Edit Testimonial', 'playne'),
		'new_item' => __('New Testimonial', 'playne'),
		'view_item' => __('View Testimonial', 'playne'),
		'search_items' => __('Search Testimonials', 'playne'),
		'not_found' =>  __('No Testimonials found', 'playne'),
		'not_found_in_trash' => __('No Testimonials found in Trash', 'playne'),
		'parent_item_colon' => '',
		'menu_name' => 'Testimonials'
	  );
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments', 'post-meta-box-slider', 'custom-fields')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('testimonial',$args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Categories', 'taxonomy general name', 'playne' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'playne' ),
		'search_items' =>  __( 'Search Types', 'playne' ),
		'all_items' => __( 'All Categories', 'playne' ),
		'parent_item' => __( 'Parent Category', 'playne' ),
		'parent_item_colon' => __( 'Parent Category:', 'playne' ),
		'edit_item' => __( 'Edit Categoriess', 'playne' ),
		'update_item' => __( 'Update Category', 'playne' ),
		'add_new_item' => __( 'Add New Category', 'playne' ),
		'new_item_name' => __( 'New Category Name', 'playne' ),
	  );

	}
	/*-- Custom Post Init Ends --*/

	/*--- Custom Messages - project_updated_messages ---*/
	add_filter('post_updated_messages', 'testimonial_updated_messages');
	function testimonial_updated_messages( $messages ) {
	  global $post, $post_ID;
	  $messages['testimonial'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Testimonial updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', 'playne'),
		3 => __('Custom field deleted.', 'playne'),
		4 => __('Testimonial updated.', 'playne'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Testimonial restored to revision from %s', 'playne'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Testimonial published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Testimonial saved.', 'playne'),
		8 => sprintf( __('Testimonial submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i', 'playne'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Testimonial draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );
	  return $messages;
	}
	/*--- #end playne - project_updated_messages ---*/	

add_action('init', 'clients_custom_init');
	/*-- Custom Post Init Begin --*/
	function clients_custom_init()
	{
	  $labels = array(
		'name' => _x('Clients', 'post type general name', 'playne'),
		'singular_name' => _x('Client', 'post type singular name', 'playne'),
		'add_new' => _x('Add New', 'Client', 'playne'),
		'add_new_item' => __('Add New Client', 'playne'),
		'edit_item' => __('Edit Client', 'playne'),
		'new_item' => __('New Client', 'playne'),
		'view_item' => __('View Client', 'playne'),
		'search_items' => __('Search Clients', 'playne'),
		'not_found' =>  __('No Clients found', 'playne'),
		'not_found_in_trash' => __('No Clients found in Trash', 'playne'),
		'parent_item_colon' => '',
		'menu_name' => 'Clients / Press'
	  );
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('clients',$args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Categories', 'taxonomy general name', 'playne' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'playne' ),
		'search_items' =>  __( 'Search Types', 'playne' ),
		'all_items' => __( 'All Categories', 'playne' ),
		'parent_item' => __( 'Parent Category', 'playne' ),
		'parent_item_colon' => __( 'Parent Category:', 'playne' ),
		'edit_item' => __( 'Edit Categoriess', 'playne' ),
		'update_item' => __( 'Update Category', 'playne' ),
		'add_new_item' => __( 'Add New Category', 'playne' ),
		'new_item_name' => __( 'New Category Name', 'playne' ),
	  );

	}
	/*-- Custom Post Init Ends --*/

	/*--- Custom Messages - project_updated_messages ---*/
	add_filter('post_updated_messages', 'clients_updated_messages');
	function clients_updated_messages( $messagesclients ) {
	  global $post, $post_ID;
	  $messagesclients['clients'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Client updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', 'playne'),
		3 => __('Custom field deleted.', 'playne'),
		4 => __('Testimonial updated.', 'playne'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Client restored to revision from %s', 'playne'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Client published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Client saved.', 'playne'),
		8 => sprintf( __('Client submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Client scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i', 'playne'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Client draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );
	  return $messagesclients;
	}
	/*--- #end playne - project_updated_messages ---*/	

add_action('init', 'members_custom_init');
	/*-- Custom Post Init Begin --*/
	function members_custom_init()
	{
	  $labels = array(
		'name' => _x('Members', 'post type general name', 'playne'),
		'singular_name' => _x('Member', 'post type singular name', 'playne'),
		'add_new' => _x('Add New', 'Member', 'playne'),
		'add_new_item' => __('Add New Member', 'playne'),
		'edit_item' => __('Edit Member', 'playne'),
		'new_item' => __('New Member', 'playne'),
		'view_item' => __('View Client', 'playne'),
		'search_items' => __('Search Members', 'playne'),
		'not_found' =>  __('No Members found', 'playne'),
		'not_found_in_trash' => __('No Members found in Trash', 'playne'),
		'parent_item_colon' => '',
		'menu_name' => 'Members'
	  );
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('members',$args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Categories', 'taxonomy general name', 'playne' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'playne' ),
		'search_items' =>  __( 'Search Types', 'playne' ),
		'all_items' => __( 'All Categories', 'playne' ),
		'parent_item' => __( 'Parent Category', 'playne' ),
		'parent_item_colon' => __( 'Parent Category:', 'playne' ),
		'edit_item' => __( 'Edit Categoriess', 'playne' ),
		'update_item' => __( 'Update Category', 'playne' ),
		'add_new_item' => __( 'Add New Category', 'playne' ),
		'new_item_name' => __( 'New Category Name', 'playne' ),
	  );

	}
	/*-- Custom Post Init Ends --*/

	/*--- Custom Messages - project_updated_messages ---*/
	add_filter('post_updated_messages', 'members_updated_messages');
	function members_updated_messages( $membersmembers ) {
	  global $post, $post_ID;
	  $messagesmembers['clients'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Member updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', 'playne'),
		3 => __('Custom field deleted.', 'playne'),
		4 => __('Testimonial updated.', 'playne'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Member restored to revision from %s', 'playne'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Member published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Member saved.', 'playne'),
		8 => sprintf( __('Member submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i', 'playne'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Member draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );
	  return $messagesmembers;
	}
	/*--- #end playne - project_updated_messages ---*/	
?>