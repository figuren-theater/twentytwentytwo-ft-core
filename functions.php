<?php
/*
add_action( 'wp_enqueue_scripts', 'ft_enqueue_parent_styles' );
function ft_enqueue_parent_styles() {
	$theme = wp_get_theme();
	// $parenthandle = 'miniblock-ooak'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$parenthandle = $theme->__get('template'); // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
		array(),  // if the parent theme code has a dependency, copy it to here
		$theme->parent()->get('Version')
	);
#    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
#        array( $parenthandle ),
#        $theme->get('Version') // this only works if you have Version in the style header
#    );
}


/**
 * Add Parent styles to the editor
 *
 * @since 1.0.0
 *
 * @return void
function cloned_miniblock_ooak_setup() {
	add_theme_support( 'wp-block-styles' );
	add_editor_style( '../miniblock-ooak/style.css' ); // cloned from parent, b
}
add_action( 'after_setup_theme', 'cloned_miniblock_ooak_setup' );

 */


/**
 * @TODO
 * clean up
 *
 * This is the same @ 3 places
 *  - twentytwentytwo-ft
 *  - twentytwentytwo-ft-core
 *  - twentytwentytwo-ft__katharina-muschiol
 *
 * @package project_name
 * @version 2022.07.22
 * @author  Carsten Bach
 *
 */
function parent_theme_enqueue_styles() {


	
	wp_deregister_style( 'twentytwentytwo-style' );

	// DISABLED because file doesn't exist
	// and should not be copied every time the theme is updated
	// 
	// $file_min = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min';
	// $style_css = '/style' . $file_min.'.css';
	$style_css = '/style.css';

	//
	$template_css_url = get_template_directory_uri() . $style_css;
	$template_css_dir = get_template_directory() . $style_css;
	
	//
	$version_prevent_cache = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? time() : filemtime( $template_css_dir );
	

	// register template styles
	wp_register_style(
		'twentytwentytwo-style',
		$template_css_url,
		array('wp-block-library'),
		$version_prevent_cache,
		'all'
	);

	//
	wp_enqueue_style( 'twentytwentytwo-style' );


#    $style_css_url = get_stylesheet_directory_uri() . $style_css;
#    $style_css_dir = get_stylesheet_directory() . $style_css;
#    // register parent styles
#    wp_register_style(
#        'twentytwentytwo-child-style',
#        $style_css_url,
#        array( 'twentytwentytwo-style' ),
#        filemtime( $style_css_dir ),
#        'all'
#    );

}
// DISABLED because file doesn't exist
// and should not be copied every time the theme is updated
// add_action('wp_enqueue_scripts', 'parent_theme_enqueue_styles', 11 );





function ft_footer_styles() {

#    wp_enqueue_style( 'wp-block-library' );


#    wp_enqueue_style( 'twentytwentytwo-style' );
	// Add output of Customizer settings as inline style.
 #   wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_c u s t o m i z e r_css( 'front-end' ) );

#    wp_enqueue_style( 'twentytwenty-child-style' );
};
#add_action( 'wp_footer', 'ft_footer_styles',1 );


/**
 * Register Custom Block Styles
 */
if ( function_exists( 'register_block_style' ) ) {
	function ft_core_block_styles_register() {
		/**
		 * Register stylesheet
		 */
		#wp_register_style(
		#	'block-styles-stylesheet',
		#	plugins_url( 'style.css', __FILE__ ),
		#	array(),
		#	'1.1'
		#);

		/**
		 * Register block style: Rotate
		 */
		register_block_style(
			'core/image',
			array(
				'name'         => 'multiply',
				'label'        => 'Multiply',
				// 'style_handle' => 'block-styles-stylesheet',
				'inline_style' => '.wp-block-image.is-style-multiply img { mix-blend-mode: multiply; }',
			)
		);

	}

	add_action( 'init', 'ft_core_block_styles_register' );
}
