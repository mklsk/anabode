<?php
/*
Template Name: -- Image full width
*/
?>  
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_header(); ?> 
<?php } ?>
<section id="<?php echo( basename(get_permalink()) ); ?>" class="clearfix <?php landy_oddeven(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

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
		    <img width="3200" id="stay" height="1100" src="http://anabode.net/develop/wp-content/uploads/2017/03/contractors-final.jpg" class="stay attachment-large-image size-large-image wp-post-image" alt="" srcset="http://anabode.net/develop/wp-content/uploads/2017/03/contractors-final.jpg 3200w, http://anabode.net/develop/wp-content/uploads/2017/05/contractors-final-MOBILe.jpg 768w, http://anabode.net/develop/wp-content/uploads/2017/03/contractors-final-1024x352.jpg 1024w, http://anabode.net/develop/wp-content/uploads/2017/03/contractors-final-1500x516.jpg 1500w, http://anabode.net/develop/wp-content/uploads/2017/03/contractors-final-1400x481.jpg 1400w" sizes="(max-width: 3200px) 100vw, 3200px">
		</div>

	</div>

</section>
<?php if (!is_page_template('homepage.php')) { ?> 
<?php get_footer(); ?> 
<?php } ?>