<?php
/*
Template Name: -- Latest news
*/
?>  

<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix gallery <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <div class="row clearfix">

        <?php $post_title = get_the_title(); if ($post_title == '') { ?>
        <?php } else { ?>
            <h2 class="home-title <?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?>not-centered<?php } else { ?>centered<?php } ?>" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
            
            <div class="border-center<?php if($post->post_content=="") { ?> extra-bottom-client<?php } ?>">
                <div class="border-block"></div>
            </div>

        <?php } ?>

        <?php the_content(); ?>

    </div>

    <div class="row-news">

        <div<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> class="wow fadeInUp animated" data-wow-duration="1.5s"<?php } ?>>

            <div class="owl-carousel news">

                <?php $recentPosts = new WP_Query(); $recentPosts->query('showposts=3'); ?>
                <?php if ( $recentPosts->have_posts() ) : while ( $recentPosts->have_posts() ) : $recentPosts->the_post(); ?>

                    <div class="slide clearfix">

                        <div class="image-news">
                            <!-- Check if there is a video or image -->
                            <?php if ( get_post_meta($post->ID, 'video', true) ) { ?>
                                <div class="fitvid">
                                    <?php echo get_post_meta($post->ID, 'video', true) ?>
                                </div>
                            <?php } else { ?>
                            <?php if ( has_post_thumbnail() ) { ?>
                                <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail( 'large-image' ); ?>
                                </a>
                            <?php } ?>
                            <?php } ?>
                        </div>

                        <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                        <div class="more-info"><?php _e('On','playne'); ?> <?php echo get_the_date(); ?> <?php _e('by','playne'); ?> <?php the_author_posts_link(); ?></div>

                        <div class="text-news">
                            <?php the_excerpt(); ?>
                        </div>
                        
                    </div>

                <?php endwhile; ?>
                <?php endif; ?>
                  
            </div>

        </div>

    </div>

</section>