<?php
/**
 * Customize the Genesis Read More link
 *
 * @package     ChristophHerr\CustomizeGenesisReadMoreLink
 * @author      Christoph Herr
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Customize the Genesis Read More link
 * Plugin URI:  https://github.com/christophherr/customize-genesis-read-more-link
 * Description: Plugin to change the read more link in Genesis child themes.
 * Version:     1.0.0
 * Author:      Christoph Herr
 * Author URI:  https://www.christophherr.com
 * Text Domain: customize-genesis-read-more-link
 * License:     GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace ChristophHerr\CustomizeGenesisReadMoreLink;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'CGRML_URL', $plugin_url );
	define( 'CGMRL_DIR', plugin_dir_path( __DIR__ ) );
}


/**
 * Initializing the plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_autoloader() {
	require_once 'src/config.php';
	require_once 'src/customize.php';
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\launch' );

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_autoloader();
}

launch();
