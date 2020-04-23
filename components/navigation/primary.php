<?php
/**
 * Primary Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

if ( has_nav_menu( 'mainmenu' ) ) :
    wp_nav_menu([
        'theme_location'    => 'mainmenu',
        'menu_class'        => 'hidden_mobile',
        'container'         => 'nav',
        'container_class'   => 'site-header-item site-header-menu primary-menu',
        'depth'             => 2
    ]);
endif;
