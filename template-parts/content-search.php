<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package e-store
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			e_store_posted_on();
			e_store_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php e_store_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php e_store_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

 <div class="showcase__card card">
                <a href="#" class="card__link">
                  <div class="card__img-block">
                    <img
                      src="media/items/urolesan.png"
                      alt="urolesan"
                      class="card__img"
                    />
                  </div>

                  <p class="card__title">Уролесан 40 капсул</p>
                  <p class="card__price">150 руб.</p>
                </a>
                <div class="card__ditails card__ditails_hiden">
                  <a href="#" class="card__but button button_green">
                    В корзину
                  </a>
                  <a href="#" class="card__but button button_purple">
                    Подробнее
                  </a>
                </div>
            </div>