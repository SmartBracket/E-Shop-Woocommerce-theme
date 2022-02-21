<?php if ( post_password_required() ) 
{ return; }
?>

<div class="comments">
<?php if ( have_comments() ) : ?>


  

<h2 class="comments-title">
<?php printf( 'Отзывы '. get_comments_number()  ); ?>
</h2>



		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
				    'callback' => 'mytheme_comment'
				) );
			?>
		</ol>

<?php 
else: ?>
<h2 style="text-align: center;">Пока нет отзывов</h2>
<?php endif; ?>
</div>


