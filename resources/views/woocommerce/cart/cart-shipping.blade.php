@php
  /**
   * Shipping Methods Display
   *
   * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 3.6.0
   */
  
  defined('ABSPATH') || exit();
  
  $formatted_destination = isset($formatted_destination) ? $formatted_destination : WC()->countries->get_formatted_address($package['destination'], ', ');
  $has_calculated_shipping = !empty($has_calculated_shipping);
  $show_shipping_calculator = !empty($show_shipping_calculator);
  $calculator_text = '';
@endphp

<div class="woocommerce-shipping-totals shipping{{ !is_cart() ? ' mt-4' : '' }}">
  <h3 class="pb-1">{!! wp_kses_post($package_name) !!}</h3>
  @if ($available_methods)
    <ul id="shipping_method" class="woocommerce-shipping-methods">
      @foreach ($available_methods as $method)
        <li>
          @if (1 < count($available_methods))
            <input type="radio" name="shipping_method{!! $index !!}" data-index="{!! $index !!}"
              id="shipping_method_{!! $index !!}_{!! esc_attr(sanitize_title($method->id)) !!}" value="{!! esc_attr($method->id) !!}"
              class="shipping_method" {{ checked($method->id, $chosen_method, false) }} />
          @else
            <input type="radio" name="shipping_method{!! $index !!}" data-index="{!! $index !!}"
              id="shipping_method_{!! $index !!}_{!! esc_attr(sanitize_title($method->id)) !!}" value="{!! esc_attr($method->id) !!}"
              class="shipping_method" />
          @endif

          <label for="shipping_method_{!! $index !!}_{!! esc_attr(sanitize_title($method->id)) !!}">
            {!! wc_cart_totals_shipping_method_label($method) !!}
          </label>

          @php
            do_action('woocommerce_after_shipping_rate', $method, $index);
          @endphp
        </li>
      @endforeach
    </ul>
  @endif

  @if ($show_package_details)
    <p class="woocommerce-shipping-contents">
      {!! esc_html($package_details) !!}
    </p>
  @endif

  @if ($show_shipping_calculator)
    {!! woocommerce_shipping_calculator($calculator_text) !!}
  @endif
</div>
