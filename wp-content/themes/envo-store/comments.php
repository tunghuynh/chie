<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php if ( is_single() || is_page() ) : ?>
	<div class="comments-template">
		<?php if ( have_comments() ) : ?>
			<h4 id="comments"><?php comments_number( __( 'Leave a Comment', 'envo-store' ), __( 'One Comment', 'envo-store' ), '%' . __( ' Comments', 'envo-store' ) ); ?></h4>
			<ul class="commentlist list-unstyled">
				<?php
				wp_list_comments();
				paginate_comments_links();

				if ( is_singular() ) {
					wp_enqueue_script( 'comment-reply' );
				}
				?>
			</ul>
			<?php
			comment_form();
		else :
			if ( comments_open() ) :
				comment_form();
			endif;
		endif;
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'envo-store' ); ?></p>
			<?php
		endif;
		?>
	</div>
<?php endif;
