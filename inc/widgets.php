<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function look_plain_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'look-plain' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'look-plain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-12 col-md-4 col-lg-3">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'look_plain_widgets_init' );
