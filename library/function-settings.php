<?php
/**
 * Setup
 * @author Andrea Musso
 *
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

 /*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
    1.1 enqueue scripts/styles
    1.2 theme support

  2.0 GENERAL SETTINGS
    2.1 wphead cleanup
    2.2 hide core-updates for non-admins
    2.3 reset inline image dimensions (for css-scaling of images)
    2.4 disable backend-theme-editor
	2.5 Add Page Slug to Body
	2.6 Login page customization
==================================================================================*/


if ( ! function_exists( 'foundry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	/*==================================================================================
	1.0 THEME SETTINGS
	==================================================================================*/


	/* 1.1 ENQUEUE SCRIPTS/STYLES
	/––––––––––––––––---––––––––*/
	if ( ! function_exists( 'foundry_asset_path' ) ) :
		function foundry_asset_path( $filename ) {
	
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
	function foundry_scripts() {
		
		// Deregister guttenberg style
		global $load_default_block_styles;
		if (!$load_default_block_styles) :
		wp_dequeue_style( 'wp-block-library' );
		endif;

		// STYLE

		wp_register_style( 'root-styles', get_template_directory_uri() . '/dist/styles/root.css', array(), '1.0', 'all'  );
	
		wp_register_style( 'foundry-styles', get_template_directory_uri() . '/dist/styles/' . foundry_asset_path( 'main.css' ), array('root-styles'), '1.0', 'all' );
		wp_enqueue_style( 'foundry-styles' );
		
		// SCRIPT
		wp_dequeue_script( 'jquery' );
		wp_deregister_script( 'jquery' );
		wp_register_script( 'foundry-js', get_template_directory_uri() . '/dist/scripts/' . foundry_asset_path( 'main.js' ), array(), '1.0', true );
		wp_enqueue_script( 'foundry-js' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'foundry_scripts' );

	/* 1.2 THEME SUPPORT
	/––––––––––––––––––––––––*/
	function foundry_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on foundry, use a find and replace
			* to change 'foundry' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'foundry', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/* Gutenberg -> enable wide images
		/––––––––––––––––––––––––*/
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'foundry_setup' );



/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/

/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function wpseed_wphead_cleanup () {
	// remove the generator meta tag
	remove_action('wp_head', 'wp_generator');
	// remove wlwmanifest link
	remove_action('wp_head', 'wlwmanifest_link');
	// remove RSD API connection
	remove_action('wp_head', 'rsd_link');
	// remove wp shortlink support
	remove_action('wp_head', 'wp_shortlink_wp_head');
	// remove next/previous links (this is not affecting blog-posts)
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	// remove generator name from RSS
	add_filter('the_generator', '__return_false');
	// disable emoji support
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	// disable automatic feeds
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links', 2);
	// remove rest API link
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
	// remove oEmbed link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action('wp_head', 'wp_oembed_add_host_js');
  }
  add_action('after_setup_theme', 'wpseed_wphead_cleanup');

  /* 2.2 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
	if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );

/* 2.3 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.4 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


/* 2.5 ADD PAGE SLUG TO BODY CLASS
/–––––––––––––––––––––––––––––––––*/
// Add Page Slug to Body Class to make router.js work
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	  $classes[] =  $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' ); 



/* 2.6 LOGIN PAGE
/–––––––––––––––––––––––––––––––––*/
// Customize Logo URL.
add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url() {
    return site_url( '/' );
}

// Style login page
function we_login_logo() { 
	GLOBAL $gFontUrl;
	GLOBAL $fontFamily;
	GLOBAL $customLogo;
	GLOBAL $mainColor;
    ?>
	<style type="text/css">
	<?php if($gFontUrl): ?>
		@import url('<?php echo $gFontUrl ?>');
	<?php endif; ?>

		body{
		<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
		<?php endif; ?>
		}
	
        #login h1 a, .login h1 a {
            background-image: url( <?php echo $customLogo ?>);
			background-repeat: no-repeat;
			background-size: 70px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
        }
        body.login div#login form#loginform p.submit input#wp-submit {
			background-color: transparent;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
			color: black;
			text-shadow: none;
			box-shadow: none;
			border: 1px solid black;
			border-radius: 1px;
		}
		body.login div#login .message{
			border: 2px solid <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform p.submit input#wp-submit:hover{
			background-color: #f5f5f5;
		}
        body.login div#login p#nav a:hover {
            color: <?php echo $mainColor ?>;
        }
        body.login div#login p#backtoblog a:hover {
            color: <?php echo $mainColor ?>;
        }
        body.login div#login form#loginform {
			border-radius: 5px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
		}
		body.login div#login form#loginform input[type="text"]:focus, body.login div#login form#loginform input[type="password"]:focus {
			border-color: <?php echo $mainColor ?>;
			box-shadow: 0 0 0 1px <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform div.wp-pwd button.button .dashicons{
			color: <?php echo $mainColor ?>;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'we_login_logo' );