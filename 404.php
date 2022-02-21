<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package e-store
 */

get_header();
?>

	<div class="container error">
		<h1 class="error__header">Упс!Страница не найдена!</h1>
		<p class="error__text"><a href="<? echo get_home_url(); ?>" class="error__link">Перейти на главную страницу</a></p>
		<img src="<? echo get_template_directory_uri(); ?>/assets/imgs/interface/stickers/404.png" alt="error" class="error__img">
	</div>


<?php
get_footer();
