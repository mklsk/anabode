<?php
/*
Template Name: -- Clients
*/
?>  

<section id="<?php echo( basename(get_permalink()) ); ?>" class="centered scrollme animateme clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <div class="row clearfix">

        <?php $post_title = get_the_title(); if ($post_title == '') { ?>
        <?php } else { ?>
            <!-- Title -->
            <h2 class="home-title <?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?>not-centered<?php } else { ?>centered<?php } ?>" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
            <div class="border-center">
                <div class="border-block"></div>
            </div>       
        <?php } ?>

            <?php if($post->content=="") { ?>
            <?php } else { ?>
                <!-- Content -->
                <div class="extra-bottom-client">
                    <?php the_content(); ?>
                </div>
            <?php } ?>

            <?php
            $loopclients = new WP_Query(array('post_type' => 'clients','posts_per_page' => 40));
            $count =0;
            ?>

            <!-- Start client rows -->
            <?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>
                <?php $c = 1; echo '<ul class="clients clearfix">'; ?>
            <?php } else { ?>
                <?php $c = 1; echo '<ul class="clients clearfix">'; ?>
            <?php } ?>

            <?php if ( $loopclients ) : while ( $loopclients->have_posts() ) : $loopclients->the_post(); ?>

              <!-- Single client -->
              <li class="client one-fourth<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInUp animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> data-wow-duration="1.5s"<?php } ?>>
                <?php if( has_post_thumbnail() ) {  ?>
                  <?php the_post_thumbnail( 'large-image' ); ?>
                <?php } ?>
                <?php if($post->post_content != "") { ?>
                    <div class="content-div">
                        <?php the_content(); ?>
                    </div>
                <?php } ?>
              </li> 

            <?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>
                <?php if($c % 4 == 0) {echo '</ul><ul class="clients clearfix">';} ?>
            <?php } else { ?>
                 <?php if($c % 4 == 0) {echo '</ul><ul class="clearfix second-row clients">';} ?>
            <?php } ?>

            <?php $c++; endwhile; ?>
            <?php endif; ?>

            <?php echo '</ul>'; ?>
        
    </div>

</section>