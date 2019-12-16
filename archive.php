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
     * Adiciona o bloco do grid de busca utilizando uma função do WordPress.
     *
     * @link https://developer.wordpress.org/reference/functions/get_template_part/
     */
    get_template_part( 'template-parts/search' );

?>

<div id="content" class="content desktop-12 container">

    <div class="main padding-top-1 padding-bottom-2 row gutter desktop-8 container">

        <?php if ( ! have_posts() ) :
            // Caso não tenha um post referente a URL, ele aplica este conteúdo. ?>
            <?php get_template_part( 'template-parts/content', '404' ); ?>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <header class="page-header">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
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

                <?php basalstyle_post_thumbnail() ?>

                <div class="entry-content">
                    <?php the_excerpt( __( 'Read more...' ) ); ?>
                </div>

            </article>
            <!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // Fim do loop básico do WordPress ?>

        <?php // Caso o index tenha mais do que 1 página, acrescenta a paginação. ?>
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>

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

        <?php endif; ?>

        <div class="row padding-bottom-1">
            <?php comments_template( '', true ); ?>
        </div>

    </div>
    <!-- .main -->

    <?php get_sidebar(); ?>

</div>
<!-- #content -->

<?php get_footer(); ?>
