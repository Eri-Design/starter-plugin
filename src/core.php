<?php
/**
 * Core setup, site hooks and filters.
 *
 * @package EriScaffold\Core
 */

namespace EriScaffold\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );

    add_action( 'admin_enqueue_scripts', $n( 'admin_scripts' ) );
    add_action( 'admin_enqueue_scripts', $n( 'admin_styles' ) );

	add_filter( 'script_loader_tag', $n( 'script_loader_tag' ), 10, 2 );

    add_action( 'enqueue_block_assets', $n( 'blocks_scripts' ) );
	add_action( 'enqueue_block_editor_assets', $n( 'blocks_editor_scripts' ) );

	add_filter( 'block_categories', $n( 'blocks_categories' ), 10, 2 );
}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {

	wp_enqueue_script(
		'eri-scaffold-frontend',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/js/frontend.js',
		[],
		ERI_SCAFFOLD_VERSION,
		true
	);

}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {

	wp_enqueue_style(
		'eri-scaffold-styles',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/css/style.css',
		[],
		ERI_SCAFFOLD_VERSION
	);

    wp_enqueue_style(
		'eri-scaffold-shared',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/css/shared-style.css',
		[],
		ERI_SCAFFOLD_VERSION,
		true
	);

}

/**
 * Enqueue scripts for admin.
 *
 * @return void
 */
function admin_scripts() {

	wp_enqueue_script(
		'eri-scaffold-admin',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/js/admin.js',
		[],
		ERI_SCAFFOLD_VERSION,
		true
	);

}

/**
 * Enqueue styles for admin.
 *
 * @return void
 */
function admin_styles() {

	wp_enqueue_style(
		'eri-scaffold-admin',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/css/admin-style.css',
		[],
		ERI_SCAFFOLD_VERSION,
		true
	);

    wp_enqueue_style(
		'eri-scaffold-shared',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/css/shared-style.css',
		[],
		ERI_SCAFFOLD_VERSION,
		true
	);

}

/**
 * Enqueue shared frontend and editor JavaScript for blocks.
 *
 * @return void
 */
function blocks_scripts() {

	wp_enqueue_script(
		'blocks',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/js/blocks.js',
		[],
		ERI_SCAFFOLD_VERSION,
		true
	);
}


/**
 * Enqueue editor-only JavaScript/CSS for blocks.
 *
 * @return void
 */
function blocks_editor_scripts() {

	wp_enqueue_script(
		'blocks-editor',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/js/blocks-editor.js',
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components' ],
		ERI_SCAFFOLD_VERSION,
		false
	);

	wp_enqueue_style(
		'editor-style',
		ERI_SCAFFOLD_TEMPLATE_URL . '/dist/css/editor-style.css',
		[],
		ERI_SCAFFOLD_VERSION
	);

}

setup();