<?php

/**
 * Adiciona uma opção de header flutuante na personalização do tema
 */
function customizer_apply_float_menu($wp_customize) {

    $wp_customize->add_section(
        'basalstyle_menubar', array(
            'title'       => __( 'Header Bar' ),
            'description' => __( 'Adiciona customizações para o menubar' ),
            'priority'    => 105,
            'capability'  => 'edit_theme_options',
    ) );

    $wp_customize->add_setting(
        'apply_float_menu_title', array(
            'default'   => 'default_value',
    ) );

    $wp_customize->add_control(
        'apply_float_menu_title', array(
            'type'    => 'hidden',
            'section' => 'basalstyle_menubar',
            'label'   => 'Header flutuante',
    ) );

    $wp_customize->add_setting(
        'apply_float_menu', array(
            'default'    => '',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
             'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        'apply_float_menu', array(
            'type'        => 'checkbox',
            'section'     => 'basalstyle_menubar',
            'label'       => 'Flutuar',
            'description' => __( 'Permite o header flutuar quando a página fizer scroll. Inclusive no modo mobile.' ),
    ) );
}

add_action('customize_register', 'customizer_apply_float_menu');

/**
 * Adiciona opções de apresentação da Busca no site
 */

add_action('customize_register', 'customizer_search_options');

function customizer_search_options($wp_customize) {

    $wp_customize->add_section(
        'basalstyle_search', array(
            'title'       => __( 'Search Bar' ),
            'description' => __( 'Conjunto de opções da apresentação da Busca no site' ),
            'priority'    => 100,
    ) );

    // Título da opção - Locais de apresentação da Busca no tema
    $wp_customize->add_setting(
        'search_title', array(
            'default'   => 'default_value',
    ) );

    $wp_customize->add_control(
        'search_title', array(
            'type'    => 'hidden',
            'section' => 'basalstyle_search',
            'label'   => __( 'Opções de apresentação da Barra de Busca' ),
            'priority'=> 10,
    ) );

    // Opção: Mostra a Busca na Abertura (homepage)
    $wp_customize->add_setting(
        'search_on_frontpage',
        array(
            'default'    => 'true',
            'type'       => 'theme_mod',
            'capability' => 'manage_options',
        )
    );

    $wp_customize->add_control(
        'search_on_frontpage',
        array(
            'type'    => 'checkbox',
            'default' => 'true',
            'label'   => __( 'Mostrar na Abertura (frontpage)' ),
            'section' => 'basalstyle_search',
        )
    );

    // Opção: Mostra a Busca nas páginas de Índexes (Archives)
    $wp_customize->add_setting(
        'search_on_archive',
        array(
            'default'    => 'true',
            'type'       => 'theme_mod',
            'capability' => 'manage_options',
        )
    );

    $wp_customize->add_control(
        'search_on_archive',
        array(
            'type'    => 'checkbox',
            'default' => 'true',
            'label'   => __( 'Mostrar nos Índices (Archive)' ),
            'section' => 'basalstyle_search',
        )
    );

    // Opção: Mostra nas instâncias (Page e Post)
    $wp_customize->add_setting(
        'search_on_page',
        array(
            'default'    => 'true',
            'type'       => 'theme_mod',
            'capability' => 'manage_options',
        )
    );

    $wp_customize->add_control(
        'search_on_page',
        array(
            'type'    => 'checkbox',
            'default' => 'true',
            'label'   => __( 'Mostra nas Páginas (Page)' ),
            'section' => 'basalstyle_search',
        )
    );
    // Opção: Mostra nas instâncias (Page e Post)
    $wp_customize->add_setting(
        'search_on_single',
        array(
            'default'    => 'true',
            'type'       => 'theme_mod',
            'capability' => 'manage_options',
        )
    );

    $wp_customize->add_control(
        'search_on_single',
        array(
            'type'    => 'checkbox',
            'default' => 'true',
            'label'   => __( 'Mostra nos Artigos (Post/Post-Types)' ),
            'section' => 'basalstyle_search',
        )
    );
// Fim customizer_search_options
}
