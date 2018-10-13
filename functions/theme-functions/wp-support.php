<?php
/**
* List of theme support functions
*/


// Check if the function exist
if ( function_exists( 'add_theme_support' ) ){

	// Add post thumbnail feature
	add_theme_support( 'post-thumbnails' );
	add_image_size('blog-image', 780, 440, true); // blog image
	add_image_size('small-thumb', 50, 50, true); // popular post image
	
	// Add WordPress navigation menus
	add_theme_support('nav-menus');
	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'asli_bejo' ),
	) );

	// Add WordPress post format
	add_theme_support( 'post-formats', array( 'status', 'video', 'gallery' ) ); 

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add custom background feature 
	add_theme_support( 'custom-background' );
}

// Theme Localization
load_theme_textdomain( 'asli_bejo', get_template_directory().'/lang' );
