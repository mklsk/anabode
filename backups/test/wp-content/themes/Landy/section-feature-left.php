<?php
/*
Template Name: -- Feature left
*/
?>  
<script>jQuery(document).ready(function(t){t(".feature-text").each(function(){var e=t(this).attr("id"),i=t(".feature-text-"+e).height();t(".feature-img-"+e).css("min-height",i+"px")})});</script>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="feature-left clearfix feature-left-<?php the_id(); ?> <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>
       
        <div id="<?php the_id(); ?>" class="one-half float-right feature-text feature-text-<?php the_id(); ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInLeft animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> data-wow-duration="1.5s"<?php } ?>>

            <div class="feature-inner">

                <!-- Title & content -->
                <h2 class="home-title" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
                
                <div class="border-left">
                    <div class="border-block"></div>
                </div>

                <?php the_content(); ?>

            </div>

        </div>

        <?php if (has_post_thumbnail( $post->ID ) ) { ?><?php $image_feature = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?><?php } ?>
        <div class="one-half float-left feature-img feature-img-<?php the_id(); ?>"<?php if (has_post_thumbnail( $post->ID ) ) { ?> style="background-image: url('<?php echo esc_url($image_feature[0]); ?>')"<?php } ?>></div>

</section>