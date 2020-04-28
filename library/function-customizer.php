<?php 
/**
 *
 * @author Andrea Musso
 * 
 *
 * @package foundry
 */



//  TODO CONSIDER REPLACE ALL THE FILE AND USE KIRKI FRAMEWORK PLUGIN https://kirki.org

	// ========== VARIABLES ==========//

	// COLOR
	// main color 
	$txtcolors[] = array(
		'slug'=>'main_color', 
		'default' => '#bada55',
		'label' => 'Main Color'
	);
	
	// text color 
	$txtcolors[] = array(
		'slug'=>'text_color', 
		'default' => '#666',
		'label' => 'Text Color'
	);
	
	// link color
	$txtcolors[] = array(
		'slug'=>'link_color', 
		'default' => '#008AB7',
		'label' => 'Link Color'
	);
	
	// link color ( hover, active )
	$txtcolors[] = array(
		'slug'=>'link_color_hover', 
		'default' => '#9e4059',
		'label' => 'Link Color (on hover)'
	);

	// FONT-SIZE
	$fontsize[] = array(
		'slug'=>'text-h1', 
		'default' => 36,
		'label' => 'Font size h1'
	);
	$fontsize[] = array(
		'slug'=>'text-h2', 
		'default' => 28,
		'label' => 'Font size h2'
	);
	$fontsize[] = array(
		'slug'=>'text-h3', 
		'default' => 21,
		'label' => 'Font size h3'
	);
	$fontsize[] = array(
		'slug'=>'text-h4', 
		'default' => 13,
		'label' => 'Font size h4'
	);
	$fontsize[] = array(
		'slug'=>'text-h5', 
		'default' => 18,
		'label' => 'Font size h5'
	);
	$fontsize[] = array(
		'slug'=>'text-h6', 
		'default' => 16,
		'label' => 'Font size h6'
	);
	$fontsize[] = array(
		'slug'=>'text-p', 
		'default' => 16,
		'label' => 'Font size p'
	);

	// SITE SETTING
	// social
	$social[] = array(
		'slug'=>'instagram', 
		'default' => '',
		'label' => 'Instagram URL'
	);

	$social[] = array(
		'slug'=>'facebook', 
		'default' => '',
		'label' => 'Facebook URL'
	);
	
	$social[] = array(
		'slug'=>'linkedin', 
		'default' => '',
		'label' => 'Linkedin URL'
	);


function foundry_customize_register( $wp_customize ) {

	global $txtcolors;
	global $fontsize;
	global $social;
	
	// COLOR 
	foreach( $txtcolors as $txtcolor ) {
		// color setting
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' => $txtcolor['default'],
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'refresh',
			)
		); 
		// color control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$txtcolor['slug'], 
				array('label' => $txtcolor['label'], 
				'section' => 'themecolor',
				'settings' => $txtcolor['slug'])
			)
		);
	}
	// color section
	$wp_customize->add_section( 'themecolor' , array(
		'description' => __( 'Those are the colors for the theme', 'foundry' ),
		'title' =>  'Color Scheme',
		'priority' => 21,
	) );

	// FONT SIZE
	foreach( $fontsize as $size ) {
		// font  setting
		$wp_customize->add_setting(
			$size['slug'], array(
				'default' => $size['default'],
				'type' => 'theme_mod',
				'sanitize_callback' => 'absint', //converts value to a non-negative integer
				'transport' => 'refresh',
			)
		); 
		// font  control
		$wp_customize->add_control( $size['slug'],
			array('label' => $size['label'], 
			'description' => 'enter value in px',
			'section' => 'fontsize',
			'type'=> 'number',
			'settings' => $size['slug'])
		);
	}
	// font section
	$wp_customize->add_section( 'fontsize' , array(
		'description' => __( 'Those are the font size for the theme', 'foundry' ),
		'title' =>  'Typography',
		'priority' => 21,
	) );
	
	// SOCIAL
	foreach( $social as $link ) {
		// social  setting
		$wp_customize->add_setting(
			$link['slug'], array(
				'default' => $link['default'],
				'type' => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw', //cleans URL from all invalid characters
				'transport' => 'refresh',
			)
		); 
		// social  control
		$wp_customize->add_control( $link['slug'],
			array('label' => $link['label'], 
			'section' => 'social',
			'type'=> 'url',
			'settings' => $link['slug'])
		);
	}
	// social  setting -out loop
	$wp_customize->add_setting(
		'display-social', array(
			'default' => 0,
			'type' => 'theme_mod',
			'transport' => 'refresh',
		)
	); 
	// social  control -out loop
	$wp_customize->add_control( 'display-social',
		array('label' => 'Display in main navigation', 
		'section' => 'social',
		'type'=> 'checkbox',
		'settings' => 'display-social',
		)
	);
	// social section
	$wp_customize->add_section( 'social' , array(
		'description' => __( 'Those are the setting for social channel', 'foundry' ),
		'title' =>  'Social',
		'priority' => 21,
	) );

	// FOOTER 

	// footer setting 
	$wp_customize->add_setting(
		'background', array(
			'default' => '#ffffff',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'refresh',
		)
	); 
	
	// footer control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background', 
			array('label' => 'Background color', 
			'section' => 'footer',
			'settings' => 'background')
		)
	);
	
	// footer section
	$wp_customize->add_section( 'footer' , array(
		'description' => __( 'Change Footer setting. See widget for content modification.', 'foundry' ),
		'title' =>  'Footer',
		'priority' => 161,
	) );	
	
 }
 add_action( 'customize_register', 'foundry_customize_register' );


//  Add custom variables as css variable
function fd_root_variables(){
	global $txtcolors;
	global $fontsize;
	$css_root = get_stylesheet_directory(  ).'/dist/styles/root.css';
	$handle = fopen($css_root, 'w') or die('Cannot open file:  '.$css_root);
	$data = '';
	
	$data .= ':root{'.PHP_EOL;
	foreach( $txtcolors as $txtcolor ) {
		$data .= '--'.$txtcolor["slug"].':'.get_theme_mod($txtcolor["slug"], $txtcolor["default"] ).';'.PHP_EOL;
	}
	foreach( $fontsize as $size ) {
		$data .= '--'.$size["slug"].':'.get_theme_mod($size["slug"], $size["default"] ).'px;'.PHP_EOL;
	}
	$data .= '--footer-color : '.get_theme_mod('background', '#ffffff').';'.PHP_EOL;
	$data .= '}';
	fwrite($handle, $data);
	fclose($handle);
}
add_action( 'customize_save_after', 'fd_root_variables');
add_action( 'init', 'fd_root_variables');
// TODO => SET THE STYLESHEET TO REWRITE ON REFRESHING THE CUSTOMISER IF POSSIBLE