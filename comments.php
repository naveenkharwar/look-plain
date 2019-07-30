<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plain_theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$plain_theme_comment_count = get_comments_number();
			if ( '1' === $plain_theme_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'look-plain' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $plain_theme_comment_count, 'comments title', 'look-plain' ) ),
					number_format_i18n( $plain_theme_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'avatar_size' => 70,
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'look-plain' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	function my_update_comment_fields( $fields ) {

		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$label     = $req ? '*' : ' ' . __( '(optional)', 'look-plain' );
		$aria_req  = $req ? "aria-required='true'" : '';

		$fields['author'] =
			'<p class="comment-form-author">
				<label for="author">' . __( 'Name', 'look-plain' ) . $label . '</label>
				<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Jane Doe', 'look-plain' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30" ' . $aria_req . ' />
			</p>';

		$fields['email'] =
			'<p class="comment-form-email">
				<label for="email">' . __( 'Email', 'look-plain' ) . $label . '</label>
				<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'name@email.com', 'look-plain' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
			'" size="30" ' . $aria_req . ' />
			</p>';

		$fields['url'] =
			'<p class="comment-form-url">
				<label for="url">' . __( 'Website', 'look-plain' ) . '</label>
				<input id="url" name="url" type="url"  placeholder="' . esc_attr__( 'http://google.com', 'look-plain' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" />
				</p>';

		return $fields;
	}
	add_filter( 'comment_form_default_fields', 'my_update_comment_fields' );



	add_filter( 'comment_form_fields', 'move_comment_field' );
	function move_comment_field( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}

	$comments_args = array(
		// Change the title of send button
		'label_submit'        => __( 'Send', 'look-plain' ),
		// Change the title of the reply section
		'title_reply'         => __( 'Write a Reply or Comment', 'look-plain' ),
		// Remove "Text or HTML to be displayed after the set of comment fields".
		'comment_notes_after' => '',
		// Redefine your own textarea (the comment body).
		'comment_field'       => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'look-plain' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
	);
	comment_form( $comments_args );
	?>

</div><!-- #comments -->
