<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage BasalStyle
 * @since 1.0.0
 */
 if ( post_password_required() ) {
    return;
}

?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                if ( have_comments() ) {
                    _e( 'Join the Conversation', 'twentynineteen' );
                } else {
                    _e( 'Leave a comment', 'twentytwenty' );
                }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
                wp_list_comments(
                    array(
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'avatar_size' => basalstyle_get_avatar_size(),
                    )
                );
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        printf (
            '<p class="no-comments">%s</p>',
            _e( 'Comments are closed.', 'twentytwenty' )
        );
    endif;
    ?>

    <?php basalstyle_comment_form( true ); ?>

</div><!-- .comments-area -->