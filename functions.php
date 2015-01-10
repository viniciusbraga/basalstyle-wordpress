<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Caso o arquivo seja acessado diretamente, esta linha impede a execução.


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
    wp_enqueue_script( 'basalstyle-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '0.1', false  );

    // Adiciona o Font-Awesome com ícones. Sempre útil
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

    // Carrega as folhas de estilo principais.
    // wp_enqueue_style( 'basalstyle-style', get_stylesheet_uri(), array(), '20130224' );
    wp_enqueue_style( 'basalstyle', get_template_directory_uri() . '/basalstyle/style.min.css', array(), '20141224' );
    wp_enqueue_style( 'basalstyle-wordpress', get_template_directory_uri() . '/style.css', array(), '20140620' );

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
        'name' => __( 'Sidebar', 'basalstyle' ),
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
 * Lista as funções carregadas no wp_header()
 *
 */
// remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

