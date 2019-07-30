<?php

/**
 * Enqueue scripts and styles.
 */

function look_plain_scripts() {

	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/Bootstrap/css/bootstrap.min.css', array(), '4.3.1' );

	wp_register_style( 'look-plain-style', get_template_directory_uri() . '/style.css', array( 'bootstrap-css' ), '1.5.0' );

	wp_enqueue_style( 'bootstrap-css' );

	wp_enqueue_style( 'look-plain-style' );

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css', array(), '5.8.1' );

	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/swiper/css/swiper.min.css', array(), '5.5.0' );

	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/swiper/js/swiper.min.js', array(), '4.5.0', true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.8.1', true );

	wp_enqueue_script( 'look-plain-bootstrap-script', get_template_directory_uri() . '/assets/Bootstrap/js/bootstrap.min.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'look-plain-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'look-plain-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'look_plain_scripts' );
