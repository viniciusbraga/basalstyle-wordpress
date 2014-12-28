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
        <!-- #content -->
    </div>
    <!-- .content-frame -->

    <div class="footer-frame min-h-6 padding-top-1">
        <footer id="colophon" class="footer desktop-8 container" role="contentinfo">
            <div class="site-info">
                <p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
            </div>
        </footer>

        <?php if ( has_nav_menu( 'footer-menu' ) ) { ?>

            <nav id="footer-menu" class="desktop-8 container" role="navigation"><?php

                // Acrescenta o botão de mobile do BaslStyle no menu principal
                $mobile_trigger = '<a class="nav-mobile" href="javascript:void(0);"><i class="fa fa-bars"></i></a>';
                // http://codex.wordpress.org/Navigation_Menus
                wp_nav_menu( array(
                   'theme_location'  => 'header-menu',
                   'container_class' => 'nav-inline' )
                );

            ?></nav>
            <!-- #footer-menu -->

         <?php } ?>

    </div>


    <?php wp_footer(); ?>

<!-- Remover ou esconder este código de debug quando não for mais preciso -->
<label class="btnDebug" for="debug"> Grid <input type="checkbox" id="debug" onclick='var e=document.getElementsByTagName("body")[0],c="debug",re=new RegExp("(?:^|\\s)"+c+"(?!\\S)","g");if(e.className.match(re)){e.className=e.className.replace(re,"");}else{e.className+=" "+c;this.checked=true;}'></label>
<!-- Fim do código de debug -->

</body>
</html>
