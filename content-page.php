
<!-- START: article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post hentry' ); ?>>

		<?php
		// Get featured image
		if ( has_post_thumbnail() ) {
			echo '<div class="thumbnail">';
			the_post_thumbnail( 'blog-image' );
			echo '</div>';
		} else {
			echo '<div class="thumbnail">';
			echo '<img src="http://placehold.it/780x440/f5f5f5/666666/&text=&nbsp;" alt="" />';
			echo '</div>';
		}
		?>

		<header class="major">
			<h1 class="post-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content"><?php the_content(); ?></div>

		<?php 
			if ( is_single() ) :
			get_template_part( 'includes/share-buttons' ); // display share buttons
			endif; 
		?>

	</article>
<!-- END: article -->