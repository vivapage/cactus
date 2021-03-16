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
        <?php
        if ('post' === get_post_type()) {
          /* translators: used between list items, there is a space after the comma */
          $categories_list = get_the_category_list(esc_html__(', ', 'cactus'));
          if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-posts-links"><i class="fas fa-folder-open"></i> ' . esc_html__('%1$s') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          }

          /* translators: used between list items, there is a space after the comma */
          $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'cactus'));
          if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links"><i class="fas fa-tags"></i> ' . esc_html__('%1$s') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          }
        } ?>
      </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->



  <div class="excerpt">
    <?php the_excerpt(); ?>
  </div>

</article>

<!-- #post-<?php the_ID(); ?> -->