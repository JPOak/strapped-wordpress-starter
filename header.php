<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strapped
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'strapped' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="container">
			<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light">
				<div class="site-branding navbar-brand">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$strapped_description = get_bloginfo( 'description', 'display' );
				if ( $strapped_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $strapped_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
				</div><!-- .site-branding -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#strapped-navbar-collapse" aria-controls="strapped-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse flex-row-reverse',
							'container_id'      => 'strapped-navbar-collapse',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						)
					);
					?>



			</nav><!-- #site-navigation -->
			</div><!-- #container -->
	</header><!-- #masthead -->


	<div id="content" class="site-content">
