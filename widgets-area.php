
<div class="my-widgets-area">
	<?php
		// Load footer widgets
		if ( is_active_sidebar( 'footer-widgets' ) ) {
			dynamic_sidebar( 'footer-widgets' );
		} else {
			echo '<div class="container"><p class="no-widget">';
			_e( 'There\'s no widget assigned. You can start assigning widgets to "Footer" widget area from the <a href="'. admin_url('/widgets.php') .'">Widgets</a> page.', 'asli_bejo' );
			echo '</p></div>';
		}
	?>
</div>