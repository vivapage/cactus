<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package cactus
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function cactus_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 298,
			'single_image_width'    => 400,
			'product_grid'          => array(
				'default_rows'    => 5,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'cactus_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function cactus_woocommerce_scripts()
{
	wp_enqueue_style('cactus-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('cactus-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'cactus_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function cactus_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'cactus_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function cactus_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'cactus_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('cactus_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function cactus_woocommerce_wrapper_before()
	{
?>
		<main id="primary" class="site-main">
		<?php
	}
}
add_action('woocommerce_before_main_content', 'cactus_woocommerce_wrapper_before');

if (!function_exists('cactus_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function cactus_woocommerce_wrapper_after()
	{
		?>
		</main><!-- #main -->
	<?php
	}
}
add_action('woocommerce_after_main_content', 'cactus_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'cactus_woocommerce_header_cart' ) ) {
			cactus_woocommerce_header_cart();
		}
	?>
 */

if (!function_exists('cactus_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function cactus_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		cactus_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'cactus_woocommerce_cart_link_fragment');

if (!function_exists('cactus_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */

	function cactus_woocommerce_cart_link()
	{
	?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'cactus'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'cactus'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?> </span>
		</a>
	<?php
	}
}

if (!function_exists('cactus_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function cactus_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php cactus_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
	<?php
	}
}


/*
Show Store name on the product thumbnail For Dokan Multivendor plugin 
https://nayemdevs.com/display-vendor-name/
*/

add_action('woocommerce_after_shop_loop_item_title', 'sold_by', 9);
function sold_by()
{
	?>
	</a>
	<?php
	global $product;
	$seller = get_post_field('post_author', $product->get_id());
	$author  = get_user_by('id', $seller);
	$vendor = dokan()->vendor->get($seller);

	$store_info = dokan_get_store_info($author->ID);
	if (!empty($store_info['store_name'])) { ?>

		<span class="details-loop">
			<?php esc_html_e('Vendor:', 'dokan-lite') . printf(': <a href="%s">%s</a>', $vendor->get_shop_url(),  $vendor->get_shop_name()); ?>
		</span>
	<?php
	}
}

add_action('woocommerce_single_product_summary', 'seller_name_on_single', 40);
function seller_name_on_single()
{
	global $product;
	$seller = get_post_field('post_author', $product->get_id());
	$author  = get_user_by('id', $seller);

	$store_info = dokan_get_store_info($author->ID);

	if (!empty($store_info['store_name'])) { ?>
		<div class="product_vendor">
			<?php esc_html_e('Vendor:', 'dokan-lite') . printf(': <a href="%s">%s</a>', dokan_get_store_url($author->ID), $author->display_name); ?>
		</div>
	<?php
	}
}

function woocommerce_template_loop_product_title()
{
	echo '<h3 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h3>';
}

// Remove the product rating display on product loops
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);

function new_loop_shop_per_page($products)
{
	// Return the number of products you wanna show per page.
	$products = 24;
	return $products;
}

add_filter('woocommerce_post_class', 'remove_post_class', 21, 3); //woocommerce use priority 20, so if you want to do something after they finish be more lazy
function remove_post_class($classes)
{
	if ('product' == get_post_type()) {
		$classes = array_diff($classes, array('last', 'first'));
	}
	return $classes;
}

add_action('woocommerce_before_shop_loop_item_title', function () {
	global $product;
	if (!$product->is_in_stock()) {
		echo '<span class="now_sold">' . __('Out of stock', 'woocommerce') . '</span>';
	}
});

add_action('woocommerce_before_single_product_summary', function () {
	global $product;
	if (!$product->is_in_stock()) {
		echo '<span class="now_sold">' . __('Out of stock', 'woocommerce') . '</span>';
	}
});


remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
add_action('woocommerce_shop_loop_subcategory_title', 'custom_woocommerce_template_loop_category_title', 10);
function custom_woocommerce_template_loop_category_title($category)
{
	?>
	<div class="woocommerce-loop-category-text">
		<h4 class="woocommerce-loop-category__title">
			<?php
			echo $category->name;

			if ($category->count > 0) {
				echo apply_filters('woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category);
			}
			?>
		</h4>
	</div>
<?php
}



add_filter('product_type_selector', 'misha_remove_grouped_and_external');

function misha_remove_grouped_and_external($product_types)
{

	unset($product_types['grouped']);
	unset($product_types['external']);
	unset($product_types['variable']);

	return $product_types;
}

add_filter('product_type_options', function ($options) {

	// remove "Virtual" checkbox
	if (isset($options['virtual'])) {
		unset($options['virtual']);
	}

	// remove "Downloadable" checkbox
	if (isset($options['downloadable'])) {
		unset($options['downloadable']);
	}

	return $options;
});

$postType = "product";

add_action("save_post_" . $postType, function ($post_ID, \WP_Post $post, $update) {

	if (!$update) {
		// default values for new products
		update_post_meta($post->ID, "_manage_stock", "yes");
		update_post_meta($post->ID, "_stock", 1);
		return;
	}
	// here, operations for updated products
}, 10, 3);
