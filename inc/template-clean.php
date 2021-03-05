<?php
/*
* Clean menu class
*/
function remove_css_id_filter($var)
{
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('page_css_class', 'remove_css_id_filter', 100, 1);
add_filter('nav_menu_item_id', 'remove_css_id_filter', 100, 1);
add_filter('nav_menu_css_class', 'remove_css_id_filter', 100, 1);