<?php
/**
 * Custom template tags for this theme.
 *
 * @package landy
 */

/**
 * Odd & Even Posts
 */
if ( ! function_exists( 'landy_oddeven' ) ) :
function landy_oddeven() {
	global $landy_post_num;

	if ( ++$landy_post_num % 2 )
		$landy_class = 'even';
	else
		$landy_class = 'odd';

	echo $landy_class;
}
endif;

/**
 * Display Videos
 */
function playne_video_display() {
?>
<?php global $post; if ( get_post_meta($post->ID, 'playne_featuredvideo', true )) { // Get the video ?>
	<div class="fitvid">
		<?php $playne_video = esc_url(get_post_meta( $post->ID, 'playne_featuredvideo', true )); echo wp_oembed_get( $playne_video ); ?>
	</div>
<?php }  ?>
<?php 
}

/**
 * Display Videos on pages
 */
function playne_video_display_page() {
?>
<?php global $post; if ( get_post_meta($post->ID, '_playne_featuredvideo', true )) { // Get the video ?>
    <div class="fitvid">
        <?php $playne_video = esc_url(get_post_meta( $post->ID, '_playne_featuredvideo', true )); echo wp_oembed_get( $playne_video ); ?>
    </div>
<?php }  ?>
<?php 
}

/**
 * Showcase Video
 */
function playne_video_display_showcase() {
?>
<?php global $post; if ( get_post_meta($post->ID, '_playne2_showcasevideo', true )) { // Get the showcase video ?>
	<div class="fitvid">
		<?php $playne_video = esc_url(get_post_meta( $post->ID, '_playne2_showcasevideo', true )); echo wp_oembed_get( $playne_video ); ?>
	</div>
<?php }  ?>
<?php 
}

/**
 * Display images
 */
function playne_imagelist_display( $file_list_meta_key, $img_size = 'medium' ) {
    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
    echo '<div class="flexslider-container"><div class="flexslider"><ul class="slides">';
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<li class="slide">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
        echo '</li>';
    }
    echo '</ul></div></div>';
}