	<?php 
		get_header();

		 if ( have_posts() ): 
		 	while ( have_posts() ): 
		 		the_post();
				get_template_part( 'content', get_post_format() );// get content template
				comments_template( '', true ); // display comments
				blog_aink_set_post_views( get_the_ID() ); // get post view count
			endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;
		
		// Widgets area
		get_template_part( 'widgets-area' );
    ?>
</section> <!-- END: id Main -->
<?php get_footer(); ?>