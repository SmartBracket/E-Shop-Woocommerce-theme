<?php
/**
 * e-store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package e-store
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
// Подключение настроек темы
require get_template_directory() . '/inc/theme-settings.php';
// Подключение виджетов
require get_template_directory() . '/inc/widget-areas.php';
// Подключение скриптов и стилей
require get_template_directory() . '/inc/enqueue-script-style.php';
// cart-functions
require get_template_directory() . '/woocommerce/inc/wc-cart.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/woocommerce/inc/wc-functions-remove.php';
	require get_template_directory() . '/woocommerce/inc/wc-functions.php';
}


add_filter( 'wp_nav_menu_objects', 'style_menu_items', 10, 2 );
function style_menu_items( $items){
	// Делаем что-либо...
	foreach ($items as  $item ) {
		$item->classes[] ='header-navbar__item' ;
	}
	return $items;
}
