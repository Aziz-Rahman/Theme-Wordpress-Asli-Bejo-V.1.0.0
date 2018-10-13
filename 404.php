
	<?php get_header(); ?>

		<!-- START: article -->
		<article <?php post_class( 'blog-post hentry' ); ?>>				
			<header class="major">
				<h1 class="post-title"><?php _e( 'Page Not Found !', 'asli_bejo' ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'The page you are looking for is not available. The page may have been deleted or unpublished.', 'asli_bejo' ); ?></p>
			</div>
		</article>
		<!-- END: article -->

	</section> <!-- END: id Main -->
<?php get_footer(); ?>