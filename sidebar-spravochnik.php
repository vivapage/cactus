<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactus
 */

if (!is_active_sidebar('sidebar-spravochnik')) {
  return;
}
?>

<aside id="secondary" class="widget-area sidebar">
  <?php dynamic_sidebar('sidebar-spravochnik'); ?>
</aside><!-- #secondary -->