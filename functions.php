<?php

/**
 * bryhub-simple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bryhub-simple
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

function bryhub_simple_setup()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'bryhub-simple'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

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
add_action('after_setup_theme', 'bryhub_simple_setup');

function bryhub_simple_content_width()
{
	$GLOBALS['content_width'] = apply_filters('bryhub_simple_content_width', 640);
}
add_action('after_setup_theme', 'bryhub_simple_content_width', 0);

function bryhub_simple_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'bryhub-simple'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'bryhub-simple'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'bryhub_simple_widgets_init');

/**
 * Dequeue scripts and styles.
 */
function bryhub_simple_dequeue()
{
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}
bryhub_simple_dequeue();

/**
 * Enqueue scripts and styles.
 */
function bryhub_simple_scripts()
{
	wp_enqueue_style('bryhub-style-min', get_template_directory_uri() . '/build/styles.min.css');

	wp_enqueue_script('bryhub-simple-script-min', get_template_directory_uri() . '/build/index.min.js');
}
add_action('wp_enqueue_scripts', 'bryhub_simple_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
