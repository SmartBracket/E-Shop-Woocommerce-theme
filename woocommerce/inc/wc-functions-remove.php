<?php
if(!defined('ABSPATH')){
   exit;
}
/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);

// wc-product-settings
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);

remove_action('woocommerce_before_single_product_summary','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);

remove_all_filters( 'woocommerce_after_single_product_summary');
remove_all_filters( 'woocommerce_single_product_summary');