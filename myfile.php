<?php

define( 'PLUGIN_DIR', dirname( __FILE__ ) );

function get_git_version() {
	return exec('cd '. PLUGIN_DIR.'; git describe');
}

// Comment 3
echo "file is in: " . PLUGIN_DIR . PHP_EOL;
echo "current version is: " . get_git_version() . PHP_EOL;
