<?php
/*
Template Name: -- Testimonials slider
*/
?>  

<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix gallery testimonial-slider <?php $post_title = get_the_title(); if($post->post_content=="" && $post_title == '')  { ?>extra-topping <?php } ?><?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <?php $post_title = get_the_title(); if($post->post_content=="" && $post_title == '')  { ?>
    <?php } else { ?>
    <div class="row clearfix">
    <?php } ?>

    <?php if ($post_title == '') { ?>
    <?php } else { ?>
        <!-- Title & content -->
        <h2 class="home-title<?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?> not-centered<?php } else { ?> centered<?php } ?>" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
           
        <div class="border-center<?php if($post->post_content=="") { ?> extra-bottom-client<?php } ?>">
            <div class="border-block"></div>
        </div>
    <?php } ?>

    <?php if($post->post_content=="") { ?>
    <?php } else { ?>
        <!-- Content -->
        <div class="extra-bottom-client">
            <?php the_content(); ?>
        </div>
    <?php } ?>

    <?php if($post->post_content=="" && $post_title == '')  { ?>
    <?php } else { ?>
    </div>
    <?php } ?>

    <div class="slider center-slick-testimonials<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInUp animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> data-wow-duration="1.5s"<?php } ?>>

        <?php $loop_blockquote = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => -1)); $count =0; ?>

                <div class="slider slider-nav">
                    <?php if ( $loop_blockquote ) : while ( $loop_blockquote->have_posts() ) : $loop_blockquote->the_post(); ?>
                    <div>
                        <div class="image-blockquote">
                            <?php the_post_thumbnail( 'large-image' ); ?>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                    <?php endif; ?>
                </div>

                <div class="slider slider-for extra-bottom">
                    <?php if ( $loop_blockquote ) : while ( $loop_blockquote->have_posts() ) : $loop_blockquote->the_post(); ?>
                    <div>
                        <div class="inner-blockquote">
                            <div class="text-blockquote">
                                <h6><?php the_title(); ?></h6>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                    <?php endif; ?>
                </div>

    </div>

</section>