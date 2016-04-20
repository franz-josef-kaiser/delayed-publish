<?php
/**
 * Plugin Name: (WCM) Delay post publishing
 * Plugin URI:  http://unserkaiser.com
 * Description: Only allows publishing a post if the user registered one week ago.
 * Version:     1.1.0
 * Author:      Franz Josef Kaiser
 * Author URI:  http://unserkaiser.com
 * License:     MIT
 */

// Only run this for new "post"-post_type admin UI screens
(
	is_admin()
	AND 'post-new.php' === $GLOBALS['typenow']
)
	&& add_action( 'add_meta_boxes', function()
{
	// Retrieve the current users' data as object
	$curr_user = get_user_by( 'id', get_current_user_id() );

	// Get the time/date (and format) of the time
	// the user registered as UNIX timestamp - needed for comparison
	$reg_date  = abs( strtotime( $curr_user->user_registered ) );
	$curr_date = abs( strtotime( current_time( 'mysql' ) ) );

	// Human readable difference: This calculates the time since the user registered
	$diff       = human_time_diff( $reg_date, $curr_date );
	$diff_array = explode( ' ', $diff );

	// Finally remove the MetaBox:
	// Remove if we're on the 1st day (diff result is min/hour)
	if (
		strstr( $diff_array[1], 'mins' )
		OR strstr( $diff_array[1], 'hours' )
	)
		remove_meta_box( 'submitdiv', null, 'side' );

	// Remove if we're below or equal to 7 days (1 week)
	if ( apply_filters( 'wcm.delayedpublish.days', 7 ) >= $diff_array[0] )
		remove_meta_box( 'submitdiv', null, 'side' );
}, 20 );