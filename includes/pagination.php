<?php

global $wp_query; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<!-- Start: Pagination -->
	<div class="mypagination">
		<?php
		if ( function_exists( 'wp_pagenavi' ) ) {
			wp_pagenavi();
		} else {
			if ( $wp_query->max_num_pages > 1 ) { ?>
			<div class="newer_post"><?php previous_posts_link( '&laquo; ' . __( 'Newer Posts', 'asli_bejo' ) ) .'';?> </div>
			<div class="older_post"><?php next_posts_link( __( 'Older Posts', 'asli_bejo' ) . ' &raquo;' ); ?></div>
		<?php } } ?>
	</div>
	<!-- End: Pagination -->
<?php endif; ?>
<div class="clearfix"></div>