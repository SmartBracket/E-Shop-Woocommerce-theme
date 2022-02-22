<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$posted=get_the_date('ynj');
$today=current_time( 'ynj' );
?>

<div class="card-container">
      
	<div class="showcase__card card">
		<a class="card__link" href="<?php echo get_permalink( $loop->post->ID ) ?>">
		  <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
         <div class="card__img-block">
            <?php

            if (has_post_thumbnail( $loop->post->ID )): echo get_the_post_thumbnail($loop->post->ID, 'large',array(
               'class' => "card__img",
            )
               ); ?>
            <?php else : echo '<img class="card__img" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'?>
            <?php endif; ?> 
         </div>
         <p class="card__title"><?php the_title(); ?></p>
         <p class="card__price"><?php echo $product->get_price_html(); ?></p>
        <?php  ?>
      </a>
		<div class="card__ditails card__ditails_hiden">
         <a href="?add-to-cart=<? echo $product->id; ?>" class="card__but button button_green">
           В корзину
         </a>
         <a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="card__but button button_purple">
            Подробнее
         </a>
				
		</div>   
 
   </div>
      <? if($today-$posted<=5): ?>
      <div class="card__sticker_new"></div>
      <? endif;?>
      <? if($product->is_on_sale()): ?>
      <div class="card__sticker_sale"></div>
      <? endif;?>
   </div>
   

   