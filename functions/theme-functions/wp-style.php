<?php
if ( ! function_exists( 'my_enqueue_scripts' ) ) {
	function my_enqueue_scripts() {
		global $pagenow;

		// Only load these scripts on frontend
		if( !is_admin() && $pagenow != 'wp-login.php' ) {

			wp_enqueue_script('jquery');

			if ( is_singular('post') ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Load all Javascript files
			wp_enqueue_script( 'skel', get_template_directory_uri() .'/js/skel.min.js', '', 'null', true );
			wp_enqueue_script( 'justifiedGallery', get_template_directory_uri() .'/js/jquery.justifiedGallery.min.js', '', '3.5.1', true );
			wp_enqueue_script( 'slicknav', get_template_directory_uri() .'/js/jquery.slicknav.min.js', '', '1.0.3', true );
			wp_enqueue_script( 'fitvids', get_template_directory_uri() .'/js/jquery.fitvids.js', '', '1.1', true );
			wp_enqueue_script( 'init', get_template_directory_uri() .'/js/init.js', '', null, true );


			// Load all CSS files
			wp_enqueue_style( 'reset', get_stylesheet_directory_uri() .'/css/font-awesome.min.css', array(), false, 'all' );
			wp_enqueue_style( 'justifiedGallery', get_template_directory_uri() .'/css/justifiedGallery.min.css', array(), false, 'all' );
			wp_enqueue_style( 'slicknav', get_template_directory_uri() .'/css/slicknav.min.css', array(), false, 'all' );
			wp_enqueue_style( 'skel', get_stylesheet_directory_uri() .'/css/skel.css', array(), false, 'all' );
			wp_enqueue_style( 'style-xlarge', get_stylesheet_directory_uri() .'/css/style-xlarge.css', array(), false, 'all' );
			wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css', array(), false, 'all' );	
			//Css media queries
			wp_enqueue_style( 'style-xlarge', get_stylesheet_directory_uri() .'/css/style-xlarge.css', array(), false, 'all and (max-width: 1800px)' );
			wp_enqueue_style( 'style-large', get_stylesheet_directory_uri() .'/css/style-large.css', array(), false, 'all and (max-width: 1280px)' );
			wp_enqueue_style( 'style-medium', get_stylesheet_directory_uri() .'/css/style-medium.css', array(), false, 'all and (max-width: 980px)' );
			wp_enqueue_style( 'style-small', get_stylesheet_directory_uri() .'/css/style-small.css', array(), false, 'all and (max-width: 736px)' );
			wp_enqueue_style( 'style-xsmall', get_stylesheet_directory_uri() .'/css/style-xsmall.css', array(), false, 'all and (max-width: 480px)' );

		}
	}
}
add_action( 'wp_print_styles', 'my_enqueue_scripts' );
