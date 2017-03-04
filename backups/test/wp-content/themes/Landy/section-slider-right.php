<?php
/*
Template Name: -- Slider right
*/
?>  

<script type="text/javascript">
/*global jQuery:false */
jQuery(document).ready(function ($) {
    $(window).load(function() {
    "use strict";

   var custom_controls_boxr = ".flexslider-controls-box-<?php the_id(); ?>";
   var custom_sliderr = ".flexslider-small-<?php the_id(); ?>";

    $(custom_sliderr).flexslider({
        animation: 'fade',
        touch: true,
        slideshow: false,
        controlNav: true,
        directionNav: false,
        smoothHeight: true,
        controlsContainer:  custom_controls_boxr
    });
     });
    
});
</script>

<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <div class="row scrollme clearfix">

        <div class="two-third column-last righty<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInRight animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> data-wow-duration="1.5s"<?php } ?>>
          <!-- Get flexslider container -->
            <div class="flexslider-container">
                <div class="flexslider-small flexslider-small-<?php the_id(); ?>" id="<?php the_id(); ?>">

                    <ul class="slides">
                        <?php
                        global $post;
                        $files = get_post_meta( $post->ID, '_playne_featuredimages', 1 );
                        foreach ( (array) $files as $attachment_id => $attachment_url ) { ?>

                            <li class="slide">
                                <?php echo wp_get_attachment_image( $attachment_id, 'large-image' ); ?>
                            </li>

                        <?php } ?>
                    </ul>

                </div>
            </div>

        </div>

        <div class="one-third columns">
            <!-- Title & content -->
            <h2 class="home-title" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
            
            <div class="border-left">
                <div class="border-block"></div>
            </div>

            <?php the_content(); ?>
            <!-- Flexslider controls container -->
            <div class="flexslider-controls-box-<?php the_id(); ?>"></div>
        </div>
        
    </div>

</section>