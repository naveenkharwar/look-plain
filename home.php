<?php
/**
 * The home template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plain_theme
 */

get_header();
?>
<!-- Swiper -->
<div class="swiper-header">
	<div class="swiper-container featured-container">
		<div class="swiper-wrapper">
			<?php
			$slider_query = new WP_Query(
				array(
					'tag'            => 'featured',
					'posts_per_page' => 10,
				)
			);
			while ( $slider_query->have_posts() ) :
				$slider_query->the_post();
				// your code to display posts by tag.
				?>
				<?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
				<?php echo '<div class="swiper-slide" style="background: url(' . esc_url( $url ) . ')">'; ?>
			<div class="carousel-caption">
				<div class="carousel-caption-inner">
					<h3 class="featured-tag"><span><?php echo __( 'Featured Post', 'look-plain' ); ?></span></h3>
					<?php the_title( '<p class="carousel-caption-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' ); ?>
					<p class="carousel-caption-category">
						<?php the_category( ', ' ); ?>
					</p>
				</div>
			</div>
			</div><!-- .swiper-slide -->
			<?php endwhile; ?>
		</div><!-- .swiper-wrapper -->
		<!-- Add Arrows -->
		<div class="swiper-button-next">
			<i class="fas fa-angle-right"></i>
		</div>
		<div class="swiper-button-prev">
			<i class="fas fa-angle-left"></i>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
	</div><!-- .swiper-header -->
</div>

<!-- Post -->
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- Start the Loop. -->
		<div class="card-columns">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<div class="card">
						<div class="post-container ">
							<div class="post-meta-thumb">
								<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								<?php endif; ?>
							</div>
							<div class="post-content-container">
								<div class="post-meta post-meta-one">
									<small>
										<?php the_time( 'F jS, Y' ); ?> 
									</small>
								</div>
								<h2 class="post-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="post-content">
									<?php the_excerpt(); ?>
								</div>
								<div class="post-meta post-meta-two">
									<span class="post-meta-author"><?php look_plain_posted_by(); ?></span>
								</div>
							</div> <!-- closes the first div box -->
						</div><!-- .post-container -->
					</div><!-- . col-sm-4 -->
					<?php endwhile; else : ?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'look-plain' ); ?></p>
					<?php endif; ?>
		</div><!-- .row -->
				<div class="look-plain-pagination look-plain-color mt-2 mb-2">
					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => __( 'Next', 'look-plain' ),
							'next_text' => __( 'Previous', 'look-plain' ),
						)
					);
					?>
				</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>

</div>
