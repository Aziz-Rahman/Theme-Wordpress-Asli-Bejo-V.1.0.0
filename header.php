<?php
/**
 * The template for displaying header part.
 *
 * @package WordPress
 * @subpackage Asli_Bejo
 * @since Asli_Bejo 1.0.0
 */

 global $bejo_option; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo ( $bejo_option['favicon']['url'] ? esc_url( $bejo_option['favicon']['url'] ) : get_template_directory_uri().'/images/favicon.png' ); ?>" />

<?php wp_head(); ?>
</head>
<body id="top" <?php body_class( 'homepage' ); ?>>

<!-- Header -->
	<header id="header">
		<?php if ( $bejo_option['logo_type'] == '1' ) : ?>
           	<?php if ( is_home() ): ?>
                <h1 class="site-title"><a href="<?php echo get_home_url(); ?>"><?php echo bloginfo( 'name' ); ?></a></h1>
                <div class="description"><?php echo bloginfo( 'description' ); ?></div>
            <?php else : ?>
                <div class="site-title"><a href="<?php echo get_home_url(); ?>"><?php echo bloginfo( 'name' ); ?></a></div>
                <div class="description"><?php echo bloginfo( 'description' ); ?></div>
            <?php endif; ?>
        <?php elseif ( $bejo_option['logo_type'] == '2' ) : ?>
			 <a href="<?php echo home_url('/'); ?>" class="image avatar"><img src="<?php echo ( $bejo_option['logo_image'] ? esc_url( $bejo_option['logo_image']['url'] ) : get_template_directory_uri().'/images/logo.jpg' ); ?>" alt="<?php get_bloginfo('name'); ?>" /></a>
			<div class="description"><?php echo bloginfo('description'); ?></div>
        <?php else : ?>
            <a href="<?php echo home_url('/'); ?>"  class="image avatar"><img src="<?php echo ( $bejo_option['your_avatar'] ? esc_url( $bejo_option['your_avatar']['url'] ) : get_template_directory_uri().'/images/logo.jpg' ); ?>" alt="<?php get_bloginfo('name'); ?>" /></a>
            <div class="author-name"><?php echo wpautop( esc_attr( $bejo_option['author_name'] ) ); ?></div>
            <div class="description"><?php echo wpautop( esc_attr( $bejo_option['author_description'] ) ); ?></div>
        <?php endif; ?>

        <!-- Start : Search Form Widgets -->
        <?php 
            if ( $bejo_option['feature_search'] == '1' ) :
               get_template_part( 'searchform' ); // include search form
            endif;
        ?>
        <!-- End : Search Form Widgets -->
	</header>

    <!-- START: Main -->
    <section id="main">

    <!-- START: Navigation -->
     <div class="navbar-aink">
        <?php
        // Display Main menu top
        if ( has_nav_menu( 'main-menu' ) ) {
            echo '<nav id="nav-gue" class="my-menu site-navigation">';
            wp_nav_menu( array ( 'theme_location' => 'main-menu', 'container' => null, 'menu_class' => 'main-menu', 'depth' => 2 ) );
            echo ' </nav>';
        }
        ?>
    </div>
    <!-- END: Navigation -->