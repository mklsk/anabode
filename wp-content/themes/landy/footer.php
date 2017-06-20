<!-- Footer -->
<section id="footer">

	<?php if( get_theme_mod( 'theme_customizer_general7' ) == '1' or is_front_page()) { ?>
	<div class="row scrollme clearfix <?php if ( get_theme_mod('theme_customizer_footerbuttoncorners') == "value1") { ?> square<?php } ?><?php if ( get_theme_mod('theme_customizer_footerbuttoncorners') == "value2") { ?> semi-rounded<?php } ?>">

  			<div class="columns clearfix<?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?>"<?php } else { ?> wow fadeInUp animated"<?php } ?><?php if( get_theme_mod( 'theme_customizer_general3' ) == '1') { ?> data-wow-duration="1.5s"<?php } ?>>

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

        			<p class="lead fade-it2">
        			<?php if ( get_theme_mod('theme_customizer_footertextlinetwo') ) { ?>
        				<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextlinetwo', '' )."");?>
	 				<?php } ?>
	 				</p>

      				<h2 class="fade-it2">
        			<?php if ( get_theme_mod('theme_customizer_footertextlineone') ) { ?>
        				<?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextlineone', '' )."");?>
	 				<?php } ?>
	 				</h2>

			 	<?php if ( get_theme_mod('theme_customizer_headerbutton') or get_theme_mod('theme_customizer_headerbutton2') ) { ?>
			 		<div class="button-area">
			 	<?php } ?>

				 	<?php if ( get_theme_mod('theme_customizer_footertextbutton1') ) { ?>
				 	<div class="first-button">
				 		<a class="main-button <?php if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value1") { ?>hvr-sweep-to-bottom<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value2") { ?>hvr-sweep-to-right<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value3") { ?>hvr-sweep-to-left<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value4") { ?>hvr-fade<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value5") { ?>hvr-bounce-to-bottom<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value6") { ?>hvr-bounce-to-top<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value7") { ?>hvr-bounce-to-left<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect') == "value8") { ?>hvr-bounce-to-right<?php } else { ?>hvr-sweep-to-top<?php } ?>" href="<?php if ( get_theme_mod('theme_customizer_footertextbutton1url') ) { ?><?php echo esc_url('' .get_theme_mod( 'theme_customizer_footertextbutton1url', '' )."");?><?php } ?>">
				 			<?php if (get_theme_mod('theme_customizer_footerbuttoniconcustom')) { ?><i class="fa <?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footerbuttoniconcustom', '' )."");?>"></i><?php } else if( get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value0') { ?><?php } else if( get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value1') { ?><i class="fa fa-apple"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value2') { ?><i class="fa fa-android"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value3') { ?><i class="fa fa-heart"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value4') { ?><i class="fa fa-bolt"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value5') { ?><i class="fa fa-check"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value6') { ?><i class="fa fa-cloud"></i><?php } else if( get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value7') { ?><i class="fa fa-credit-card"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value8') { ?><i class="fa fa-comment"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value9') { ?><i class="fa fa-camera"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value10') { ?><i class="fa fa-gamepad"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value11') { ?><i class="fa fa-inbox"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value12') { ?><i class="fa fa-music"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value13') { ?><i class="fa fa-mobile-phone"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value14') { ?><i class="fa fa-thumbs-up"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value15') { ?><i class="fa fa-users"></i><?php } ?><?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextbutton1', '' )."");?>
				 		</a>
				 	</div>
				 	<?php } ?>

				 	<?php if ( get_theme_mod('theme_customizer_footertextbutton2') ) { ?>
				 	<div class="second-button">
				 		<a class="main-button <?php if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value1") { ?>hvr-sweep-to-bottom<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value2") { ?>hvr-sweep-to-right<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value3") { ?>hvr-sweep-to-left<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value4") { ?>hvr-fade<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value5") { ?>hvr-bounce-to-bottom<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value6") { ?>hvr-bounce-to-top<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value7") { ?>hvr-bounce-to-left<?php } else if ( get_theme_mod('theme_customizer_footerbuttoneffect2') == "value8") { ?>hvr-bounce-to-right<?php } else { ?>hvr-sweep-to-top<?php } ?>" href="<?php if ( get_theme_mod('theme_customizer_footertextbutton2url') ) { ?><?php echo esc_url('' .get_theme_mod( 'theme_customizer_footertextbutton2url', '' )."");?><?php } ?>">
				 			<?php if (get_theme_mod('theme_customizer_footerbuttoniconcustom2')) { ?><i class="fa <?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footerbuttoniconcustom2', '' )."");?>"></i><?php } else if( get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value0') { ?><?php } else if( get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value1') { ?><i class="fa fa-apple"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value2') { ?><i class="fa fa-android"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value3') { ?><i class="fa fa-heart"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist' ) == 'value4') { ?><i class="fa fa-bolt"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value5') { ?><i class="fa fa-check"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value6') { ?><i class="fa fa-cloud"></i><?php } else if( get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value7') { ?><i class="fa fa-credit-card"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value8') { ?><i class="fa fa-comment"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value9') { ?><i class="fa fa-camera"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value10') { ?><i class="fa fa-gamepad"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value11') { ?><i class="fa fa-inbox"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value12') { ?><i class="fa fa-music"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value13') { ?><i class="fa fa-mobile-phone"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value14') { ?><i class="fa fa-thumbs-up"></i><?php } else if (get_theme_mod( 'theme_customizer_footerbuttoniconlist2' ) == 'value15') { ?><i class="fa fa-users"></i><?php } ?><?php echo esc_textarea('' .get_theme_mod( 'theme_customizer_footertextbutton2', '' )."");?>
				 		</a>
				 	</div>
				 	<?php } ?>

			 	<?php if ( get_theme_mod('theme_customizer_headerbutton') or get_theme_mod('theme_customizer_headerbutton2') ) { ?>
			 		</div>
			 	<?php } ?>

				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets') ) : else : ?>		
				<?php endif; ?>
				<?php dynamic_sidebar('footer-subscribe'); ?>
				
			</div>

	</div>
	<?php } ?>
			
	<div class="footer-bottom">
		<div class="row clearfix">

			<div class="main-menu-footer clearfix">

				<div class="columns">
					<div class="footer_column">
						<h3>Find out more</h3>
						<a href="">Contact Us</a>
						<a href="">Bespoke Solutions</a>
						<a href="">Commercial & Enterprise</a>
					</div>
					<div class="footer_column middle">
						<h3>Community</h3>
						<a href="">Support</a>
						<a href="">Tutorials</a>
						<a href="">Tips</a>
					</div>
					<div class="footer_column">
						<h3>Social</h3>
						<div class="footer_icons">
					
							<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>	
							<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							<a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>	
				
						</div>
					</div>
				</div>

				<div class="copyrights">Copyright &copy;  <span><?php $the_year = date("Y"); echo esc_js($the_year); ?></span> Anabode</div>

			</div>
					
		</div>
	</div>

</section>

</div>
</div>
<!-- Load the scripts -->
<?php wp_footer(); ?>
</body>
</html>