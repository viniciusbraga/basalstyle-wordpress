<?php
/**
 * Template do bloco de busca
 *
 */
?>

<div class="row min-h-3">
    <div class="desktop-12 container">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="content desktop-10 col-left-1">
        <?php else : ?>
            <div class="content desktop-8 col-left-2">
        <?php endif;?>
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
