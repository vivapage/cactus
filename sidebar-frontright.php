<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactus
 */

if (!is_active_sidebar('sidebar-frontright')) {
  return;
}
?>

<aside id="secondary" class="widget-area sidebar-right">
  <?php dynamic_sidebar('sidebar-frontright'); ?>
</aside><!-- #secondary -->