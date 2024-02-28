<?php
/*
Plugin Name: Disable Pattern Popups
Description: Automatically disable the 'Choose a Pattern' popup in the new WordPress editor when creating new page in TT4 Theme.
Contributors: wpcorner, lumiblog
Author URI: https://wpcorner.co
Version: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: disable-patterns
Domain Path: /languages
*/

//bail if not WordPress path
if ( false === defined( 'ABSPATH' ) ) {
    return;
}

/**
 * Enqueue the JavaScript file
 */
function disable_patterns_enqueue_script() {
	$current_screen = get_current_screen();

	// Check if the current screen is the new page creation screen
	if ($current_screen && $current_screen->id === 'page') {
		wp_enqueue_script(
			'disable-patterns', // Unique handle for the script
			plugin_dir_url(__FILE__) . 'disable-patterns.js',
			array(),
			'1.0',
			true
		);
	}
}
add_action('admin_enqueue_scripts', 'disable_patterns_enqueue_script');
