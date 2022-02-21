<?php
// удалить цену без скидки на витрине
add_action('price_sale_none','price_sale_none_fun');
function price_sale_none_fun($obj){

	add_filter( 'woocommerce_format_sale_price', 'my_format_sale_price', 10, 2);
	echo $obj->get_price_html();
	remove_filter( 'woocommerce_format_sale_price','my_format_sale_price' );
}
function my_format_sale_price($price, $sale_price){
	$price = ' <p class="hero-card__price">' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</p>';
	return  $price;

}