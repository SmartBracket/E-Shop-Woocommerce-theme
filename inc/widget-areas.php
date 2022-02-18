<?php
if(!defined('ABSPATH')){
   exit;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'e_store_widgets_init' );
function e_store_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'e-store' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'e-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Футер категории',
			'id'            => 'footer-cats',
			'before_sidebar' => '<ul class="footer-nav__list">',
			'after_sidebar'  => '</ul>',

			'before_widget' => '<li>',
			'after_widget'  => '</li>',

			'before_title'  => '<h1 class="footer-nav__title">',
			'after_title'   => '</h1>',
		)
	);
}

