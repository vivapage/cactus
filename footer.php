<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactus
 */

?>
</div><!-- #page -->
<footer id="colophon" class="site-footer">
  <div class="site-info">
    <div class="footer-col logo">
      <div class="logo-footer"><img src="/images/logo.svg" alt="КАКТУС КИЕВ"></div>
      <div class="slogan">
        КАКТУС КИЕВ виртуальный клуб любителей суккулентных растений
      </div>
    </div>
    <div class="footer-col">
      <h4>Разделы</h4>
      <ul>
        <li><a href="/forums">Форум</a></li>
        <li><a href="/gallery">Галерея</a></li>
        <li><a href="/mediawiki">Энциклопедия</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Магазин</h4>
      <ul>
        <li><a href="/product-category/cacti/">Кактусы</a></li>
        <li><a href="">Другие суккуленты</a>
        </li>
        <li><a href="">Композиции</a></li>
        <li><a href="">Посуда</a></li>
        <li><a href="">Книги</a></li>
        <li><a href="">Разное</a></li>
        <li><a href="">Сувениры</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <?php echo do_shortcode("[sp-signup listids='4364' email_label='Enter your email address' ]"); ?>

    </div>
  </div><!-- .site-info -->
  <a href="#" class="topbutton"></a>
</footer><!-- #colophon -->



<?php wp_footer(); ?>
</body>

</html>