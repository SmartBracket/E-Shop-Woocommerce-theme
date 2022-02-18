<?php
get_header();
?>

<section class="hero">
        <div class="container">
          <div class="hero-grid">
            <div class="big-baner">
              <div class="big-baner__list">
                 
                <?
                $image = get_field('hero_img_1');
                
                ?>
                <img width="100px" height="305" class="big-baner__item" src="<?php echo $image['url']; ?>"/>
               <?
                $image = get_field('hero_img_2');
                
                ?>
                <img width="100" height="305px" class="big-baner__item" src="<?php echo $image['url']; ?>"/>
              </div>
              <!-- arrows -->
              <div class="arrow__priv big-baner__arrow arrow">
                <span class="arrow__line"></span>
              </div>
              <div class="arrow__next big-baner__arrow_right arrow arrow_right">
                <span class="arrow__line"></span>
              </div>
            </div>
            
               <?$prod = get_field('product_hero1');
                  	$args = array(

	                  'posts_per_page' => 3,
	                  'post_type' => 'product',
                     'post__in' => array($prod[0],$prod[1],$prod[2]),

               );

               $loop = new WP_Query( $args );
               while ( $loop->have_posts() )  : $loop->the_post();
               global $product;
               // $product->get_price_html();
                     ?>
                     <div class="hero-card">
                     <div class="hero-card__info-block">
                <p class="hero-card__title"><? the_title();  ?></p>
               <? if($product->is_on_sale()):
               do_action( 'price_sale_none',$product);
                  else:?> <p class="hero-card__price"> <? echo $product->get_price_html();?> </p>
                <?
                endif;
                ?>
                <div class="hero-card__buttons">
                  <a class="hero-card__button-item button button_green" href="?add-to-cart=<? echo $product->id; ?>">
                    В корзину
                  </a>
                  <a class="hero-card__button-item button button_purple" href="<? echo get_permalink( $loop->post->ID ); ?>">
                    Подробнее
                  </a>
                </div>
              </div>
              <div class="hero-card__img-block">
                             <?php

            if (has_post_thumbnail( $loop->post->ID )): echo get_the_post_thumbnail($loop->post->ID, 'large',array(
               'class' => "hero-card__img",
            )
               ); 
            endif;
               ?>

              </div>
            </div>

                 <? 
                 endwhile;
               ?>
          </div>
        </div>
      </section>


<section class="main__section news" onmouseenter="getSectionName(this)">
        <div class="container">
          <div class="showcase">
            <h2 class="showcase__title">Новинки</h2>
            <div class="showcase__list">
<?php
	// Выполнение запроса по категориям и атрибутам
	$args = array(
	// Параметры отображения выведенных товаров
	'posts_per_page' => 12, // количество выводимых товаров
	'post_type' => 'product', // тип товара
   'product_tag' => 'new',
   
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
global $product;
?>

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
      <?php endwhile; ?>
      <!-- Сброс данных запроса -->
      <?php wp_reset_query(); ?>  
               </div>           
      </div>
      <div class="showcase-arrows">
         <div class="arrow__priv showcase-arrows__arrow arrow">
            <span class="arrow__line"></span>
         </div>
         <div class="arrow__next showcase-arrows__arrow_right arrow arrow_right">
            <span class="arrow__line"></span>
         </div>
      </div>  
   </div>
</section>


<section class="main__section sale" onmouseenter="getSectionName(this)">
        <div class="container">
          <div class="showcase">
            <h2 class="showcase__title">Распродажа</h2>
            <div class="showcase__list">
<?php
	$args = array(

	'posts_per_page' => 12,
	'post_type' => 'product', 
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() )  : $loop->the_post();
global $product;
if($product->is_on_sale()):
?>

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
      <?php endif; ?>
      <?php endwhile; ?>
      <!-- Сброс данных запроса -->
      <?php wp_reset_query(); ?>  
               </div>           
      </div>
      <div class="showcase-arrows">
         <div class="arrow__priv showcase-arrows__arrow arrow">
            <span class="arrow__line"></span>
         </div>
         <div class="arrow__next showcase-arrows__arrow_right arrow arrow_right">
            <span class="arrow__line"></span>
         </div>
      </div>  
   </div>
</section>

<?php
get_footer();
?>
