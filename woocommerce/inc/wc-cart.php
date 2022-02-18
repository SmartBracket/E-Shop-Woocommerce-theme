<?php
if ( ! function_exists( 'e_store_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function e_store_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		e_store_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'e_store_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'e_store_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function e_store_woocommerce_cart_link() {
		?>
         <a class="basket__link" href="<?php echo wc_get_cart_url(); ?>">
           
            <div class="basket__wrap">
            
               <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/basket.svg"
                  alt="basket"
                  class="basket__img"
               />

               <span class="basket__count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
              </div>
              <p class="basket__text">Мой заказ</p>

         </a>
		<?php
	}
}

if ( ! function_exists( 'e_store_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function e_store_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php e_store_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
