	<?php 
		get_header();

		 if ( have_posts() ): 
		 	while ( have_posts() ): 
		 		the_post();
				get_template_part( 'content', 'page' ); // get content page
			endwhile;
		else:
			get_template_part( 'content', 'none' );
		endif;
		
		// Widgets area
		get_template_part( 'widgets-area' );
    ?>
</section> <!-- END: id Main -->
<?php get_footer(); ?>