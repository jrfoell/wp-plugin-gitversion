<?php
/*
Plugin Name: WP Plugin Git Version
Description: Override a plugin version with a more accurate git version using `git describe`
Version:     1.1
*/

define( 'PLUGIN_PATH', dirname( __FILE__ ) );
define( 'PLUGIN_DIR', basename( PLUGIN_PATH ) );
define( 'PLUGIN_FILE', basename( __FILE__) );

/**
 * This plugin uses `git describe` to override the plugin version
 * shown on the plugin page: wp-admin/plugins.php
 *
 * The plugin version is only overridden when the plugin is active.
 *
 * `git describe` assumes you have tagged your plugin with an
 * "annotated tag" which means a tag with a comment such as:
 *
 * `git tag -a 1.1 -m "version 1.1"`
 *
 * Once an annotated tag is added, `git describe` will give you the
 * tag name with some extra info such as:
 *
 * 1.1-3-g7142af9
 *
 * It shows the tag name (1.1)
 * Followed by how many commits since that tag (3)
 * Followed by the current commit hash (g7142af9)
 */

function git_describe() {
	return exec( 'cd '. PLUGIN_PATH.'; git describe' );
}

function git_version( $all_plugins ) {
	if ( isset( $all_plugins[ PLUGIN_DIR . '/'. PLUGIN_FILE ] ) ) {
		$all_plugins[ PLUGIN_DIR . '/'. PLUGIN_FILE ]['Version'] = git_describe();
	}
	return $all_plugins;
}
add_filter( 'all_plugins', 'git_version' );