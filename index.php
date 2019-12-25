<?php
/**
 * Index e template de conteúdo do tema
 *
 *
 * @package BasalStyle
 *
 */

get_header(); ?>

<?php
    /**
     * Adiciona o bloco da Busca utilizando uma função existente desde do WordPress 3.0.
     *
     * @link https://developer.wordpress.org/reference/functions/get_template_part/
     */
    get_template_part( 'template-parts/content', 'search' );
?>

<div id="content" class="content padding-bottom-2 desktop-8 container">

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div class="main desktop-6 gutter padding-top-1">
<?php else : ?>
    <div class="main row gutter padding-top-1">
<?php endif;?>

        <?php if ( ! have_posts() ) :
            // Caso não tenha um post referente a URL, ele aplica este conteúdo. ?>
            <?php get_template_part( 'template-parts/content', '404' ); ?>
        <?php endif; ?>

        <?php while ( have_posts() ) :  the_post();  ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header>
                <?php if ( ! is_page() ) : ?>
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
                <?php endif; ?>
                    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_permalink() ?>" rel="bookmark"><?php
                        the_title();
                        ?></a></h1>
                </header>

                <?php basalstyle_post_thumbnail() ?>

                <div class="entry-content">
                    <?php
                        the_content( __( 'Read more...' ) );

                        if ( is_singular() && '' !== get_the_author_meta( 'description' ) ) {
                            get_template_part( 'template-parts/biography' );
                        }
                    ?>
                </div>

                <?php if (  is_singular() ) : ?>
                <footer class="entry-footer">
                    <?php basalstyle_entry_meta(); ?>
                </footer><!-- .entry-footer -->
                <?php endif; ?>

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
