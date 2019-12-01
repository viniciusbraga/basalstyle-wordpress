<?php
/**
 * Index e template de conteúdo do tema
 *
 *
 * @package BasalStyle
 *
 */

get_header(); ?>

<div class="row min-h-4">
    <div class="desktop-12 container">
        <div class="content desktop-8 col-left-2">
            <?php get_search_form(); ?>
        </div>
    </div>
</div>

<div id="content" class="content desktop-8 container">

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div class="main desktop-6 gutter-right padding-top-1">
<?php else : ?>
    <div class="main row gutter padding-top-1">
<?php endif;?>

        <?php if ( ! have_posts() ) :
            // Caso não tenha um post referente a URL, ele aplica este conteúdo. ?>
            <div id="post-0" class="post error404 not-found row">
                <h1 class="entry-title"><?php _e( 'Not Found' ); ?></h1>
                <div class="entry-content">
                    <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.' );
                    ?></p>
                </div>
                <!-- .entry-content -->
            </div>
            <!-- #post-0 -->
        <?php endif; ?>

        <?php while ( have_posts() ) :  the_post();  ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class("padding-bottom-1"); ?>>

                <header>
                    <div class="entry-metadata">
                        <time class="post-date"><?php
                            the_time( get_option( 'date_format' ) ); ?></time>
                        <span class="author"><?php
                            // http://codex.wordpress.org/Function_Reference/the_author
                            the_author(); ?></span>
                        <span class="categories"><?php
                            // http://codex.wordpress.org/Function_Reference/the_category
                            the_category( ', ' ); ?></span>
                        <?php comments_number( '', '<i class="comment-counter fa fa-comment"> 1</i>', '<i class="comment-counter  fa fa-comment"> %</i>' ); ?>
                        <?php edit_post_link( '<i class="fa fa-pencil"></i> ' . __( 'Edit' ) ); ?>
                    </div>

                    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_permalink() ?>" rel="bookmark"><?php
                        the_title();
                        ?></a></h1>
                </header>

                <div class="entry-content">
                    <?php the_content( __( 'Read more...' ) ); ?>
                </div>

            </article>
            <!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // Fim do loop básico do WordPress ?>

        <?php // Caso o index tenha mais do que 1 página, acrescenta a paginação.
            if (  $wp_query->max_num_pages > 1 ) : ?>
                <div class="pagination">
                    <div class="nav-inline">
                        <?php
                            $args = array(
                                    'prev_text'    => __('Previous'),
                                    'next_text'    => __('Next'),
                                    'type'         => 'list'
                                    );

                            echo paginate_links( $args );
                        ?>
                    </div><!-- #nav-below -->
                </div>

        <?php endif; // Fim da paginação

    	/**
    	 *  Output comments wrapper if it's a post, or if comments are open,
    	 * or if there's a comment number – and check for password.
    	 * */
    	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {

        ?>
        <div class="row padding-bottom-1">
            <?php comments_template(); ?>
        </div>
        <?php
        } ?>

    </div>
    <!-- .main -->

    <?php get_sidebar(); ?>

</div>
<!-- #content -->


<?php get_footer(); ?>
