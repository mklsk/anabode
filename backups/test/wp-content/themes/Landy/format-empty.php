<div class="entry-wrap">

	<div class="entry-content clearfix">

			<header class="post-header">	
				<!-- Get the post header -->
				<h2 class="entry-title">
					<?php _e('Nothing found','playne'); ?>
				</h2>
			
			</header>

		<div class="post-content">

			<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords or take a look at the most recent posts below.', 'playne' ); ?></p>
			<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'format' => 'html' ) ); ?>

		</div>

	</div>

</div>