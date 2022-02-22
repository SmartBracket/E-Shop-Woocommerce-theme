<?php
add_action('woocommerce_before_main_content','add_archive_sidebar',5);

function add_archive_sidebar(){
     if(!is_product()){
   ?>
 
   <div class="container">
   <ul class="sidebar-cat">
   <h2 class="sidebar-cat__title">Категории</h2>
   <? wp_list_categories(array(
      'depth' => 2,
      'taxonomy' => 'product_cat',
      'title_li'           =>'',

   ))?>
   </ul>
   <div class="content" style="margin-left:320px;">
   <?
   
   }
}

remove_all_actions( 'woocommerce_archive_description' );
remove_all_actions( 'woocommerce_before_shop_loop');

add_action('woocommerce_before_shop_loop','add_result_count',20);
function add_result_count(){
   ?>
  <? woocommerce_catalog_ordering();?>
   <?
}