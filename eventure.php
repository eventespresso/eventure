<?php if ( ! defined( 'ABSPATH' ) ) {
	exit( 'No direct script access allowed' );
}
/*
Plugin Name: Eventure.io Event Directory
Plugin URI: http://wordpress.org/extend/plugins/eventure/
Description: Attract more attendees to your events by posting your events on the Eventure.io event directory for free. NOTE: This is an alpha version. Full integratiuon with Eventure.io coming soon.
Author: Seth Shoultes, Event Espresso
Version: 1.0.0.alpha
Author URI: https://eventespresso.com/
*/

function eventure_hello_admin_get_text() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Hello Admin! The Eventure directory is getting ready for lift off.
	Yay! The Eventure directory is under construction.
	I can't wait to go on an Eventure Adventure!";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function eventure_hello_admin() {
	$chosen = eventure_hello_admin_get_text();
	echo "<p id='eventure'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'eventure_hello_admin' );

// We need some CSS to position the paragraph
function eventure_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#eventure {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'eventure_css' );