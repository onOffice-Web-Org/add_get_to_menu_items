<?php
/**
 * Plugin Name: Add $_GET parameter to menu items
 */

add_filter( 'wp_get_nav_menu_items','nav_items', 11, 3 );

function nav_items( $items, $menu, $args )
{
    if( is_admin() )
        return $items;

    foreach( $items as $item )
    {
        $get_parameter = get_field('$_get_params', $item);
        if( $get_parameter) {
            $item->url .= '?'.$get_parameter;
        }
    }
    return $items;
}