<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactus
 */

if (!is_active_sidebar('sidebar-vendor')) {
  return;
}
?>

<aside id="secondary" class="widget-area sidebar dokan-category-menu">
  <?php dynamic_sidebar('sidebar-vendor'); ?>
</aside><!-- #secondary -->