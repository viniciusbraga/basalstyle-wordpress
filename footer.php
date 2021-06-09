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
<?php
    if ( is_active_sidebar( 'sidebar-1' ) ) {


    } else {

    }
?>
    <div class="footer-frame row padding-top-1">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <footer id="colophon" class="footer row desktop-10 container" role="contentinfo">
        <?php else : ?>
            <footer id="colophon" class="footer row desktop-8 container" role="contentinfo">
        <?php endif;?>
            <div class="row">
            <?php if ( is_active_sidebar( 'footer-first' ) ) : ?>
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <div class="site-info desktop-5 tablet-2 gutter-left">
                <?php else : ?>
                    <div class="site-info desktop-4 tablet-2 gutter-left">
                <?php endif;?>
                    <div class="widget-area text-small" role="complementary">
                        <?php dynamic_sidebar( 'footer-first' ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-second' ) ) { ?>
                <div class="desktop-3 col-left-1 tablet-2 gutter">
                    <div class="widget-area text-small" role="complementary">
                        <?php dynamic_sidebar( 'footer-second' ); ?>
                    </div>
                </div>
            <?php } ?>
            </div>

            <div class="row padding-top-1">
                <p class="copyright gutter">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?>. <?php _e( 'Powered by WordPress', 'twenttwent' ); ?>.</p>
            </div>
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
