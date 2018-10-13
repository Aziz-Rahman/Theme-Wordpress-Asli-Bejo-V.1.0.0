
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
			<?php if ( ! is_single() ) : ?>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php else : ?>
				<h1 class="post-title"><?php the_title(); ?></h1>
			<?php endif; ?>
			<!-- START: POST META -->
			<div class="entry-meta">
				<?php blog_aink_post_meta(); ?>
				<span><i class="fa fa-eye"></i>&nbsp;<?php printf( blog_aink_get_post_views( get_the_ID() ) ); ?></span>
			</div>
			<!-- END: POST META -->
		</header>

		<div class="entry-content">
			<?php
				if ( is_single() ) {
					the_content();
					echo "<div class='post-tags'>";
					the_tags('<span><i class="fa fa-tags"></i> <b>Tags : </b></span>', ', &nbsp; ', '');
					echo "</div>";
				} else {
					the_excerpt();
				}
			?>
		</div>

		<?php if ( ! is_single () ) : ?>
			<ul class="actions">
				<li><a href="<?php the_permalink(); ?>" class="button">Learn More</a></li>
			</ul>
		<?php endif ; ?>

		<?php 
			if ( is_single() ) :
			get_template_part( 'includes/share-buttons' ); // display share buttons
			endif; 
		?>

	</article>
<!-- END: article -->