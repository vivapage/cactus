<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cactus
 */

?>
<article class="listing-item">
  <?php cactus_post_thumbnail(); ?>
  <header class="header">
    <?php

    the_title('<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');


    if ('post' === get_post_type()) :
    ?>
    <div class="entry-meta">
      <?php
        cactus_posted_on();
        ?>
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->



  <div class="excerpt">
    <?php the_excerpt(); ?>
  </div>

</article>

<!-- #post-<?php the_ID(); ?> -->