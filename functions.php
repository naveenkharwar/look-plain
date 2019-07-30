<?php
/**
 * Plain Text functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package plain_theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$look_plain_include = array(
	'/related-post.php',
	'/theme-excerpt.php',
	'/theme-support.php',
	'/content-width.php',
	'/widgets.php',
	'/breadcrumb.php',
	'/class-wp-bootstrap-navwalker.php',
	'/enqueue.php',
	'/template-tags.php',
	'/template-functions.php',
	'/customizer.php',
	'/jetpack.php',
);
foreach ( $look_plain_include as $look_plain_file ) {
	$look_plain_filepath = locate_template( 'inc' . $look_plain_file );
	if ( ! $look_plain_filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $look_plain_file ), E_USER_ERROR );
	}
	require_once $look_plain_filepath;
}
