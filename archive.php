<?php
/**
 * Index e template de conteúdo do tema
 *
 *
 * @package BasalStyle
 *
 */

get_header(); ?>

<div id="content" class="content desktop-12 container">

    <div class="main padding-top-1 row desktop-7 col-left-2 gutter-right">


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
                        <?php edit_post_link( __( 'Edit' ), '', '' ); ?>
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
