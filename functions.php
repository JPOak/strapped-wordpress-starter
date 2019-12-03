<?php
/**
 * Strapped functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Strapped
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
require get_template_directory() . '/library/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/library/sidebars.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/library/enqueue-scripts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/library/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/customizer.php';

/**
 * Bootstrap pagination.
 */
require get_template_directory() . '/library/bootstrap-pagination.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/library/jetpack.php';
}

/**
 * Added boostrap navwalker https://github.com/twittem/wp-bootstrap-navwalker.
 */
// require_once get_template_directory() . '/library/class-wp-bootstrap-navwalker.php';
