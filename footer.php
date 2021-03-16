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
        <li><a href="/shop">Магазин</a></li>
        <li><a href="/forums">Форум</a></li>
        <li><a href="/gallery">Галерея</a></li>
        <li><a href="/mediawiki">Энциклопедия</a></li>
        <li><a href="/story">Статьи</a></li>
      </ul>
      <?php if (dynamic_sidebar('sidebar-footer1')) : else : endif; ?>
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
      <?php if (dynamic_sidebar('sidebar-footer2')) : else : endif; ?>
    </div>
    <div class="footer-col">
      <h4><?php esc_html_e('Support', 'cactus'); ?></h4>
      <ul>
        <li><a href="/contact"><?php esc_html_e('Contact Us', 'cactus') ?></a></li>
      </ul>

      <?php if (dynamic_sidebar('sidebar-footer3')) : else : endif; ?>
      <div class="footer-social-icons">
        <h4><?php esc_html_e('Follow us on', 'cactus'); ?></h4>
        <ul class="social-icons">
          <li><a href="https://www.facebook.com/cactuskiev" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/cactuskiev" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.youtube.com/channel/UC4Rbsf00LoHotQiVJ1YLjkg" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
          <li><a href="https://www.instagram.com/cactuskiev/" class="social-icon"> <i class="fa fa-instagram"></i></a></li>
          <li><a href="https://vk.com/cactuskiev" class="social-icon"> <i class="fa fa-vk"></i></a></li>
          <li><a href="https://www.cactuskiev.com.ua/feed" class="social-icon"> <i class="fa fa-rss"></i></a></li>

        </ul>
      </div>


    </div>

    <div class="footer-col">
      <?php if (dynamic_sidebar('sidebar-footer4')) : else : endif; ?>

    </div>
  </div><!-- .site-info -->
  <div class="copyright"><?php echo do_shortcode('[bws_google_captcha]'); ?></div>
  <a href="#" class="topbutton"></a>

</footer><!-- #colophon -->



<?php wp_footer(); ?>
</body>

</html>