<?php
if(!defined('ABSPATH')){
   exit;
}
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'e_store_styles' );
function e_store_styles() {
	wp_enqueue_style( 'e-store-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'e-store-styles', get_template_directory_uri() . '/assets/css/blocks/style.css');
	
	wp_style_add_data( 'e-store-style', 'rtl', 'replace' );
	
}


add_action( 'wp_enqueue_scripts', 'e_store_scripts' );
function e_store_scripts() {
	if(get_the_title() == 'Главная'){
		wp_enqueue_script( 'e-store-main-slider', get_template_directory_uri() . '/assets/js/showcase-slider.js', array(), _S_VERSION, true );
				wp_enqueue_script( 'e-store-main-show-product', get_template_directory_uri() . '/assets/js/card-show-details.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'e-store-main-hero-slider', get_template_directory_uri() . '/assets/js/big-baner.js', array(), _S_VERSION, true );
	}
	wp_enqueue_script( 'e-store-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}