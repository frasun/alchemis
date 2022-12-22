@php
  /**
   * Pay for order form
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-pay.php.
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
  
  $totals = $order->get_order_item_totals(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
@endphp

<form id="order_review" method="post">
  <h4 class="mt-3">
    {!! esc_html_e('Order details', 'woocommerce') !!}
  </h4>
  @if (count($order->get_items()) > 0)
    <p>
      @foreach ($order->get_items() as $item_id => $item)
        @php
          if (!apply_filters('woocommerce_order_item_visible', true, $item)) {
              continue;
          }
        @endphp

        {!! esc_html($item->get_quantity()) !!}&nbsp;&times;&nbsp;
        {!! wp_kses_post(apply_filters('woocommerce_order_item_name', $item->get_name(), $item, false)) !!}:

        @php
          
          do_action('woocommerce_order_item_meta_start', $item_id, $item, $order, false);
          
          wc_display_item_meta($item);
          
          do_action('woocommerce_order_item_meta_end', $item_id, $item, $order, false);
        @endphp
        <strong>{!! $order->get_formatted_line_subtotal($item) !!}</strong>
        <br />
      @endforeach
    </p>
  @endif

  @if ($totals)
    @foreach ($totals as $total)
      <div>
        {!! $total['label'] !!} <strong>{!! $total['value'] !!}</strong>
      </div>
    @endforeach
  @endif

  @if ($order->needs_payment())
    <section id="payment" class="mb-4">
      <input type="hidden" name="woocommerce_pay" value="1" />
      <h4 class="mt-3">
        {!! esc_html_e('Payment', 'woocommerce') !!}
      </h4>
      <ul class="wc_payment_methods payment_methods methods mt-1">
        @php
          if (!empty($available_gateways)) {
              foreach ($available_gateways as $gateway) {
                  wc_get_template('checkout/payment-method.php', ['gateway' => $gateway]);
              }
          } else {
              echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', esc_html__('Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce')) . '</li>'; // @codingStandardsIgnoreLine
          }
        @endphp
      </ul>
      <img src="@asset('images/banner_1215x200B.png')" class="mt-2" />
    </section>
  @endif

  {{ wc_get_template('checkout/terms.php') }}

  <footer class="text-right">
    @php(do_action('woocommerce_pay_order_before_submit'))

    {!! apply_filters(
        'woocommerce_pay_order_button_html',
        '<button type="submit" class="button alt' .
            esc_attr(
                wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '',
            ) .
            '" id="place_order" value="' .
            esc_attr($order_button_text) .
            '" data-value="' .
            esc_attr($order_button_text) .
            '">' .
            esc_html($order_button_text) .
            '</button>',
    ) !!}

    @php(do_action('woocommerce_pay_order_after_submit'))
  </footer>

  <?php wp_nonce_field('woocommerce-pay', 'woocommerce-pay-nonce'); ?>
</form>
