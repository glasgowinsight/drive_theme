<?php
if ( function_exists('has_nav_menu') && has_nav_menu('secondary-menu') ) {
	wp_nav_menu( array( 'depth' => 2, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_class' => 'nav custom-nav', 'menu_id' => 'sec-nav' , 'theme_location' => 'secondary-menu' ) );
} else {
?>
    <ul id="sec-nav" class="nav">
            <?php wp_list_pages('sort_column=menu_order&depth=2&title_li=&exclude='.get_option('vergo_nav_exclude')); ?>
    </ul><!-- /#nav -->
<?php } ?>
	  