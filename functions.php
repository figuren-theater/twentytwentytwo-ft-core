<?php
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
