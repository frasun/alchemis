@php
  /**
   * Cart totals
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 2.3.6
   */
  
  defined('ABSPATH') || exit();
@endphp

<div class="cart_totals {!! WC()->customer->has_calculated_shipping() ? 'calculated_shipping' : '' !!}">
  @php
    do_action('woocommerce_before_cart_totals');
  @endphp

  {{-- <h2>{!! esc_html_e('Cart totals', 'woocommerce') !!}</h2> --}}

  <table cellspacing="0" class="shop_table shop_table_responsive">

    {{-- <tr class="cart-subtotal">
      <th>{!! esc_html_e('Subtotal', 'woocommerce') !!}</th>
      <td data-title="{!! esc_attr_e('Subtotal', 'woocommerce') !!}">
        {{ wc_cart_totals_subtotal_html() }}
      </td>
    </tr> --}}

    @foreach (WC()->cart->get_coupons() as $code => $coupon)
      <tr class="cart-discount coupon-{!! esc_attr(sanitize_title($code)) !!}">
        <th>{{ wc_cart_totals_coupon_label($coupon) }}</th>
        <td data-title="{!! esc_attr(wc_cart_totals_coupon_label($coupon, false)) !!}">
          {{ wc_cart_totals_coupon_html($coupon) }}
        </td>
      </tr>
    @endforeach

    @if (WC()->cart->needs_shipping() && WC()->cart->show_shipping())
      @php
        do_action('woocommerce_cart_totals_before_shipping');
      @endphp

      {{ wc_cart_totals_shipping_html() }}

      @php
        do_action('woocommerce_cart_totals_after_shipping');
      @endphp
    @elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc'))
      <tr class="shipping">
        <th>
          <h6>{!! esc_html_e('Shipping', 'woocommerce') !!}</h6>
        </th>
        <td data-title="{{ esc_attr_e('Shipping', 'woocommerce') }}">
          {{ woocommerce_shipping_calculator() }}
        </td>
      </tr>
    @endif

    {{-- @foreach (WC()->cart->get_fees() as $fee)
      <tr class="fee">
        <th>{!! esc_html($fee->name) !!}</th>
        <td data-title="{!! esc_attr($fee->name) !!}">
          {{ wc_cart_totals_fee_html($fee) }}
        </td>
      </tr>
    @endforeach --}}

    {{-- @if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax())
      @php
        $taxable_address = WC()->customer->get_taxable_address();
        $estimated_text = '';
        
        if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
            /* translators: %s location. */
            $estimated_text = sprintf(' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
        }
      @endphp

      @if ('itemized' === get_option('woocommerce_tax_total_display'))
        @foreach (WC()->cart->get_tax_totals() as $code => $tax)
          <tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
            <th>{!! esc_html($tax->label) !!}{!! $estimated_text !!}</th>
            <td data-title="{!! esc_attr($tax->label) !!}">
              {!! wp_kses_post($tax->formatted_amount) !!}
            </td>
          </tr>
        @endforeach
      @else
        <tr class="tax-total">
          <th>{!! esc_html(WC()->countries->tax_or_vat()) !!}{!! $estimated_text !!}</th>
          <td data-title="{!! esc_attr(WC()->countries->tax_or_vat()) !!}">
            {{ wc_cart_totals_taxes_total_html() }}
          </td>
        </tr>
      @endif
    @endif --}}

    @php
      do_action('woocommerce_cart_totals_before_order_total');
    @endphp

    <tr class="order-total">
      <th>{{ esc_html_e('Total', 'woocommerce') }}</th>
      <td data-title="{{ esc_attr_e('Total', 'woocommerce') }}">
        {{ wc_cart_totals_order_total_html() }}
      </td>
    </tr>

    @php
      do_action('woocommerce_cart_totals_after_order_total');
    @endphp

  </table>

  <div class="wc-proceed-to-checkout">
    <a class="link" href="{!! esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))) !!}">
      {{ esc_html__('Continue shopping', 'woocommerce') }}
    </a>

    @php
      do_action('woocommerce_proceed_to_checkout');
    @endphp
  </div>

  @php
    do_action('woocommerce_after_cart_totals');
  @endphp

</div>
