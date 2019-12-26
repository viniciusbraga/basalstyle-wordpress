<?php
/**
 * Footer (rodapé) do tema
 *
 * Apresenta o fechamento do <div id="content">
 *
 * @package BasalStyle
 *
 */
?>


    </div>
    <!-- .content-frame -->

    <div class="footer-frame padding-top-1 padding-bottom-3">
        <footer id="colophon" class="footer desktop-8 container" role="contentinfo">

            <div class="site-info desktop-3 tablet-2 gutter">
                <p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?>. <?php _e( 'Powered by WordPress', 'twenttwent' ); ?>.</p>
            </div>

            <?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
                <div class="desktop-5 tablet-2 gutter text-align-right">
                    <nav id="footer-menu" class="nav-inline" role="navigation"><?php
                    // http://codex.wordpress.org/Navigation_Menus
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'container_class' => 'nav-inline' )
                    );
                    ?></nav>
                    <!-- #footer-menu -->
                </div>
            <?php } ?>

        </footer>
    </div>

    <?php wp_footer(); ?>


<?php if (WP_DEBUG) : ?>
<!-- Remover ou esconder este código de debug quando não for mais preciso -->
<label class="btnDebug" for="debug"> Grid <input type="checkbox" id="debug" onclick='var e=document.getElementsByTagName("body")[0],c="debug",re=new RegExp("(?:^|\\s)"+c+"(?!\\S)","g");if(e.className.match(re)){e.className=e.className.replace(re,"");}else{e.className+=" "+c;this.checked=true;}'></label>
<!-- Fim do código de debug -->
<?php endif; ?>


<a href="#header-frame" id="backtotop" class="fa fa-chevron-up"><span class="screen-reader-only">Topo da Página</span></a>


</body>
</html>
