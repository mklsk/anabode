<?php
/*
Template Name: -- Image slider
*/
?>  
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_header(); ?> 
<?php } ?>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix gallery <?php $post_title = get_the_title(); if($post->post_content=="" && $post_title == '')  { ?>extra-topping <?php } ?><?php landy_oddeven(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <?php $post_title = get_the_title(); if($post->post_content=="" && $post_title == '')  { ?>
    <?php } else { ?>
    <div class="row clearfix">
    <?php } ?>

    <?php if ($post_title == '') { ?>
    <?php } else { ?>
        <!-- Title & content -->
        <h2 class="home-title <?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?>not-centered<?php } else { ?>centered<?php } ?>" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
           
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

    <div class="slider center-slick<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInUp animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?> data-wow-offset="100" data-wow-duration="1.5s"<?php } ?>>

        <?php
        global $post;
        $files = get_post_meta( $post->ID, '_playne_featuredimages', 1 );
        foreach ( (array) $files as $attachment_id => $attachment_url ) { ?>

            <div>
                <a href="<?php echo $attachment_url; ?>" class="lightbox-link">
                    <?php echo wp_get_attachment_image( $attachment_id, 'large-image' ); ?>
                </a>
                <div class="back-image"></div>
            </div>

        <?php } ?>

    </div>

</section>
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_footer(); ?> 
<?php } ?>