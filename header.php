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

    <div class="header-frame">

        <header class="header desktop-12 container">
            <?php
                // Condicional que remove o link do logo do site quando na front-page
                if ( is_front_page() ) { ?>

            <h1 class="site-name"><?php esc_attr( bloginfo( 'name' ) ); ?></h1>
            <p class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></p>

            <?php } else { ?>

            <h1 class="site-name"><a href="/" rel="home"><?php
                esc_attr( bloginfo( 'name' ) );
                ?></a></h1>
            <p class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></p>

            <?php } ?>
        </header>
        <!-- header -->

    </div>
    <!-- frame-header -->

    <div class="content-frame row">

        <div id="content" class="content desktop-12 container">

