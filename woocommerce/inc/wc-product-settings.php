<?php
//  настройка хлебных крошек

add_action('woocommerce_before_single_product_summary','woocommerce_output_content_wrapper',10);
function woocommerce_output_content_wrapper(){
   ?>
   <section class="poduct">
   <?
}




add_action( 'woocommerce_breadcrumb_defaults', 'change_breadcrumb',5);
function change_breadcrumb(){
   return array(
		'delimiter'   => ' &raquo; ',
		'wrap_before' => '<nav class="breadcrumb">',
		'wrap_after'  => '</nav>   ',
		'before'      => '<span class="breadcrumb__current">',
		'after'       => '</a>',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
   );
}


add_action('woocommerce_single_product_summary','left_block',10);
function left_block(){
   ?>
   <div class="product__left-block">
      <div class="product__image-block"><?woocommerce_show_product_images();?></div>
               <div class="product__add-to-basket">
              <div class="product__add-to-basket-count">
                <p class="product__add-to-basket-title">Количетсво</p>
                <div class="product__add-to-basket-input-block">
                  <div class="product__add-to-basket-circle reduce">-</div>
                  <?woocommerce_template_single_add_to_cart();?>

                  <div class="product__add-to-basket-circle add">+</div>
                </div>
              </div>
              
            </div>

    <?php if(is_user_logged_in()):
        comment_form();
    else:
    ?>
    <div class="comments" style="text-align:center;"><a href="<? echo get_page_link(67); ?>" style="color:black;">Авторизуйтесь что бы оставить комментарий</a></div>
    
     <?php
    endif;  ?>

 <? comments_template();?>
 
  </div>
   <?
}
add_action('woocommerce_single_product_summary','right_block',20);
function right_block(){
  
   ?>

<div class="product__info-block">

   <?woocommerce_breadcrumb(); ?>
   <?woocommerce_template_single_title(); ?>

  <div class="product__price"><?woocommerce_template_single_price(); ?></div>
   <?woocommerce_template_single_rating(); ?>
   <div class="product__excerpt"> <? the_excerpt(); ?></div>
  <? if(get_field('состав') || get_field('рекомендации_по_применению') || get_field('противопоказания') || get_field('способ_применения_и_дозы')): ?>


<? $conts = carbon_get_post_meta( get_the_ID(), 'info-box' );
    if($conts){
      $first=true;
      ?>
  <div class="product__info-panel info-panel">
    
      <div class="info-panel__names-block">


               <?   foreach( $conts as $key=>$cont ){
                    if( ! $cont[ 'info-title' ] ) {
                      continue;
                    }
                    if($first){
                      $first=false;
                       ?><div class="info-panel__names-item info-panel__names-item_active"><?
                    }else{
                        ?><div class="info-panel__names-item"><?
                    }
                ?>
                <span class="info-panel__names-item-title"><?echo $cont['info-title'];?></span>
                <div class="info-panel__names-item-content-hiden"><?echo $cont['info-content'];?></div>
                 </div>
              <?
                  }
                }
                ?>            
      </div>
      <div class="info-panel__content-block"></div>         
  </div>
  <? endif; ?>
   <?woocommerce_output_related_products(); ?>
</div>

   <?
}




function mytheme_comment($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>

      <li <?php comment_class(); ?>>
		
		
<div class="comment-block">  
		  
		
<div class="comment-info">
            <?php echo get_avatar($comment,$size='45');?>
            <div class="comment-info__author">
             <?comment_author();?>
            </div>
           
             
            
</div>
  
		  
<?php if ($comment->comment_approved == '0') : ?>

<em><?php _e('Your comment is awaiting moderation.') ?></em>
<br/>
<?php endif; ?>
  
 
<div class="comment-content">  
							  
<?php comment_text() ?>
<div class="comment-content__date">  <?comment_date();?>  </div>
		  
</div>	

</div>  
		
  <?php }


// звёзды
add_filter( 'comment_author', 'comm_rating_display_rating');
function comm_rating_display_rating( $comment_text ){
if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
$stars = '<div class="com_star">';
for ( $i = 1; $i <= $rating; $i++ ) {$stars .= '<span class="dashicons dashicons-star-filled"></span>';}
$stars .= '</div>';
$comment_text = $comment_text . $stars ;
return $comment_text;
} else {return $comment_text;}
}
add_filter('woocommerce_product_get_rating_html', 'your_get_rating_html', 10, 2);
  function your_get_rating_html($rating_html, $rating) {
    if ( $rating > 0 ) {
      $title = sprintf( __( 'Оценка %s из 5', 'woocommerce' ), $rating );
    } else {
      $title = 'Еще не оценено';
      $rating = 0;
    }
    $rating_html  = '<div class="star-rating" title="' . $title . '">';
    $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . __( 'из 5', 'woocommerce' ) . '</span>';
    $rating_html .= '</div>';
    return $rating_html;
  }

// звёзды в форму
add_action( 'comment_form_logged_in_after', 'ci_comment_rating_rating_field' );
add_action( 'comment_form_after_fields', 'ci_comment_rating_rating_field' );
function ci_comment_rating_rating_field () {
     ?>
      
<fieldset class="comments-rating">
          <span class="rating-container">
               <?php for ( $i = 5; $i >= 1; $i--) : ?>
                    <input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
               <?php endfor; ?>
                <input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
          </span>
     </fieldset>
 
     <?php
}
add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
function ci_comment_rating_save_comment_rating( $comment_id ) {
     if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
     $rating = intval( $_POST['rating'] );
     add_comment_meta( $comment_id, 'rating', $rating );
}

// настройка формы при неавторизованом пользователе
function comment_hide_checkcdpr( $fields ) {
    unset( $fields['cookies'] );
    unset($fields['url']);
    $fields['author'] = '<p class="comment-form-author" style="text-align:center;"><label for="author">Имя <span class="required">*</span></label> <input class="comment__author" id="author" name="author" type="text" value="" size="30" maxlength="245" required="required" /></p>';
    $fields['email'] = '<p class="comment-form-email" style="text-align:center;"><label for="email">E-mail <span class="required">*</span></label> <input class="comment__email" id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required" /></p>';
    return $fields;
}
add_filter( 'comment_form_default_fields', 'comment_hide_checkcdpr' );



function wph_comments_form($default) {
    $default['logged_in_as'] = '';
    $default['comment_notes_before'] = '';
    $default['comment_field'] = '<textarea id="comment" class="comment__field" name="comment" cols="45" rows="8" maxlength="1000" required></textarea>';
    $default['submit_field'] = '<input class="comment__submit button submit" name="submit" type="submit" id="submit" value="Отправить комментарий"><input type="hidden" name="comment_post_ID" value="90" id="comment_post_ID"><input type="hidden" name="comment_parent" id="comment_parent" value="0">';
    return $default;
} 
add_filter('comment_form_defaults','wph_comments_form',1);