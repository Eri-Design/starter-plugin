<?php
/**
 * Plugin Name: Eri Scaffold
 * Description: Description goes here.
 * Version: 1.0.0
 * Author: Eri Design Studio
 * Author URI: https://eridesignstudio.com
 * Text-domain: eri-scaffold
 * Domain-path: languages
 * License: GPL-3.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ERI_SCAFFOLD_VERSION', '1.0.0' );
define( 'ERI_SCAFFOLD_TEMPLATE_URL', plugin_dir_url( __FILE__ ) );
define( 'ERI_SCAFFOLD_PATH', plugin_dir_path( __FILE__ ) );

add_action( 'plugins_loaded', function() {
	require_once 'src/main.php';
} );