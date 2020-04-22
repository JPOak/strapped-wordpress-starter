<?php 
/**
 *
 * @author Andrea Musso
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */

//  CONSIDER REPLACE ALL THE FILE AND USE KIRKI PLUGIN https://kirki.org

	// ========== VARIABLES ==========//

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


function foundry_customize_register( $wp_customize ) {

	global $txtcolors;

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

	
 }
 add_action( 'customize_register', 'foundry_customize_register' );


//  Add custom variables as css variable

function fd_root_variables(){
	global $txtcolors;
	$css_root = get_stylesheet_directory(  ).'/dist/styles/root.css';
	$handle = fopen($css_root, 'w') or die('Cannot open file:  '.$css_root);
	$data = '';
	
	$data .= ':root{'.PHP_EOL;
	foreach( $txtcolors as $txtcolor ) {
		$data .= '--'.$txtcolor["slug"].':'.get_theme_mod($txtcolor["slug"], $txtcolor["default"] ).';'.PHP_EOL;
	}
	$data .= '}';
	fwrite($handle, $data);
	fclose($handle);
}
add_action( 'customize_save_after', 'fd_root_variables');
add_action( 'init', 'fd_root_variables');
// TODO => SET THE STYLESHEET TO REWRITE ON REFRESHING THE CUSTOMISER IF POSSIBLE