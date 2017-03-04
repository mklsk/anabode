<?php
/*
Template Name: Page without sidebar
*/
?>  

<?php get_header(); ?>
<div id="content" class="clearfix">

				<div class="content-posts clearfix">

				
				
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<article <?php post_class('post clearfix'); ?>>
							<?php
								if(!get_post_format()) {
								   get_template_part('format', 'standard');
								} else {
								   get_template_part('format', get_post_format());
								};
							?>
							</article>
						<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part('format', 'empty'); ?>
						<?php endif; ?>
				
						<?php if( is_single () && $post->comment_status == 'open') { ?>
						<div class="comments">
							<?php comments_template(); ?>
						</div>
						<?php } ?>


				</div>

						<?php if( playne_page_has_nav() && is_home() ) : ?>
							<!-- If there is pagination display nav area -->
							<div id="nav-footer" class="single-nav-footer">
								<div class="archive-title-wrapper clearfix">
									<?php if(!$link = get_previous_posts_link()) { ?>
									<?php } else { ?>
									<div class="post-nav-left button normal clearfix">
									<?php previous_posts_link(__('Newer', 'playne')) ?>
									</div>
									<?php } ?>
				
									<?php if(!$link = get_next_posts_link()) { ?>
									<?php } else { ?>
									<div class="post-nav-right button normal clearfix">
									<?php next_posts_link(__('Older', 'playne')) ?>
									</div>
									<?php } ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if(is_single()) { ?>
							<!-- Footer navigation -->
							<div id="nav-footer" class="single-nav-footer">
								<div class="archive-title-wrapper clearfix">
									<?php if(!$link = get_previous_post_link()) { ?>
									<?php } else { ?>
									<div class="post-nav-left button normal clearfix">
									<?php previous_post_link('%link', 'Next post'); ?>
									</div>
									<?php } ?>
									<?php if(!$link = get_next_post_link()) { ?>
									<?php } else { ?>
									<div class="post-nav-right button normal clearfix">
									<?php next_post_link('%link', 'Previous post'); ?>
									</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>

</div>

<?php get_footer(); ?>