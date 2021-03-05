<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cactus
 */

get_header();
?>

<main id="primary" class="site-main">

  <?php if (have_posts()) : ?>

  <header class="page-header">
    <?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
  </header><!-- .page-header -->
  <div class="display-posts-listing grid">
    <?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content-cat', get_post_type());

			endwhile;


			?>
  </div>
  <?php

		$args = array(
			'show_all'     => false, // показаны все страницы участвующие в пагинации
			'end_size'     => 3,     // количество страниц на концах
			'mid_size'     => 3,     // количество страниц вокруг текущей
			'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
			'prev_text'    => "&#8592;",
			'next_text'    => "&#8594;",
			'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
			'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
			'screen_reader_text' => __('Posts navigation'),
		);
		the_posts_pagination($args);
	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();