<?php
/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function hody_firemonk_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles', 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css', 'style-editor.css' );

	}

include_once  __DIR__ . '/inc/block-patterns.php'; 
wp_enqueue_style('main-styleAllScreen', get_template_directory_uri() . '/styleAllScreen.css', array(), filemtime(get_template_directory() . '/styleAllScreen.css'), false);
wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);

// Enqueuing Local Font Awesome icons
 
function hody_firemonk_include_font_awesome_styles(){
 wp_enqueue_style( 'load-fa', get_template_directory_uri().'/assets/fonts/fontawesome-611-web/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'hody_firemonk_include_font_awesome_styles');
 
// Ends Here

// Google fonts (local)
function hody_firemonk_include_local_fonts() { 
 
    wp_enqueue_style( 'localfonts', get_template_directory_uri().'/assets/fonts/google/google-fonts.css' ); 
 
}
add_action( 'wp_enqueue_scripts', 'hody_firemonk_include_local_fonts');
// End Here

// Enqueue Frontend style in editor

function hody_firemonk_stylesheet() {
    wp_enqueue_style( 'hody_firemonk_theme_block_patterns_front_back',  get_template_directory_uri() . '/style.css'  );
}
add_action( 'enqueue_block_assets', 'hody_firemonk_stylesheet' );
/*
*add_action('init', 'enqueue_block_assets');
*function enqueue_block_assets() {
*	//register style for both front & backend
*	wp_register_style('hody_firemonk_theme_block_patterns_front_back', get_template_directory_uri() . '/style.css', array('wp-editor'), null );
*}
*/

