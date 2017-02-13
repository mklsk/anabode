<?php
/*
Template Name: -- Members
*/
?>  
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_header(); ?> 
<?php } ?>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="centered scrollme animateme clearfix <?php landy_oddeven(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

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
                <div class="extra-bottom-member">
                    <?php the_content(); ?>
                </div>
            <?php } ?>
    </div>
            
            <?php
                $landy_clients_args = array(
                    'post_type'        => 'members',
                    'posts_per_page'   => -1,
                );
                $landy_clients_posts = get_posts( $landy_clients_args );
            ?>
            <?php foreach (array_chunk($landy_clients_posts, 4, true) as $landy_clients_posts) :  ?>
                <ul class="member-row clearfix">
                    <?php foreach( $landy_clients_posts as $post ) : setup_postdata($post); ?>
                      <li class="single-member <?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInUp animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> data-wow-duration="1.5s"<?php } ?>>
                        <?php if( has_post_thumbnail() ) {  ?>
                          <div class="member-image"><?php the_post_thumbnail( 'large-image' ); ?></div>
                        <?php } ?>
                        <?php if($post->post_content != "") { ?>
                            <div class="member-text">
                                <div class="member-inner">
                                    <h6><?php the_title(); ?></h6>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php } ?>
                      </li> 
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; 
            wp_reset_postdata();
            ?>

</section>
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_footer(); ?> 
<?php } ?>