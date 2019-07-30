<?php
/**
 * Breadcrumbs
 * @author Naveen Kharwar
 */

function look_plain_get_breadcrumb() {
	echo '<a href="' . esc_url( home_url() ) . '" rel="nofollow">Home</a>';
	if ( is_category() || is_single() ) {
		echo '<i class="fas fa-angle-right"></i>';
		the_category( ' &comma; ' );
		if ( is_single() ) {
			echo '<i class="fas fa-angle-right"></i>';
			the_title();
		}
	} elseif ( is_page() ) {
		echo '<i class="fas fa-angle-right"></i>';
		echo the_title();
	} elseif ( is_search() ) {
		echo '<i class="fas fa-angle-right"></i> Search Results for...';
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}
