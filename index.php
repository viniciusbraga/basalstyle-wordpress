<?php
/**
 * Index e template de conteúdo do tema
 *
 *
 * @package BasalStyle
 *
 */

get_header(); ?>

<div class="main desktop-8 leading-top-1">

    <?php if ( ! have_posts() ) :
        // Caso não tenha um post referente a URL, ele aplica este conteúdo. ?>
        <div id="post-0" class="post error404 not-found desktop-4">
            <h1 class="entry-title"><?php _e( 'Not Found', 'basalstyle' ); ?></h1>
            <div class="entry-content">
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.' );
                ?></p>
              <?php get_search_form(); ?>
            </div>
            <!-- .entry-content -->
        </div>
        <!-- #post-0 -->
    <?php endif; ?>


    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header>
                <div class="entry-metadata">
                    <time class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></time>
                    <?php edit_post_link( __( 'Edit' ), ' | ', '' ); ?>
                </div>

                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_permalink() ?>" rel="bookmark"><?php
                    the_title();
                    ?></a></h1>
            </header>

            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>' ) ); ?>
            </div>

        </article>
        <!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // Fim do loop básico do WordPress ?>

    <div class="row">
        <?php comments_template( '', true ); ?>
    </div>

</div>
<!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
