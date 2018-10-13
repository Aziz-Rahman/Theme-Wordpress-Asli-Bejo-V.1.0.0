
		<!-- START: Footer -->
		<footer id="footer">
			<!-- START: Social media -->
			<nav id="social-menu">
				<?php get_template_part( 'includes/social-media' ); ?>
			</nav>
			<!-- START: Social media -->
			<ul class="copyright">
				<li>
					<?php printf( __('&copy; Copyright %1$s %2$s.', 'asli_bejo' ), date_i18n('Y', strtotime( get_the_date() ) ), '<a href="'.get_home_url().'">' . get_bloginfo('name') . '</a>' ); ?>
				</li><br>
				<li>
					<?php printf( __( 'WordPress Themes by %1$s.', 'asli_bejo' ), '<a href="http://aziz-rahman.com" target="_blank">'. __( 'Aziz Rahman Aji', 'asli_bejo' ) .'</a>' ); ?>
				</li>
			</ul>
		</footer>
		<!-- END: Footer -->

		<?php wp_footer(); ?>

	</body>
</html>