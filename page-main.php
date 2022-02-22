<?php
get_header();
?>

<section class="hero">
        <div class="container">
          <div class="hero-grid">
            <div class="big-baner">
              <div class="big-baner__list">
                 
                <?
                $slides = carbon_get_post_meta( get_the_ID(), 'hero_slider' );
                if($slides){
                 foreach( $slides as $slide ){
                    if( ! $slide[ 'photo' ] ) {
                      continue; // скипаем итерацию цикла, если нет фотки
                    }
                    $img_url = wp_get_attachment_image_url( $slide[ 'photo' ] ,'full');
                     ?>
              <img  class="big-baner__item" src="<?php echo $img_url; ?>">
              
              <?
                  }
                }
                ?>
             

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
<?php
	// Выполнение запроса по категориям и атрибутам
	$args = array(
	// Параметры отображения выведенных товаров
	'posts_per_page' => 15, // количество выводимых товаров
	'post_type' => 'product', // тип товара   
);
$count=0;

$loop = new WP_Query( $args );
if($loop->have_posts()):?>

  <section class="main__section news" onmouseenter="getSectionName(this)">
        <div class="container">
          <div class="showcase">
            <h2 class="showcase__title">Новинки</h2>
            <div class="showcase__list">
<? endif;          
while ( $loop->have_posts() ) : $loop->the_post();
global $product;
$posted=get_the_date('ynj');
$today=current_time( 'ynj' );
if($today-$posted<=5):
  $count++;
?>
<?wc_get_template_part( 'content', 'product' );?>
<? endif;?>
      <?php endwhile; ?>
      <!-- Сброс данных запроса -->
      <?php wp_reset_query(); ?>  
      </div>           
      </div>
      <?php if($count >6): ?>
      <div class="showcase-arrows">
         <div class="arrow__priv showcase-arrows__arrow arrow">
            <span class="arrow__line"></span>
         </div>
         <div class="arrow__next showcase-arrows__arrow_right arrow arrow_right">
            <span class="arrow__line"></span>
         </div>
      </div>  
      <?php endif; ?>
   </div>
  </section>
<?php
	$args = array(

	'posts_per_page' => 15,
	'post_type' => 'product', 
);
$count=0;
$loop = new WP_Query( $args );
if($loop->have_posts()):?>

  <section class="main__section news" onmouseenter="getSectionName(this)">
        <div class="container">
          <div class="showcase">
            <h2 class="showcase__title">Распродажа</h2>
            <div class="showcase__list">
<? endif; 
while ( $loop->have_posts() )  : $loop->the_post();
global $product;
if($product->is_on_sale()):
$count++;
?>
<?wc_get_template_part( 'content', 'product' );?>
      <?php endif; ?>
      <?php endwhile; ?>
      <!-- Сброс данных запроса -->
      <?php wp_reset_query(); ?>  
               </div>           
      </div>
      <?php if($count >6): ?>
      <div class="showcase-arrows">
         <div class="arrow__priv showcase-arrows__arrow arrow">
            <span class="arrow__line"></span>
         </div>
         <div class="arrow__next showcase-arrows__arrow_right arrow arrow_right">
            <span class="arrow__line"></span>
         </div>
      </div>  
      <?php endif; ?>
   </div>
</section>

<?php
get_footer();
?>
