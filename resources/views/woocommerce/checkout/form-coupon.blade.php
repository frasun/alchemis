@php
  /**
   * Checkout coupon form
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 7.0.1
   */
  
  defined('ABSPATH') || exit();
  
  if (!wc_coupons_enabled()) {
      // @codingStandardsIgnoreLine.
      return;
  }
@endphp

<div class="woocommerce-form-coupon-toggle">
  {!! wc_print_notice(
      apply_filters(
          'woocommerce_checkout_coupon_message',
          esc_html__('Have a coupon?', 'woocommerce') .
              ' <a href="#" class="showcoupon">' .
              esc_html__('Click here to enter your code', 'woocommerce') .
              '</a>',
      ),
      'notice',
  ) !!}
</div>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

  <p>
    {!! esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce') !!}
  </p>

  <div class="flex flex-wrap items-start justify-center">
    <div class="mr-1 pb-1 lg:pb-0">
      <label for="coupon_code" class="screen-reader-text">
        {!! esc_html_e('Coupon:', 'woocommerce') !!}
      </label>
      <input type="text" name="coupon_code" class="input-text" placeholder="{!! esc_attr_e('Coupon code', 'woocommerce') !!}" id="coupon_code"
        value="" />
    </div>

    <button type="submit" class="shrink-0 button button-sm{!! esc_attr(
        wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '',
    ) !!}" name="apply_coupon"
      value="{!! esc_attr_e('Apply coupon', 'woocommerce') !!}">
      {!! esc_html_e('Apply coupon', 'woocommerce') !!}
    </button>
  </div>
</form>
