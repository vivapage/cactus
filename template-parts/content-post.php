<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cactus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
			<div class="entry-meta">
				<?php
				cactus_posted_on();
				?>
				<div class="inline-share-tools">
					<a class="fa fa-facebook inline-share-btn" data-mobile_iframe="true" title="Share on facebook " href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
					<a class="fa fa-telegram inline-share-btn" data-mobile_iframe="true" title="Share on telegram " href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
					<a class="fa fa-twitter inline-share-btn" title="Share on twitter " href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
					<a class="fa fa-linkedin inline-share-btn" title="Share on linkedin " href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
					<a class="fa fa-whatsapp inline-share-btn" data-mobile_iframe="true" title="Share on whatsapp " href="whatsapp://send?text=<?php echo urlencode(get_the_title()); ?> <?php echo urlencode(get_permalink()); ?>"></a>
				</div>

			</div><!-- .entry-meta -->
			<div class="author-story">
				<?php
				the_field('author_story');
				?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php //cactus_post_thumbnail(); 
	?>


	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'cactus'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'cactus'),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cactus_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->