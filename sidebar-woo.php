<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactus
 */

if (!is_active_sidebar('sidebar-woo')) {
  return;
}
?>

<aside id="secondary" class="widget-area sidebar">
  <?php dynamic_sidebar('sidebar-woo');

  echo '<h2 class="widget-title">Продавцы</h2>';
  echo '<div class="widget-inner">';
  $args = array(
    'role'    => 'seller',
    'orderby' => 'meta_value',
    'meta_key' => 'dokan_store_name',
    'order'   => 'ASC',
    'fields' => 'all_with_meta'
  );
  $users = get_users($args);

  echo '<select name="seller" id="seller" class="seller" onchange="location = this.value;">';
  echo '<option selected hidden>Выбрать</option>';
  echo '<optgroup style="max-height: 65px;" label="">';
  foreach ($users as $user) {
    echo '<option value="/store/' . esc_html($user->user_nicename) . '">' . esc_html($user->dokan_store_name) . '</option>';
  }
  echo '</optgroup>';
  echo '</select>';
  echo '</div>';
  dynamic_sidebar('sidebar-woo2');
  ?>

</aside><!-- #secondary -->