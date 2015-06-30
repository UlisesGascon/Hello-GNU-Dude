<?php
/*
Plugin Name: Hello GNU Dude
Plugin URI: https://github.com/UlisesGascon/Hello-GNU-Dude
Description: This basic plugin for Wordpress confirm if your server is using Windows or other platform
Author: Ulises Gascon
Version: 1.0
Author URI: http://ulisesgascon.com
*/

// This just check the system info
function hello_dude() {
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    echo 'ALERT!! This is server use Windows!';
    echo php_uname();
} else {
    echo 'Good News! This server is not using Windows!';
}
};

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dude' );

// We need some CSS to position the paragraph
function dude_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dude {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dude_css' );

?>
