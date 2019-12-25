<?php

/**
 * Adiciona uma opção de header flutuante na personalização do tema
 */
function customizer_apply_float_menu($wp_customize) {

    $wp_customize->add_section( 'basalstyle_menubar', array(
      'title'       => __( 'Header Bar' ),
      'description' => __( 'Adiciona customizações para o menubar' ),
      'priority'    => 105,
      'capability'  => 'edit_theme_options',
    ) );

    $wp_customize->add_setting( 'apply_float_menu_title', array(
        'default'        => 'default_value',
    ) );

    $wp_customize->add_control( 'apply_float_menu_title', array(
        'type'    => 'hidden',
        'section' => 'basalstyle_menubar',
        'label'   => 'Header flutuante',
    ) );

    $wp_customize->add_setting( 'apply_float_menu', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
         'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'apply_float_menu', array(
        'type'        => 'checkbox',
        'section'     => 'basalstyle_menubar',
        'label'       => 'Flutuar',
        'description' => __( 'Permite o header flutuar quando a página fizer scroll. Inclusive no modo mobile.' ),
    ) );
}

add_action('customize_register', 'customizer_apply_float_menu');
