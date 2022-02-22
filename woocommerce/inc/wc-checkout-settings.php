<?php

add_filter( 'woocommerce_checkout_fields' , 'my_custom_fields' );
 
function my_custom_fields( $fields ) {
 
   unset($fields['billing']['billing_country']);
   unset($fields['billing']['billing_state']);
   unset($fields['billing']['billing_city']);
   unset($fields['billing']['billing_postcode']);
   unset($fields['billing']['billing_company']);
   unset($fields['billing']['billing_address_1']);
   unset($fields['billing']['billing_address_2']);
   unset($fields['order']['order_comments']);
   unset($fields['shipping']['shipping_country']);


   return $fields;
}
add_filter( 'woocommerce_default_address_fields' , 'not_req_adress_fields' );
 
function not_req_adress_fields( $address_fields ) {
$address_fields['address_1']['required'] = false; 
$address_fields['postcode']['required'] = false; 
$address_fields['city']['required'] = false;
$address_fields['country']['required'] = false;
$address_fields['address_2']['required'] = false;
$address_fields['state']['required'] = false;
 
return $address_fields;
}
