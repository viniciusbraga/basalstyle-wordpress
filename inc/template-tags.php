<?php
/**
 * Custom BasalStyle template tags
 *
 * @package BasalStyle
 *
 */

if ( ! function_exists( 'basalstyle_entry_meta' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags.
     *
     * Create your own basalstyle_entry_meta() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     */
    function basalstyle_entry_meta() {

        $format = get_post_format();
        if ( current_theme_supports( 'post-formats', $format ) ) {
            printf(
                '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'twentytwenty' ) ),
                esc_url( get_post_format_link( $format ) ),
                get_post_format_string( $format )
            );
        }

        if ( 'post' === get_post_type() ) {
            printf(
                '<p class="entry-tags">%1$s</p>',
                basalstyle_entry_tags()
            );
        }

    }
endif;


if ( ! function_exists( 'basalstyle_entry_date' ) ) :

    function basalstyle_entry_date() {

        $str_time_published = sprintf(
            '<time class="published" title="%1$s" datetime="%2$s">%3$s</time>',
            __('Published', 'twentytwenty'),
            esc_attr( get_the_date( 'c' ) ),
            get_the_date()
        );

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $str_time_updated = sprintf(
                '<time class="updated" title="%1$s" datetime="%2$s">%3$s</time>',
                __('Updated', 'twentytwenty'),
                esc_attr( get_the_modified_date( 'c' ) ),
                get_the_modified_date()
            );
        }

    }
endif;


if ( ! function_exists( 'basalstyle_entry_tags' ) ) :

    function basalstyle_entry_tags() {
        $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentytwenty' ) );

        if ( $tags_list && ! is_wp_error( $tags_list ) ) {
            return sprintf(
                '<span class="screen-reader-text">%1$s</span> %2$s',
                _x( 'Tags', 'Used before tag names.', 'twentytwenty' ),
                $tags_list
            );
        }
    }

endif;

if ( ! function_exists( 'basalstyle_comment_form' ) ) :
    /**
    * Documentation for function.
    */
    function basalstyle_comment_form( $order ) {
        if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

            comment_form(
                array(
                    'logged_in_as' => null,
                    // 'title_reply'  => null,
                )
            );
        }
    }
endif;

if ( ! function_exists( 'basalstyle_post_thumbnail' ) ) :
    /**
    * Aplica o thumbnail diferenciando entre o post e o index.
    */
    function basalstyle_post_thumbnail() {
        if ( has_post_thumbnail() ) {
            if ( is_single() ) :
                printf(
                    '<figure>%1$s</figure>',
                    get_the_post_thumbnail( get_the_ID(), 'basalstyle-featured')
                );
            else :
                printf(
                    '<figure>%1$s</figure>',
                    get_the_post_thumbnail( get_the_ID() )
                );
            endif;
        }
    }
endif;

