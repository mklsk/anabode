<?php
/*
Template Name: -- Image full width
*/
?>  

<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

	<div class="row clearfix<?php if ( get_post_meta($post->ID, '_playne_sticktobottom', true) == 'yes') { ?> no-bottom<?php } ?>">

	    <?php $post_title = get_the_title(); if ($post_title == '') { ?>
	    <?php } else { ?>
	    	<!-- Title & content -->
	        <h2 class="home-title <?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?>not-centered<?php } else { ?>centered<?php } ?>"><?php the_title(); ?></h2>
            <div class="border-center">
                <div class="border-block"></div>
            </div>
		<?php } ?>

	    <?php the_content(); ?>

 		<div class="full-image clearfix extra-top<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInUp animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?><?php } else { ?> data-wow-duration="1.5s"<?php } ?>>
      	    <?php if ( has_post_thumbnail() ) { ?>
		    	<!-- Featured image -->
		        <?php the_post_thumbnail( 'large-image' ); ?>
		    <?php } ?>
		</div>

	</div>

</section>