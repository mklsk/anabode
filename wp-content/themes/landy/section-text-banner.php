<?php
/*
Template Name: -- Banner
*/
?>  
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_header(); ?> 
<?php } ?>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix <?php landy_oddeven(); ?>" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

    <div class="row banner clearfix">

	    <?php $post_title = get_the_title(); if ($post_title == '') { ?>
	    <?php } else { ?>
	    	<!-- Title -->
	        <h2 class="home-title <?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?>not-centered<?php } else { ?>centered<?php } ?>" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>><?php the_title(); ?></h2>
		    
		    <div class="<?php if ( get_post_meta($post->ID, '_playne_dontcenterheader', true) == 'no') { ?>border<?php } else { ?>border-center<?php } ?>">
		   		<div class="border-block"></div>
		    </div>	
		        
	    <?php } ?>

	    <div class="twelve columns">
	    	<!-- Content -->
	        <?php the_content(); ?>
	    </div>
        
    </div>
    <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><div class="section-bg<?php if ( get_post_meta($post->ID, '_playne_parallax', true) == 'no') { ?><?php } else { ?> parallax<?php } ?>" style="<?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image')";  ?>"></div><?php } ?>
</section>
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_footer(); ?> 
<?php } ?>