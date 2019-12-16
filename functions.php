<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Caso o arquivo seja acessado diretamente, esta linha impede a execução.


/**
 * Especifica padrões do tema e registra as funcionalidades compatíveis do tema com WordPress.
 *
 * Observe que esta funcão é acoplada (hooked) dentro da função after_setup_theme (hook),
 * a qual roda antes da função init (hook). A função init se dá muito depois da necessidade
 * de algumas funcionalidades, como a indicação de compatibilidade por thumbnails nos posts.
 */

function basalstyle_theme_support() {

    /*
     * Deixa para o WordPress organizar o título do documento
     */
    add_theme_support( 'title-tag' );


    /*
     * Modifica a marcação HTML original do WordPress para HTML5
     * nos tópicos de formulário de busca e comentários.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );


    /*
     * Adiciona a funcionalidade de Post Thumbnails para posts e páginas.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 9999, 150 );

    // Add custom image size used in Cover Template.
    add_image_size( 'basalstyle-featured', 770, 9999 );


    /*
     * Adiciona compatibilidade para Formatos de Posts
     *
     * @link https://codex.wordpress.org/Post_Formats
     */
    add_theme_support(
        'post-formats',
        array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        )
    );

}

add_action( 'after_setup_theme', 'basalstyle_theme_support' );

/**
 * Registra as libs e folhas de estilo do HEAD do HTML
 *
 */
function basalstyle_scripts_styles() {
    global $wp_styles;

    // Remove a lib do JQuery do WordPress
    wp_deregister_script( 'jquery' );

    // Registra a lib do JQuery existente no Google's CDN
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.2.3', false );

    // Aplica o script do template
    wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js', array('jquery'), '1.11.2', false  );
    wp_enqueue_script( 'basalstyle-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '0.1', false  );

    // Adiciona o Font-Awesome com ícones. Sempre útil
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

    // Carrega as folhas de estilo principais.
    // wp_enqueue_style( 'basalstyle-style', get_stylesheet_uri(), array(), '20130224' );
    wp_enqueue_style( 'basalstyle', get_template_directory_uri() . '/basalstyle/style.min.css', array(), '1.6.1' );
    wp_enqueue_style( 'basalstyle-wordpress', get_template_directory_uri() . '/style.css', array(), '20191129' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if (WP_DEBUG) {
        wp_enqueue_script('live-js' , get_template_directory_uri() . '/js/_live.js'  , [], microtime(), true);
    }

}

add_action( 'wp_enqueue_scripts', 'basalstyle_scripts_styles' );


/**
 * Adiciona uma classe específica para tipo de página apresentada
 *
 */
function basalstyle_class_names($classes) {
    // Adiciona 'class-name' para o array $classes
    if ( is_single() ) :
    $classes[] = 'body-single';
    elseif ( is_page() ) :
    $classes[] = 'body-page';
    elseif ( is_category() ) :
    $classes[] = 'body-category';
    elseif ( is_home() ) :
    $classes[] = 'body-home';
    endif;

    return $classes;
}

add_filter('body_class','basalstyle_class_names');


/**
 * Registra os menus de navegação distribuídos nos templates
 * Leia mais em: http://codex.wordpress.org/Navigation_Menus
 *
 */
function basalstyle_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Menu Cabeçalho' ),
      'lang-menu'   => __( 'Menu de Línguas' ),
      'footer-menu' => __( 'Menu Rodapé' )
    )
  );
}

add_action( 'init', 'basalstyle_register_menus' );


/**
 * Registra sidebars.
 *
 */
function basalstyle_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'twentytwenty' ),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}

add_action( 'widgets_init', 'basalstyle_widgets_init' );


/**
* Retira o salto no link do "Ler Mais" da listagem.
*/
function basalstyle_remove_more_jump_link( $link ) {
    $offset = strpos( $link, '#more-' );
    if ($offset) {
        $end = strpos( $link, '"',$offset );
    }
    if ($end) {
            $link = substr_replace( $link, '', $offset, $end-$offset );
    }
    return $link;
}

add_filter('the_content_more_link', 'basalstyle_remove_more_jump_link');


/**
* Muda o excerpt para o tamanho de um 25 palavras.
*/
function new_excerpt_length($length) {
    return 25;
}

add_filter('excerpt_length', 'new_excerpt_length');


/**
* Muda o excerpt para o tamanho de um 25 palavras.
*/
function new_excerpt_more($more) {
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Returns the size for avatars used in the theme.
 */
function basalstyle_get_avatar_size() {
    return 60;
}


/**
 * Modifica o campo de comentário no formulário
 */
function basalstyle_comment_form_defaults( $defaults ) {
    $comment_field = $defaults['comment_field'];

    // Adjust height of comment form.
    $defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

    return $defaults;
}
add_filter( 'comment_form_defaults', 'basalstyle_comment_form_defaults' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Lista as funções carregadas no wp_header()
 *
 */
// remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

