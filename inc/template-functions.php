<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cactus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cactus_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'cactus_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cactus_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'cactus_pingback_header');


// Register Custom Post Type
function news_post_type()
{

	$labels = array(
		'name'                  => _x('News', 'Post Type General Name', 'cactus'),
		'singular_name'         => _x('News', 'Post Type Singular Name', 'cactus'),
		'menu_name'             => __('News', 'cactus'),
		'name_admin_bar'        => __('News', 'cactus'),
		'archives'              => __('News Archives', 'cactus'),
		'attributes'            => __('News Attributes', 'cactus'),
		'parent_item_colon'     => __('Parent News:', 'cactus'),
		'all_items'             => __('All News', 'cactus'),
		'add_new_item'          => __('Add New News', 'cactus'),
		'add_new'               => __('Add New News', 'cactus'),
		'new_item'              => __('New News', 'cactus'),
		'edit_item'             => __('Edit News', 'cactus'),
		'update_item'           => __('Update News', 'cactus'),
		'view_item'             => __('View News', 'cactus'),
		'view_items'            => __('View News', 'cactus'),
		'search_items'          => __('Search News', 'cactus'),
		'not_found'             => __('Not found', 'cactus'),
		'not_found_in_trash'    => __('Not found in Trash', 'cactus'),
		'featured_image'        => __('Featured Image', 'cactus'),
		'set_featured_image'    => __('Set featured image', 'cactus'),
		'remove_featured_image' => __('Remove featured image', 'cactus'),
		'use_featured_image'    => __('Use as featured image', 'cactus'),
		'insert_into_item'      => __('Insert into item', 'cactus'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'cactus'),
		'items_list'            => __('Items list', 'cactus'),
		'items_list_navigation' => __('Items list navigation', 'cactus'),
		'filter_items_list'     => __('Filter items list', 'cactus'),
	);
	$args = array(
		'label'                 => __('News', 'cactus'),
		'description'           => __('News Description', 'cactus'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('news', $args);
}
add_action('init', 'news_post_type', 0);

function cactus_archive_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	}

	return $title;
}

add_filter('get_the_archive_title', 'cactus_archive_title');