<?php
/**
 * Sidebar contendo a área principal de widget
 *
 * Se não existe widgets ativos no sidebar, ele esconde completamente.
 *
 * @package BasalStyle
 *
 *
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

    <div id="secondary" class="widget-area text-small desktop-3 padding-top-1 gutter-left" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
    <!-- #secondary -->

<?php endif; ?>
