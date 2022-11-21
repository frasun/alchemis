@php
  /**
   * Order Item Details
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 5.2.0
   */
  
  if (!defined('ABSPATH')) {
      exit();
  }
  
  if (!apply_filters('woocommerce_order_item_visible', true, $item)) {
      return;
  }
@endphp

@php
  $is_visible = $product && $product->is_visible();
@endphp
{!! apply_filters('woocommerce_order_item_quantity_html', $item->get_quantity(), $item) !!}x
{!! wp_kses_post(apply_filters('woocommerce_order_item_name', $item->get_name(), $item, $is_visible)) !!}:

@php
  $qty = $item->get_quantity();
  $refunded_qty = $order->get_qty_refunded_for_item($item_id);
  
  if ($refunded_qty) {
      $qty_display = '<del>' . esc_html($qty) . '</del> <ins>' . esc_html($qty - $refunded_qty * -1) . '</ins>';
  } else {
      $qty_display = esc_html($qty);
  }
  
  do_action('woocommerce_order_item_meta_start', $item_id, $item, $order, false);
  
  wc_display_item_meta($item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
  
  do_action('woocommerce_order_item_meta_end', $item_id, $item, $order, false);
@endphp
<strong>
  {!! $order->get_formatted_line_subtotal($item) !!}
</strong>
<br />

@if ($show_purchase_note && $purchase_note)
  <div>
    {!! wpautop(do_shortcode(wp_kses_post($purchase_note))) !!}
  </div>
@endif
