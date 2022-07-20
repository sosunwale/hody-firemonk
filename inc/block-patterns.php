<?php
/**
 * Fire Monk: Block Patterns
 *
 * @since Fire Monk 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Fire Monk 1.0
 *
 * @return void
 */
add_action( 'init', 'hody_firemonk_register_block_patterns' );
function hody_firemonk_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'hody-firemonk' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'hody-firemonk' ) ),
		'header'   => array( 'label' => __( 'Headers', 'hody-firemonk' ) ),
		'sections' => array( 'label' => __( 'Sections', 'hody-firemonk' ) ),
		'query'    => array( 'label' => __( 'Query', 'hody-firemonk' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'hody-firemonk' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Fire Monk 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'hody_firemonk_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'section-group',
		'advanced-title',
		'inner-content-group',
		'cta-streaming-icons',
		'cta-new',
		'welcome-hero',
		'full-page-contact',
		'sample-page',
		//'query-irregular-grid',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Fire Monk 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'hody_firemonk_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'hody-firemonk/' . $block_pattern,
			require $pattern_file
		);
	}
}


							