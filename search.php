		<?php 
			get_header();

			if ( is_archive() || is_search() ) :
				echo '<header class="my-archive-header">';
				echo '<div class="my-archive-title">'. blog_aink_archive_title() .'</div>';
				echo '</header>';
			endif;

			// The loop
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'content', get_post_format() ); // get content template
				}
				// Pagination
				get_template_part( 'includes/pagination' );
			} else {
				_e( 'Sorry, no result found.', 'asli_bejo' );
			}

			// Widgets area
			get_template_part( 'widgets-area' );
		?>
	</section> <!-- END: id Main -->
<?php get_footer(); ?>