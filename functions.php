<?php

/**
 * cactus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cactus
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('cactus_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cactus_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cactus, use a find and replace
		 * to change 'cactus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('cactus', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('post-thumbnail', 300, 0, false);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'cactus'),
				'social' => esc_html__('Social Menu', 'cactus'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cactus_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'cactus_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cactus_content_width()
{
	$GLOBALS['content_width'] = apply_filters('cactus_content_width', 640);
}
add_action('after_setup_theme', 'cactus_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cactus_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'cactus'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'cactus'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'cactus_widgets_init');

// Register Sidebars
function custom_sidebars()
{

	$args = array(
		'id'            => 'sidebar-frontleft',
		'name'          => __('Front_left', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-frontright',
		'name'          => __('Front_right', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-woo',
		'name'          => __('Woo sidebar', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-vendor',
		'name'          => __('Vendor sidebar', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-store',
		'name'          => __('Store sidebar', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<aside class="widget dokan-store-widget %s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title dokan">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-spravochnik',
		'name'          => __('Spravochnik sidebar', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-footer1',
		'name'          => __('Footer sidebar 1', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<aside class="widget footer-widget %s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title footer">',
		'after_title'   => '</h4>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-footer2',
		'name'          => __('Footer sidebar 2', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<aside class="widget footer-widget %s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title footer">',
		'after_title'   => '</h4>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-footer3',
		'name'          => __('Footer sidebar 3', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<aside class="widget footer-widget %s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title footer">',
		'after_title'   => '</h4>',
	);
	register_sidebar($args);

	$args = array(
		'id'            => 'sidebar-footer4',
		'name'          => __('Footer sidebar 4', 'cactus'),
		'description'   => esc_html__('Add widgets here.', 'cactus'),
		'before_widget' => '<aside class="widget footer-widget %s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title footer">',
		'after_title'   => '</h4>',
	);
	register_sidebar($args);
}
add_action('widgets_init', 'custom_sidebars');


/**
 * Enqueue scripts and styles.
 */
function cactus_scripts()
{
	wp_enqueue_style('cactus-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('cactus-style', 'rtl', 'replace');


	wp_enqueue_script('cactus-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'cactus_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions clean element.
 */
require get_template_directory() . '/inc/template-clean.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);

	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


add_filter('widget_text', 'do_shortcode');

function my_product_block($html, $data, $product)
{
	$html = '<li class="wc-block-grid__product">
			<div class="image-wrap">
					<a href="' . $data->permalink . '" class="wc-block-grid__product-link">' . $data->image . '</a>
					' . $data->button . '
			</div>
			<h3><a href="' . $data->permalink . '">' . $data->title . '</a></h3>
			' . $data->badge . '
			' . $data->price . '
			' . $data->rating . '
	</li>';
	return $html;
}
add_filter('woocommerce_blocks_product_grid_item_html', 'my_product_block', 10, 3);

add_filter('woocommerce_currency_symbol', 'change_uah_currency_symbol', 10, 2);
function change_uah_currency_symbol($currency_symbol, $currency)
{
	switch ($currency) {
		case 'UAH':
			$currency_symbol = 'грн.';
			break;
	}
	return $currency_symbol;
}

//Custom login page
function clp_login_head()
{

	echo '<style>'; //Begin custom styles
	echo '.login #nav a, .login #backtoblog a { color: #006000 !important; }'; //Login page link color
	echo '.login h1 a { background:url("' . get_bloginfo('stylesheet_directory') . '/images/logo.svg"); width: 190px; height: 180px; }'; //Login page logo
	echo '.login .button-primary { background:#; border-color:#006000; }'; //Login page button color
	echo '</style>'; //End custom styles

}
add_action('login_head', 'clp_login_head');

function custom_login_url()
{
	return 'https://www.cactuskiev.com.ua/';
}
add_filter('login_headerurl', 'custom_login_url');

function cactus_logout_redirect($logouturl, $redir)
{
	return $logouturl . '&amp;redirect_to=' . get_permalink();
}
add_filter('logout_url', 'cactus_logout_redirect', 10, 2);

add_filter('post_class', 'remove_hentry_function', 20);

function remove_hentry_function($classes)
{
	if (($key = array_search('hentry', $classes)) !== false)
		unset($classes[$key]);
	return $classes;
}

function new_excerpt_length($length)
{
	return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');

function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
	return $excerpt;
}

function print_menu_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array('name' => null,), $atts));
	return wp_nav_menu(array('menu' => $name, 'echo' => false));
}
add_shortcode('menu', 'print_menu_shortcode');

function is_subpage()
{
	global $post;

	if (is_page() && $post->post_parent) {
		return $post->post_parent;
	}
	return false;
}

function gb_gutenberg_admin_styles()
{
	echo '
			<style>
					/* Main column width */
					.wp-block {
							max-width: 1080px;
					}

					/* Width of "wide" blocks */
					.wp-block[data-align="wide"] {
							max-width: 1080px;
					}

					/* Width of "full-wide" blocks */
					.wp-block[data-align="full"] {
							max-width: none;
					}	
			</style>
	';
}

add_action('admin_head', 'gb_gutenberg_admin_styles');

function paul_guten_block_editor_assets()
{
	wp_enqueue_style(
		'paul-editor-style',
		get_stylesheet_directory_uri() . "/editor.css",
		array(),
		'1.0'
	);
}
add_action('enqueue_block_editor_assets', 'paul_guten_block_editor_assets');

function my_scripts_method()
{
	wp_enqueue_script(
		'custom-script',
		get_stylesheet_directory_uri() . '/js/topbutton.js',
		array('jquery')
	);
}

add_action('wp_enqueue_scripts', 'my_scripts_method');
