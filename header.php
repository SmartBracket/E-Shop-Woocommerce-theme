<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package e-store
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
  <body>
    <header class="header">
      <div class="container">
        <div class="header-grid">
          <div class="header__logo logo">
            <a href="<?php echo get_home_url( );?>" class="logo__link"
              ><img
                class="logo__img"
                src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/logo.svg"
                alt="logo"
              />
              <p class="logo__text">Vidar</p>
            </a>
          </div>
          <div class="header__tel tel">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/tel-icon.svg"
              alt="telephone"
              class="tel__img"
            />
            <a href="tel:0442845080" class="tel__number">044 284-50-80</a>
            <a href="tel:0442845080" class="tel__number">
              <p class="tel__request">Заказать звонок</p>
            </a>
          </div>
          <form role="search" method="get" action="<?php esc_url( home_url( '/' ) );  ?>" class="header__search">
            <input
              type="search"
              value="<?php get_search_query(); ?>"
              placeholder="поиск товара"
              name="s"
            />
            <input type="submit" hidden>
          </form>

          <div class="header__soc soc">
            <p class="soc__text">Мы в соц. сетях:</p>
            <ul class="soc__list">
              <li class="soc__item">
                <a href="#" class="soc__link"
                  ><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/vk-icon.svg"
                    alt="vkontakte"
                    class="soc__img"
                /></a>
              </li>

              <li class="soc__item">
                <a href="#" class="soc__link"
                  ><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/tg-icon.svg"
                    alt="telegram"
                    class="soc__img"
                /></a>
              </li>
              <li class="soc__item">
                <a href="#" class="soc__link"
                  ><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/interface/icons/inst-icon.svg"
                    alt="instagram"
                    class="soc__img"
                /></a>
              </li>
            </ul>
          </div>
          <p class="header__work-time">
            График работы:<br />Будние: 10:00–19:00<br />Сб: 12:00–18:00
          </p>
          <div class="header__basket basket">
            <?php e_store_woocommerce_cart_link(); ?>
          

       
            
          </div>
        </div>
      </div>
      
      
      <nav class="header-navbar">
        <div class="container header-navbar__container">
				 
<?php
wp_nav_menu(
	array(
		'theme_location' => 'menu-1',
		'menu_id'        => 'primary-menu',
    'container'      =>  null,
    'menu_id'        => null,
    'menu_class'     => 'header-navbar__menu ',
			)
		);
			

?> 
          <!-- profile -->
          <div class="header-navbar__profile">
            <div class="header-navbar__item">
              <a href="<? echo get_page_link(67); ?>" class="header-navbar__link">
              <? if(is_user_logged_in()){
                echo 'Профиль';
              }else{
                echo 'Вход/Регистрация';
              } ?></a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main class="main__section">