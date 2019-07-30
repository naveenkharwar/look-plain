<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Look_theme
 */

get_header();
?>
<div class="row">
	<div id="primary" class="content-area col-12">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			?>
			<div class="author-section row">
				<p class="title"><?php printf( esc_html__( 'Author', 'look-plain' ) ); ?></p>
				<hr class="line">
				<div class="image col-lg-2 col-md-12">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" alt="<?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), $size = '180' ); ?></a>
				</div>
				<div class="info col-lg-9 col-md-12">
					<p class="name"><?php the_author_posts_link(); ?></p>
					<p class="description"><?php the_author_meta( 'user_description' ); ?></p>
				  <p class="read-more"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php printf( esc_html__( 'more from author', 'look-plain' ) ); ?></a></p>
				</div>
			</div>
			<div class="related-post">				
			<?php
			$related = look_plain_related_posts( get_the_ID(), 3 );

			if ( $related->have_posts() ) :
				?>
			<h5><?php printf( esc_html__( 'Realated Post', 'look-plain' ) ); ?></h5>

						<div class="row">
						<?php
						while ( $related->have_posts() ) :
							$related->the_post();
							?>
					
						<div class="col-lg-4 col-md-12">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>
							<?php echo '<div class="related-thumb" style="background: url(' . $url . ');">' , '</div>'; ?>	
								</a>
						</div>

						<div class="col-lg-8 col-md-12">
							<h6> <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h6>
							<?php look_plain_posted_on( 'F jS, Y' ); ?>
							<p><?php the_excerpt(); ?></p>
						</div>

						<?php endwhile; ?>
						</div>
				
				<!-- Add Pagination -->
			</div>

				<?php
endif;
			wp_reset_postdata();
			?>
			
			<?php
			the_post_navigation(
				array(
					'prev_text' => __( '<span class="nav-prev-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg></span><span class="nav-next-prev-text">Previous: %title</span>', 'look-plain' ),
					'next_text' => __( '<span class="nav-next-prev-text">Next: %title</span><span class="nav-next-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg></span>', 'look-plain' ),
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
?>

</div>
