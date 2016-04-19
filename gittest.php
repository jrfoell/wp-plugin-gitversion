<?php
/*
Plugin Name: Git Test
Description: This describes my plugin in a short sentence
Version:     1.0
*/

define( 'PLUGIN_DIR', dirname( __FILE__ ) );

function get_git_version() {
	return exec('cd '. PLUGIN_DIR.'; git describe');
}

// Comment 3
//echo "current version is: " . get_git_version() . PHP_EOL;
