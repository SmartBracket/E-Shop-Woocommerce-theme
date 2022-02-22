<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package e-store
 */

?>
</main>
</div> <!-- container -->
<footer class="footer">
        <div class="container">
          <div class="footer-grid">
            <div class="footer__logo logo">
              <a href="#" class="logo__link"
                ><img
                  class="logo__img"
                  src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/logo.svg"
                  alt="logo"
                />
                <p class="logo__text">Vidar</p>
              </a>
              <div class="footer__copy">© 2021<br />Интернет-аптека</div>
            </div>
            <nav class="footer_nav">
              <p class="footer-nav__title">Категории</p>
              <ul class="footer-nav__list">
              <?php 
              $product_categories = get_terms( [
                'taxonomy' =>'product_cat',
                
              ]);

     foreach ( $product_categories as $product_category ) {
       echo '<li class="footer-nav__item">' . '<a class="footer-nav__link" href="' . get_term_link( $product_category ) . '">'.$product_category->name . '</a></li>';
     }

               ?>
              </ul>
            </nav>
            <nav class="footer-nav">
              <p class="footer-nav__title">Клиентам</p>
              <ul class="footer-nav__list">
                <li class="footer-nav__item">
                  <a href="<?php echo get_page_link(67); ?>" class="footer-nav__link">Личный кабинет</a>
                </li>
                <li class="footer-nav__item">
                  <a href="#" class="footer-nav__link">О нас</a>
                </li>
                <li class="footer-nav__item">
                  <a href="#" class="footer-nav__link">Оплата и выкуп</a>
                </li>
                <li class="footer-nav__item">
                  <a href="#" class="footer-nav__link">Контактная информация</a>
                </li>
              </ul>
            </nav>
            <nav class="footer-nav">
              <p class="footer-nav__title">Контактная информация</p>
              <ul class="footer-nav__list">
                <li class="footer-nav__item tel">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/tel-icon.svg"
                    alt="telephone"
                    class="tel__img"
                  />
                  <a href="tel:0442845080" class="tel__number">044 284-50-80</a>
                </li>
                <li class="footer-nav__item mail">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/mail-icon.svg"
                    alt="mail"
                    class="mail__img"
                  />
                  <a href="mailto:e-mail@mail.ru" class="mail__link"
                    >e-mail@mail.ru</a
                  >
                </li>
                <li class="footer-nav__item geo">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/adres-icon.svg"
                    alt="position"
                    class="geo__img"
                  />
                  <p class="geo_adress">Г.Луганск 50 лет Октября 20</p>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
<?php wp_footer(); ?>

</body>
</html>
