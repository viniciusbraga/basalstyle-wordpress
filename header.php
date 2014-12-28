<?php
/**
 * Header do tema.
 *
 * Apresenta toda a seção <head> do HTML e tudo até <div id="content">
 *
 * @package BasalStyle
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
        // Apresenta o <title> de acordo com o conteúdo da página.
        global $page, $paged;

        // https://developer.wordpress.org/reference/functions/wp_title/
        wp_title( '-', true, 'right' );

        // Adiciona o nome do blog.
        // http://codex.wordpress.org/pt-br:Template_Tags/bloginfo
        bloginfo( 'name' );

        // Adiciona a descrição do blog na página de home.php/front-page.php.
        // http://codex.wordpress.org/pt-br:Template_Tags/get_bloginfo
        $site_description = get_bloginfo( 'description', 'display' );

        if ( $site_description && ( is_home() || is_front_page() ) )
        {
            echo " - $site_description";
        }

    ?></title>

    <?php wp_head(); ?>

</head>

<body <?php body_class();?> >

    <div class="header-frame  min-h-5">

        <header class="header header-inline min-h-3 row desktop-8 container">

            <div class="site-logo"><?php
                // Condicional que remove o link do logo do site quando na página de front-page
                if ( is_front_page() ) { ?>

                <h1 class="site-name"><?php esc_attr( bloginfo( 'name' ) ); ?></h1>
                <p class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></p>

            <?php } else { ?>

                <h1 class="site-name"><a href="/" rel="home"><?php
                    esc_attr( bloginfo( 'name' ) );
                    ?></a></h1>
                <p class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></p>

            <?php } ?></div>
            <!-- .branding-frame -->

            <?php if ( has_nav_menu( 'header-menu' ) ) { ?>

                <nav id="header-menu" class="nav-inline" role="navigation"><?php
                    // Acrescenta o botão de mobile do BaslStyle no menu principal
                    $mobile_trigger = '<a class="nav-mobile" href="javascript:void(0);"><i class="fa fa-bars"></i></a>';
                    // http://codex.wordpress.org/Navigation_Menus
                    wp_nav_menu( array(
                       'theme_location'  => 'header-menu',
                       'container_class' => 'menu',
                       'items_wrap'      => $mobile_trigger . '<ul id="%1$s" class="%2$s">%3$s</ul>', )
                    );
                ?></nav>
                <!-- #header-menu -->

             <?php } ?>

            <?php if ( has_nav_menu( 'lang-menu' ) ) { ?>

                    <?php // http://codex.wordpress.org/Navigation_Menus
                        wp_nav_menu( array(
                            'theme_location' => 'lang-menu',
                            'container_class' => 'nav-inline' )
                        );
                    ?></nav>
                    <!-- #header-menu -->

            <?php } ?>



        </header>
        <!-- header -->

    </div>
    <!-- frame-header -->

    <div class="content-frame row">

        <div id="content" class="content desktop-8 container">

