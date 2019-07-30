<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plain_theme
 */

?>
</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<section id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<div class="row">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- .row -->
			</section><!-- #primary-sidebar -->
			<?php endif; ?>
		</div>

		<div class="max-size">
			<div class="design-credit">
				<div class="site-info">
				<?php echo '<p><a target="_blank" href="http://naveenkharwar.com/domo/look-plain/">Look Plain</a> ' . esc_html__( 'Proudly powered by', 'look-plain' ) . ' WordPress</p>'; ?>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
</div><!-- .conatiner -->

<?php wp_footer(); ?>

</body>
</html>
