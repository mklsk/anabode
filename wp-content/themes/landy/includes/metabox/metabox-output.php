<?php

// Gallery Metaboxes
function playne_custom_featuredimages_metaboxes() {

    $prefix = 'playne_';

    $playne_custom_featuredimages = new_cmb2_box( array(
        'id'            => 'featuredimage_options_gallery',
        'title'         => __( 'Gallery', 'landy' ),
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
add_action( 'cmb2_init', 'playne_custom_featuredimages_metaboxes' );

// Video Metaboxes
function playne_custom_video_metaboxes() {

    $prefix = 'playne_';

    $playne_custom_featuredimages = new_cmb2_box( array(
        'id'            => 'featuredvideo_options_video',
        'title'         => __( 'Video', 'landy' ),
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
add_action( 'cmb2_init', 'playne_custom_video_metaboxes' );

// Regular Homepage Item Options
function playne_metaboxes() {

    $prefix = '_playne_'; // Prefix for all fields

    $playne_metabox = new_cmb2_box( array(
        'id'            => 'homepage_items_metabox',
        'title'         => __( 'Homepage item options', 'landy' ),
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
                    'no' => __( 'No', 'landy' ),
                    'yes'   => __( 'Yes', 'landy' )
                ),
    ) );

    $playne_metabox->add_field( array(

                'name' => 'Add Parallax effect',
                'desc' => 'add a parallax effect to the background image',
                'id'   => $prefix . 'parallax',
                'type' => 'select',
                'options' => array(
                    'no' => __( 'No', 'landy' ),
                    'yes'   => __( 'Yes', 'landy' )
                ),
    ) );

    $playne_metabox->add_field( array(

                'name' => 'Center text header on full width items',
                'desc' => 'Choose to not center the header text on full width templates',
                'id'   => $prefix . 'dontcenterheader',
                'type' => 'select',
                'options' => array(
                    'yes' => __( 'Yes', 'landy' ),
                    'no'   => __( 'No', 'landy' )
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
add_action( 'cmb2_init', 'playne_metaboxes' );

// Regular Page Options
function playne2_metaboxes() {

    $prefix = '_playne2_'; // Prefix for all fields

    $playne2_metabox = new_cmb2_box( array(
        'id'            => 'regular_page_metabox',
        'title'         => __( '(Home)page options', 'landy' ),
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

                'desc' => 'Add an icon for your button (fa-iconname). Check the full icon list here (up to version 4.7): '. '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' .'',

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

                'desc' => 'Add an icon for your button (fa-iconname). Check the full icon list here (up to version 4.7): '. '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' .'',

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
add_action( 'cmb2_init', 'playne2_metaboxes' );

// Regular Post Options
function playne3_metaboxes() {

    $prefix = '_playne3_'; // Prefix for all fields

    $playne3_metabox = new_cmb2_box( array(
        'id'            => 'post_header_metabox',
        'title'         => __( 'Regular post options', 'landy' ),
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
add_action( 'cmb2_init', 'playne3_metaboxes' );

// Regular Post Options
function playne4_metaboxes() {

    $prefix = '_playne4_'; // Prefix for all fields

    $playne4_metabox = new_cmb2_box( array(
        'id'            => 'clients_metabox',
        'title'         => __( 'Client or Press url', 'landy' ),
        'object_types'  => array( 'clients' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true
    ) );

    $playne4_metabox->add_field( array(

                'name' => 'URL',
                'desc' => 'Link to an external url when clicking on the press or client image.',
                'id'   => $prefix . 'url',
                'type' => 'text'
    ) );

}
add_action( 'cmb2_init', 'playne4_metaboxes' );