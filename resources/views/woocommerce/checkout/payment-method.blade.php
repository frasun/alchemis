@php
  /**
   * Output a single payment method
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see         https://docs.woocommerce.com/document/template-structure/
   * @package     WooCommerce\Templates
   * @version     3.5.0
   */
  
  if (!defined('ABSPATH')) {
      exit();
  }
@endphp

<li class="wc_payment_method payment_method_{!! esc_attr($gateway->id) !!}">
  <input id="payment_method_{!! esc_attr($gateway->id) !!}" type="radio" class="input-radio" name="payment_method"
    value="{!! esc_attr($gateway->id) !!}" {{ checked($gateway->chosen, true) }}
    data-order_button_text="{!! esc_attr($gateway->order_button_text) !!}" />

  <label for="payment_method_{!! esc_attr($gateway->id) !!}">
    {!! $gateway->get_title() !!}
  </label>
  @if ($gateway->has_fields() || $gateway->get_description())
    <div class="payment_box payment_method_{!! esc_attr($gateway->id) !!}">
      {!! $gateway->payment_fields() !!}
    </div>
  @endif
</li>
