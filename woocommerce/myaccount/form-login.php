<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
		<div class="acc">
         <div class="acc__block">
				<h2 class="acc__title">Вход</h2>
				<form class="acc__form" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			   <label for="username" class="acc__label">Имя пользователя или Email
         		<span class="acc__required">*</span>
            </label>
            <input type="text" class="acc__input" name="username"/>
				 <label for="password" class="acc__label"
                >Пароль
                <span class="acc__required">*</span>
              </label>
              <input type="password" class="acc__input" name="password" id="password" autocomplete="current-password"/>

			<?php do_action( 'woocommerce_login_form' ); ?>

					<div class="acc__remember">
                	<input name="rememberme" type="checkbox" class="acc__checkbox" id="rememberme" value="forever"/>
                	<label for="rememberme">Запомнить меня</label>
              	</div>

				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				

				   <button type="submit" name="login" class="acc__but button">Войти</button>
              	<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="acc__forgot-pas">Забыли пароль?</a>
            </form>
          </div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

		 <div class="acc__or">или</div>

	  		<div class="acc__block">
				<h2 class="acc__title">Регистрация</h2>

				<form class="acc__form" method="post" <?php do_action( 'woocommerce_register_form_tag' ); ?>>

			<?php do_action( 'woocommerce_register_form_start' ); ?>


			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
			<label for="reg_username" class="acc__label">Имя пользователя
         		<span class="acc__required">*</span>
            </label>
            <input type="text" class="acc__input" id="reg_username" name="username">
			<?php endif; ?>


			<label for="reg_email" class="acc__label">
				Email
                <span class="acc__required">*</span> 
         </label>
			<input type="email" id="reg_email" class="acc__input" name="email" autocomplete="email"/>	

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>	
			<label for="reg_password" class="acc__label">Пароль
            <span class="acc__required">*</span>
         </label>
         <input type="password" id="reg_password" class="acc__input" name="password" id="reg_password" autocomplete="current-password" autocomplete="new-password"/>
			<?php else : ?>
			
			<p class="acc__info">
         Ссылка для установки нового пароля будет отправлена ​​на ваш адрес электронной почты.
         </p>
<?php endif; ?>
		<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
			<button type="submit" name="register" class="acc__but button">Регистрация</button>

<?php do_action( 'woocommerce_register_form_end' ); ?>
   	

      </form>
   </div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

             
             

         
