<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <nav id="top-navigation" class="top-navigation">
    <div class="top-wrap">

      <?php cactus_social_menu(); ?>

      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'menu-2',
          'menu_id'        => 'top-menu',
        )
      );
      ?>

      <div class="cart-info">
        <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
          title="<?php _e('View your shopping cart', 'cactus'); ?>"><i
            class="fa fa-shopping-cart"></i><sup><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></sup></a>
        <div class="user-area">
          <?php if (is_user_logged_in()) { ?>
          <a href="/my-account"><?php esc_html_e('My account'); ?></a>
          <?php } else { ?>
          <a href="/wp-login.php" title="Members Area Login" rel="home"><?php esc_html_e('Log in'); ?></a>
          <?php } ?>
        </div>
      </div>
  </nav>


  </div>


  <?php
  if (is_front_page()) :
  ?>
  <div id="page" class="site frontpage">
    <?php
  else :
    ?>
    <div id="page" class="site">
      <?php
    endif;
      ?>
      <header id="masthead" class="site-header">

        <div class="site-branding">
          <?php
          the_custom_logo();
          if (is_front_page() && is_home()) :
          ?>
          <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
              rel="home"><?php bloginfo('name'); ?></a>
          </h1>
          <?php
          else :
          ?>
          <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
              rel="home"><?php bloginfo('name'); ?></a>
          </p>
          <?php
          endif;
          $cactus_description = get_bloginfo('description', 'display');
          if ($cactus_description || is_customize_preview()) :
          ?>
          <p class="site-description"><?php echo $cactus_description; ?></p>
          <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <i class="fa fa-bars" aria-hidden="true"></i> <?php esc_html_e('Menu', 'cactus'); ?>
          </button>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
            )
          );
          ?>
          <?php get_search_form(); ?>
        </nav><!-- #site-navigation -->
      </header><!-- #masthead -->