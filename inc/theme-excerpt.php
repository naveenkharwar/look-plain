<?php
  /**
   * Filter except length to 35 words.
   * */
  
function look_plain_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'look_plain_excerpt_length', 999 );
