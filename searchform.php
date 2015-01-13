<form role="search" method="get" class="search-form row min-h-4" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="search-input" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" onblur="this.value = '<?php echo get_search_query(); ?>';" />
    <label class="search-label"><span><?php echo _x( 'Search for:', 'label' ); ?></span></label>
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>
