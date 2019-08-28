<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Strapped
 *
 */

/**
* Check to see if rev-manifest exists for CSS and JS static asset revisioning
* https://github.com/sindresorhus/gulp-rev/blob/master/integration.md
*/

if ( ! function_exists( 'strapped_asset_path' ) ) :
	function strapped_asset_path( $filename ) {

		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;

function strapped_scripts() {
	wp_register_style( 'strapped-styles', get_template_directory_uri() . '/dist/styles/' . strapped_asset_path( 'main.css' ), array(), '1.0', 'all' );
	wp_enqueue_style( 'strapped-styles' );

	wp_register_script( 'strapped-js', get_template_directory_uri() . '/dist/scripts/' . strapped_asset_path( 'main.js' ), array(), '1.0', true );
	wp_enqueue_script( 'strapped-js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strapped_scripts' );
