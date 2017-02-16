<?php
/*
Template Name: -- Testimonials slider
*/
?>  
<?php if (is_page_template('homepage.php')) { ?> 
<?php get_header(); ?> 
<?php } ?>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix gallery testimonial-slider <?php $post_title = get_the_title(); if($post->post_content=="" && $post_title == '')  { ?>extra-topping <?php } ?><?php landy_oddeven(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

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


    <div class="testims_wrap">

        <!-- loop init -->
        <?php $loop_blockquote = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => -1)); $count =0; ?>


         <div class="testims_row">
            <!-- loop start -->

            <?php if ( $loop_blockquote ) : while ( $count < 2 ) : $loop_blockquote->the_post(); ?>

                <div class="one_testim">

                        <div class="filter"></div>
                        <!-- img -->
                        <div class="image-blockquote custom">
                            <?php the_post_thumbnail( 'large-image' ); ?>
                        </div>

                          <!-- text -->
                  
                        <div class="text-blockquote custom">
                           <?php the_content(); ?>
                            <h6><?php the_title(); ?></h6>
                        </div>
                </div>

                <!-- count how many where posted -->
                <?php $count++; ?>

            <?php endwhile; ?>

            </div>


            <div class="testims_row">
            <!-- loop start -->

            <?php while ( $count < 4 ) : $loop_blockquote->the_post(); ?>

                <div class="one_testim">

                <div class="filter"></div>
                    <!-- img -->
                        <div class="image-blockquote custom">
                            <?php the_post_thumbnail( 'large-image' ); ?>
                        </div>

                    <!-- text -->
                  
                        <div class="text-blockquote custom">
                            <?php the_content(); ?>
                            <h6><?php the_title(); ?></h6>
                        </div>
                </div>

                <!-- count how many where posted -->
                <?php $count++; ?>

           
             <?php endwhile; else: ?>
            </div>

            <?php endif; ?>


        

           
            
    

</section>
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_footer(); ?> 
<?php } ?>