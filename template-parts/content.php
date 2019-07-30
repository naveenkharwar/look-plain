<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Look_Plain
 */

?>
				
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php the_post_thumbnail( 'medium_large mx-auto d-block' ); ?>
	<header class="entry-header">
	<span class="meta-author"><?php look_plain_posted_by(); ?></span>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="post-date">
				<span class="meta-date"><?php look_plain_posted_on( 'F jS, Y' ); ?></span>
			</div><!-- .entry-meta -->
			<div class="entry-meta">
				<h5><?php printf( esc_html__( 'Categories', 'look-plain' ) ); ?></h5>
				<span class="meta-cat"><?php the_category( ' / ' ); ?></span>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_archive() ) {
			the_excerpt();
		} else {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'look-plain' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'look-plain' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="footer-tags">
		<?php the_tags( '<h5>Tagged with:</h5> <div class="sh-blog-tags-list"><span class="sh-blog-tag-item">', '</span><span class="sh-blog-tag-item">', '</span></div>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
