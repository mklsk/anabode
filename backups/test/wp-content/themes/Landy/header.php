<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php if ( get_theme_mod('theme_customizer_favicon') ) { ?>
	<!-- Get the favicon -->
	<link rel="icon" type="image/png" href="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_favicon', '' ).'');?>" />
	<?php } ?>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php if( get_theme_mod( 'theme_customizer_general1' ) == '1') { ?><?php } else if(is_page_template('homepage.php')) { ?>
	<!-- Full screen loading animation -->
	<div id="loader">
		<div id="loading-status">
			<div class="load-container load8 ">
				<div class="loader">
				</div>
			</div>
	    </div>
	</div>
	<?php } ?>

	<?php if( get_theme_mod( 'theme_customizer_general4' ) == '1' or get_theme_mod( 'theme_customizer_general9' ) == '1') { ?><?php } else { ?>
	<!-- Header fade in navigation -->
	<div class="header" id="dynamic">
		
		<nav class="row clearfix">
			<div class="logo">
			<?php if ( get_theme_mod('theme_customizer_logo') ) { ?>
				<a href="#" class="totop clearfix"><img class="logo-image" src="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_logo', '' )."");?>" alt="<?php the_title(); ?>" /></a>
	    	<?php } else { ?>
	    		<a href="#" title="<?php bloginfo('name'); ?>" class="totop logo-text"><?php echo esc_html(get_bloginfo('name')); ?></a>
	    	<?php } ?>
	    	</div>
			
			<div id="nav" class="clearfix">
				<div class="special clearfix">
					<?php if(is_front_page()) { ?>
						<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav')); ?>
					<?php } else { ?>
						<?php wp_nav_menu(array('theme_location' => 'inner', 'menu_class' => 'nav')); ?>
					<?php } ?>
			 	</div>
			</div>
		</nav>	
	</div> 
	<?php } ?>

<?php if( get_theme_mod( 'theme_customizer_general9' ) == '1') { ?><?php } else { ?>
<!-- Responsive menu toggle -->
<div class="mobile-menu clearfix">
	
	<div id="collapse">
		<div class="collapse-darker">
			<div class="row clearfix">
				<div class="mobile-menu-inner">
					<?php if (is_front_page()) { ?>
						<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav-mobile')); ?>
					<?php } else { ?>
						<?php wp_nav_menu(array('theme_location' => 'inner', 'menu_class' => 'nav-mobile')); ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>	

	<div class="collapse-menu-bg clearfix">
		<div class="collapse-menu-inner">
			<a href="#" id="collapse-menu"><i class="fa fa-bars"></i></a>
		</div>
	</div>	

</div>
<?php } ?>

<div id="main-wrap" class="clearfix<?php if( get_theme_mod( 'theme_customizer_general1' ) == '1') { ?><?php } else if (is_page_template('homepage.php')) { ?> nopreload<?php } ?>">

	<!-- Header showcase area -->
	<section id="header">

		<div class="row row-header clearfix">

			<!-- Logo -->
			<div class="logo animated fadeIn"<?php if( get_theme_mod( 'theme_customizer_general2' ) == '1' ) { ?> id="logo-centered"<?php } ?>>
					 <?php if ( get_theme_mod('theme_customizer_logo') ) { ?>
						<a href="<?php echo esc_url(home_url( '/' )); ?>" class="clearfix"><img class="logo-image" src="<?php echo esc_url('' .get_theme_mod( 'theme_customizer_logo', '' )."");?>" alt="<?php the_title(); ?>" /></a>
		    		<?php } else { ?>
			    		<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php bloginfo('name'); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a>
		    		<?php } ?>
		    </div>

			<?php if ( get_theme_mod('landy_playne_socials_paypal') or get_theme_mod('landy_playne_socials_reddit') or get_theme_mod('landy_playne_socials_dropbox') or get_theme_mod('landy_playne_socials_spotify') or get_theme_mod('landy_playne_socials_vine') or get_theme_mod('landy_playne_socials_soundcloud') or get_theme_mod('landy_playne_socials_codepen') or get_theme_mod('landy_playne_socials_behance') or get_theme_mod('landy_playne_socials_github') or get_theme_mod('landy_playne_socials_medium') or get_theme_mod('landy_playne_socials_instagram') or get_theme_mod('landy_playne_socials_facebook') or get_theme_mod('landy_playne_socials_twitter') or get_theme_mod('landy_playne_socials_google') or get_theme_mod('landy_playne_socials_youtube') or get_theme_mod('landy_playne_socials_linkedin') or get_theme_mod('landy_playne_socials_tumblr') or get_theme_mod('landy_playne_socials_flickr') or get_theme_mod('landy_playne_socials_dribbble') or get_theme_mod('landy_playne_socials_pinterest') or get_theme_mod('landy_playne_socials_vimeo') or get_theme_mod('landy_playne_socials_mail') or get_theme_mod('landy_playne_socials_skype') or get_theme_mod('landy_playne_socials_rss') ) { ?>
				<!-- Social icons -->
				<ul class="socials clearfix">
			<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_behance') ) { ?>
					<!-- Behance -->
					<li><a class="behance" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_behance', '' )."");?>"><i class="fa fa-behance"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_codepen') ) { ?>
					<!-- Codepen -->
					<li><a class="codepen" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_codepen', '' )."");?>"><i class="fa fa-codepen"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_dribbble') ) { ?>
					<!-- Dribbble -->
					<li><a class="dribbble" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_dribbble', '' )."");?>"><i class="fa fa-dribbble"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_dropbox') ) { ?>
					<!-- Dropbox -->
					<li><a class="dropbox" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_dropbox', '' )."");?>"><i class="fa fa-dropbox"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_email') ) { ?>
					<!-- Email -->
					<li><a class="mail" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_email', '' )."");?>"><i class="fa fa-envelope-o"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_facebook') ) { ?>
					<!-- Facebook -->
					<li><a class="facebook" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_facebook', '' )."");?>"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_flickr') ) { ?>
					<!-- Flickr -->
					<li><a class="flickr" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_flickr', '' )."");?>"><i class="fa fa-flickr"></i></a></li>
				<?php } ?>
						
				<?php if ( get_theme_mod('landy_playne_socials_github') ) { ?>
					<!-- Github -->
					<li><a class="github" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_github', '' )."");?>"><i class="fa fa-github"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_google') ) { ?>
					<!-- Google Plus -->
					<li><a class="google" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_google', '' )."");?>"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_instagram') ) { ?>
					<!-- Instagram -->
					<li><a class="instagram" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_instagram', '' )."");?>"><i class="fa fa-instagram"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_linkedin') ) { ?>
					<!-- LinkedIn -->
					<li><a class="linkedin" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_linkedin', '' )."");?>"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_medium') ) { ?>
					<!-- Medium -->
					<li><a class="medium" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_medium', '' )."");?>"><i class="fa fa-medium"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_paypal') ) { ?>
					<!-- Paypal -->
					<li><a class="paypal" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_paypal', '' )."");?>"><i class="fa fa-paypal"></i></a></li>
				<?php } ?>	

				<?php if ( get_theme_mod('landy_playne_socials_pinterest') ) { ?>
					<!-- Pinterest -->
					<li><a class="pinterest" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_pinterest', '' )."");?>"><i class="fa fa-pinterest"></i></a></li>
				<?php } ?>	
	
				<?php if ( get_theme_mod('landy_playne_socials_reddit') ) { ?>
					<!-- Reddit -->
					<li><a class="reddit" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_reddit', '' )."");?>"><i class="fa fa-reddit"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_rss') ) { ?>
					<!-- RSS -->
					<li><a class="rss" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_rss', '' )."");?>"><i class="fa fa-rss"></i></a></li>
				<?php } ?>
				
				<?php if ( get_theme_mod('landy_playne_socials_skype') ) { ?>
					<!-- Skype -->
					<li><a class="skype" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_skype', '' )."");?>"><i class="fa fa-skype"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_soundcloud') ) { ?>
					<!-- Soundcloud -->
					<li><a class="soundcloud" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_soundcloud', '' )."");?>"><i class="fa fa-soundcloud"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_spotify') ) { ?>
					<!-- Spotify -->
					<li><a class="spotify" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_spotify', '' )."");?>"><i class="fa fa-spotify"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_tumblr') ) { ?>
					<!-- Tumblr -->
					<li><a class="tumblr" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_tumblr', '' )."");?>"><i class="fa fa-tumblr"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_twitter') ) { ?>
					<!-- Twitter -->
					<li><a class="twitter" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_twitter', '' )."");?>"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
								
				<?php if ( get_theme_mod('landy_playne_socials_vimeo') ) { ?>
					<!-- Vimeo -->
					<li><a class="vimeo" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_vimeo', '' )."");?>"><i class="fa fa-vimeo-square"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_vine') ) { ?>
					<!-- Vine -->
					<li><a class="vine" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_vine', '' )."");?>"><i class="fa fa-vine"></i></a></li>
				<?php } ?>

				<?php if ( get_theme_mod('landy_playne_socials_youtube') ) { ?>
					<!-- Youtube -->
					<li><a class="youtube" href="<?php echo esc_url('' .get_theme_mod( 'landy_playne_socials_youtube', '' )."");?>"><i class="fa fa-youtube"></i></a></li>
				<?php } ?>
			
			<?php if ( get_theme_mod('landy_playne_socials_paypal') or get_theme_mod('landy_playne_socials_reddit') or get_theme_mod('landy_playne_socials_dropbox') or get_theme_mod('landy_playne_socials_spotify') or get_theme_mod('landy_playne_socials_vine') or get_theme_mod('landy_playne_socials_soundcloud') or get_theme_mod('landy_playne_socials_codepen') or get_theme_mod('landy_playne_socials_behance') or get_theme_mod('landy_playne_socials_github') or get_theme_mod('landy_playne_socials_medium') or get_theme_mod('landy_playne_socials_instagram') or get_theme_mod('landy_playne_socials_facebook') or get_theme_mod('landy_playne_socials_twitter') or get_theme_mod('landy_playne_socials_google') or get_theme_mod('landy_playne_socials_youtube') or get_theme_mod('landy_playne_socials_linkedin') or get_theme_mod('landy_playne_socials_tumblr') or get_theme_mod('landy_playne_socials_flickr') or get_theme_mod('landy_playne_socials_dribbble') or get_theme_mod('landy_playne_socials_pinterest') or get_theme_mod('landy_playne_socials_vimeo') or get_theme_mod('landy_playne_socials_mail') or get_theme_mod('landy_playne_socials_skype') or get_theme_mod('landy_playne_socials_rss') ) { ?>
				</ul>
			<?php } ?>

			<?php if( get_theme_mod( 'theme_customizer_general9' ) == '1') { ?><?php } else { ?>
		    <!-- Get the navigation -->
			<div class="nav-area">
				<?php if(is_front_page()) { ?>
					<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav')); ?>
				<?php } else { ?>
					<?php wp_nav_menu(array('theme_location' => 'inner', 'menu_class' => 'nav')); ?>
				<?php } ?>
			</div>
			<?php } ?>

	    </div>

    	<div class="row extra clearfix<?php if(is_page_template( 'homepage.php' ) && get_post_meta($post->ID, '_playne2_showcaseimage', true) or get_post_meta($post->ID, '_playne2_showcasevideo', true)) { ?><?php } else { ?> no-showcase<?php } ?><?php if( get_theme_mod( 'theme_customizer_general8' ) == '1') { ?> left-version<?php } ?>">

      		<div class="columns clearfix" id="fadeOut">
   			
		        <?php if ( get_post_meta( $post->ID, '_playne2_introtext_header2', true )) { ?>
		       	 	<p class="lead clearfix fade-it2 fadeInSlower animated">
						<?php global $post; $introtextheader = get_post_meta( $post->ID, '_playne2_introtext_header2', true ); echo "$introtextheader" ?>
		        	</p>
		        <?php } else if (get_theme_mod('theme_customizer_headertextlinetwoblog') && is_home()) { ?>
		        	<p class="lead clearfix fade-it2 fadeInSlower animated crumbs">
		        	<?php
						$introtextblogtext = get_theme_mod( 'theme_customizer_headertextlinetwoblog', '' );
						$introblogtext = sprintf( __( '%s', 'playne' ), esc_textarea( $introtextblogtext ) );
						echo $introblogtext;
					?>
					</p>
			 	<?php } else if (is_single()) { ?>
			 		<!-- Get second header text -->
			 		<p class="lead fade-it2 fadeInSlower animated">
			 			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			 				<?php the_author_posts_link(); ?> - <?php echo get_the_date(); ?> - <?php the_category(', '); ?><?php if ( is_sticky () ) { ?> - <?php _e('featured','playne'); ?><?php } ?>
			 			<?php endwhile; ?>
						<?php endif; ?>
					</p>
			 	<?php } ?>

		        <h2 class="<?php if ( get_theme_mod('theme_customizer_animationlist') == "value1" ) { ?>fadeIn<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value2" ) { ?>pulse<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value3" ) { ?>tada<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value4" ) { ?>bounce<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value5" ) { ?>flipInX<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value6" ) { ?>flipInY<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value7" ) { ?>fadeInLeft<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value8" ) { ?>fadeInRight<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value9" ) { ?>fadeInUp<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value10" ) { ?>fadeInDown<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value11" ) { ?>bounceInLeft<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value12" ) { ?>bounceInRight<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value13" ) { ?>bounceInUp<?php } else if ( get_theme_mod('theme_customizer_animationlist') == "value14" ) { ?>bounceInDown<?php } else { ?>fadeIn<?php } ?> animated">
		        	<?php if (get_post_meta( $post->ID, '_playne2_introtext_header', true )) { ?>
						<!-- Show this header when custom text is used on page -->
						<?php global $post; $introtext = get_post_meta( $post->ID, '_playne2_introtext_header', true ); echo "$introtext" ?></div>
					<?php } else if ( get_theme_mod('theme_customizer_headertextlineoneblog') && is_home() ) { ?>
						<?php
						$introtextblog = get_theme_mod( 'theme_customizer_headertextlineoneblog', '' );
						$introblog = sprintf( __( '%s', 'playne' ), esc_textarea( $introtextblog ) );
						echo $introblog;
						?>
					<?php } else if (is_home()) { ?>
						<?php _e('Blog','playne'); ?>
			 		<?php } else if(is_search()) { ?>
			 			<?php _e('Results for','playne'); ?> "<?php esc_attr(the_search_query()) ?>"
					<?php } else if(is_tag()) { ?>
						<?php _e('Archive:','playne'); ?> 
					<?php } else if(is_day()) { ?>
						<?php _e('Archive:','playne'); ?> <?php echo get_the_date(); ?>
					<?php } else if(is_month()) { ?>
						<?php _e('Archive:','playne'); ?> <?php echo get_the_date('F Y'); ?>
					<?php } else if(is_year()) { ?>
						<?php _e('Archive:','playne'); ?> <?php echo get_the_date('Y'); ?>
					<?php } else if(is_404()) { ?>
					<div class="error-container">
						<div class="error-container-inner">
						<p class="lead clearfix fade-it2 fadeInSlower animated">
		        			<a href="javascript:history.back()"><?php _e('Go Back','playne'); ?></a>
		        		</p>
						<?php _e('404: Page Not Found!','playne'); ?>
						</div>
					</div>
					<?php } else if(is_category()) { ?>
						<!-- Get archive category -->
						<?php _e('Archive:','playne'); ?> <?php single_cat_title(); ?>
					<?php } else if(is_author()) { ?>
						<!-- Get author results -->
						<?php _e('Posts by:','playne'); ?> <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->display_name; ?>
					<?php } else if (is_single()) { ?>
						<!-- Get blog title -->
			 			<?php the_title(); ?>
			 		<?php } else if (is_page() && !is_home()) { ?>
			 			<!-- Get page title -->
			 			<?php the_title(); ?>
			 		<?php } ?>
			 	</h2>

			 	<?php if ( get_post_meta($post->ID, '_playne2_buttontextcustom2', true) or get_post_meta($post->ID, '_playne2_buttontextcustom', true)) { ?>
			 	<div class="button-area">
			 	<?php } ?>

				<?php if ( get_post_meta($post->ID, '_playne2_buttontextcustom', true)) { ?>
					<div class="first-button">
			 			<a class="main-button <?php if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value1") { ?>hvr-sweep-to-bottom<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value2") { ?>hvr-sweep-to-right<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value3") { ?>hvr-sweep-to-left<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value4") { ?>hvr-fade<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value5") { ?>hvr-bounce-to-bottom<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value6") { ?>hvr-bounce-to-top<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value7") { ?>hvr-bounce-to-left<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value8") { ?>hvr-bounce-to-right<?php } else { ?>hvr-sweep-to-top<?php } ?>" href="<?php global $post; $buttoncustomurl = get_post_meta( $post->ID, '_playne2_buttonurlcustom', true ); echo "$buttoncustomurl" ?>" ?>
			 				<?php if ( get_post_meta($post->ID, '_playne2_buttonicon', true)) { ?><i class="fa <?php global $post; $buttonicon = get_post_meta( $post->ID, '_playne2_buttonicon', true ); echo "$buttonicon" ?>"></i> <?php } ?><?php global $post; $buttoncustomtext = get_post_meta( $post->ID, '_playne2_buttontextcustom', true ); echo "$buttoncustomtext" ?>
			 			</a>
					</div>
			 	<?php } ?>

				<?php if ( get_post_meta($post->ID, '_playne2_buttontextcustom2', true)) { ?>
					<div class="second-button">
			 			<a class="main-button <?php if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value1") { ?>hvr-sweep-to-bottom<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value2") { ?>hvr-sweep-to-right<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value3") { ?>hvr-sweep-to-left<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value4") { ?>hvr-fade<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value5") { ?>hvr-bounce-to-bottom<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value6") { ?>hvr-bounce-to-top<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value7") { ?>hvr-bounce-to-left<?php } else if ( get_theme_mod('theme_customizer_headerbuttoneffect') == "value8") { ?>hvr-bounce-to-right<?php } else { ?>hvr-sweep-to-top<?php } ?>" href="<?php global $post; $buttoncustomurl2 = get_post_meta( $post->ID, '_playne2_buttonurlcustom2', true ); echo "$buttoncustomurl2" ?>" ?>
			 				<?php if ( get_post_meta($post->ID, '_playne2_buttonicon2', true)) { ?><i class="fa <?php global $post; $buttonicon2 = get_post_meta( $post->ID, '_playne2_buttonicon2', true ); echo "$buttonicon2" ?>"></i> <?php } ?><?php global $post; $buttoncustomtext2 = get_post_meta( $post->ID, '_playne2_buttontextcustom2', true ); echo "$buttoncustomtext2" ?>
			 			</a>
					</div>
			 	<?php } ?>

			 	<?php if ( get_post_meta($post->ID, '_playne2_buttontextcustom2', true) or get_post_meta($post->ID, '_playne2_buttontextcustom', true)) { ?>
			 	</div>
			 	<?php } ?>


			 	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Widgets') ) : else : ?>		
				<?php endif; ?>
				<?php if (is_front_page()) { ?>
					<?php dynamic_sidebar('header-one'); ?>
				<?php } ?>

			 	<?php if ( get_theme_mod('theme_customizer_headerbutton') or get_theme_mod('theme_customizer_headerbutton2') ) { ?>
			 		</div>
			 	<?php } ?>

		      	<?php if(is_page_template( 'homepage.php' ) && get_post_meta($post->ID, '_playne2_showcasevideo', true)) { ?>
		      	<?php if (get_post_meta($post->ID, '_playne2_showcasevideo', true)) { ?><?php global $post; $showcase = get_post_meta( $post->ID, '_playne2_showcaseimage', true ); ?><?php } ?>
		      	<div class="headervideo clearfix" id="move-showcase">
					<div class="video-container">
						<?php playne_video_display_showcase(); ?>
					</div>
				</div>    
				<?php } else if(is_page_template( 'homepage.php' ) && get_post_meta($post->ID, '_playne2_showcaseimage', true)) { ?>
		      	<?php if (get_post_meta($post->ID, '_playne2_showcaseimage', true)) { ?><?php global $post; $showcase = get_post_meta( $post->ID, '_playne2_showcaseimage', true ); ?><?php } ?>
		      	<div class="headerimage clearfix" id="move-showcase">
					<div class="img-container">
						<img src="<?php echo $showcase ?>" alt="" class="header-showcase" />
					</div>
				</div>    
				<?php } ?>

				<?php if(is_page_template( 'homepage.php' ) && get_post_meta($post->ID, '_playne2_showcaseimage', true =='') && get_post_meta($post->ID, '_playne2_showcasevideo', true =='')) { ?>
				<div class="down-arrow animated-longer fadeInDown"<?php if (wp_is_mobile()) { ?> id="mobile-device-down"<?php } ?>>
			 		<a href="#content-wrapper"><i class="fa fa-angle-down"></i></a>
			 	</div>
				<?php } ?>
    	</div>

	</section>

<div id="content-wrapper" class="clearfix">