@php
  /**
   * Login form
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see         https://docs.woocommerce.com/document/template-structure/
   * @package     WooCommerce\Templates
   * @version     7.1.0
   */
  
  if (!defined('ABSPATH')) {
      exit(); // Exit if accessed directly.
  }
  
  if (is_user_logged_in()) {
      return;
  }
@endphp

<form class="woocommerce-form woocommerce-form-login login" method="post" {!! $hidden ? 'style="display:none;"' : '' !!}>
  @php
    do_action('woocommerce_login_form_start');
  @endphp

  {!! $message ? wpautop(wptexturize($message)) : '' !!}

  <div class="pb-0.75">
    <label for="username">
      {!! esc_html_e('Username or email address', 'woocommerce') !!}&nbsp;<span class="required">*</span>
    </label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username"
      autocomplete="username" value="{{ !empty($_POST['username']) ? esc_attr(wp_unslash($_POST['username'])) : '' }}" />
  </div>
  <div class="pb-0.75">
    <label for="password">
      {!! esc_html_e('Password', 'woocommerce') !!}&nbsp;<span class="required">*</span>
    </label>
    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password"
      autocomplete="current-password" />
  </div>

  @php
    do_action('woocommerce_login_form');
  @endphp

  <div class="mt-1 flex flex-col sm:flex-row justify-between items-center">
    <div class="order-2 sm:order-1 mt-1 sm:mt-0">
      <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox"
        id="rememberme" value="forever" />
      <label for="rememberme"
        class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
        {!! esc_html_e('Remember me', 'woocommerce') !!}
      </label>
    </div>

    @php
      wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce');
    @endphp

    <button type="submit"
      class="order-1 sm:order-2 woocommerce-button button woocommerce-form-login__submit{{ esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '') }}"
      name="login" value="{!! esc_attr_e('Log in', 'woocommerce') !!}">
      {!! esc_html_e('Log in', 'woocommerce') !!}
    </button>
  </div>
  <footer class="mt-2 text-center">
    <a href="{!! esc_url(wp_lostpassword_url()) !!}">
      {!! esc_html_e('Lost your password?', 'woocommerce') !!}
    </a>
  </footer>

  <?php do_action('woocommerce_login_form_end'); ?>

</form>
