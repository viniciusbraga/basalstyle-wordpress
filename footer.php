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

    <div class="footer-frame">
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="site-info">
                <p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
            </div>
        </footer>
    </div>


    <?php wp_footer(); ?>

</body>
</html>
