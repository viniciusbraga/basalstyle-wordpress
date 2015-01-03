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

    <div class="footer-frame min-h-4 padding-top-1">
        <footer id="colophon" class="footer desktop-8 container" role="contentinfo">

            <div class="site-info">
                <p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?>. <?php _e( 'Powered by' ); ?> <a href="http://wordpress.org" title="WordPress.org">WordPress</a>.</p>
            </div>

        </footer>
    </div>

    <?php wp_footer(); ?>

<!-- Remover ou esconder este código de debug quando não for mais preciso -->
<label class="btnDebug" for="debug"> Grid <input type="checkbox" id="debug" onclick='var e=document.getElementsByTagName("body")[0],c="debug",re=new RegExp("(?:^|\\s)"+c+"(?!\\S)","g");if(e.className.match(re)){e.className=e.className.replace(re,"");}else{e.className+=" "+c;this.checked=true;}'></label>
<!-- Fim do código de debug -->

</body>
</html>
