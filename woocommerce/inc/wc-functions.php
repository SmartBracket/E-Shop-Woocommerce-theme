<?php 

// подключить редактирование цены
require get_template_directory() . '/woocommerce/inc/wc-price-settings.php';
require get_template_directory() . '/woocommerce/inc/wc-product-settings.php';
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = 'руб.'; break;
     }
     return $currency_symbol;
}
function my_custom_sale_flash($text, $post, $_product) {
   return '';
}
add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
