@php
  /**
   * Order details
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 4.6.0
   */
  
  defined('ABSPATH') || exit();
  
  $order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
  
  if (!$order) {
      return;
  }
  
  $order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
  $show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', ['completed', 'processing']));
  $show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
  $downloads = $order->get_downloadable_items();
  $show_downloads = $order->has_downloadable_item() && $order->is_download_permitted();
  
  if ($show_downloads) {
      wc_get_template('order/order-downloads.php', [
          'downloads' => $downloads,
          'show_title' => true,
      ]);
  }
@endphp

<section>
  <div>
    {!! esc_html_e('Order number:', 'woocommerce') !!} <strong>{!! $order->get_order_number() !!}</strong>
  </div>
  <div>
    {!! esc_html_e('Date:', 'woocommerce') !!} <strong>{!! wc_format_datetime($order->get_date_created()) !!}</strong>
  </div>

  @php
    do_action('woocommerce_order_details_before_order_table', $order);
  @endphp

  <h4 class="mt-3">
    {!! esc_html_e('Order details', 'woocommerce') !!}
  </h4>

  @php
    do_action('woocommerce_order_details_before_order_table_items', $order);
  @endphp

  <p>
    @foreach ($order_items as $item_id => $item)
      @php
        $product = $item->get_product();
        
        wc_get_template('order/order-details-item.php', [
            'order' => $order,
            'item_id' => $item_id,
            'item' => $item,
            'show_purchase_note' => $show_purchase_note,
            'purchase_note' => $product ? $product->get_purchase_note() : '',
            'product' => $product,
        ]);
      @endphp
    @endforeach
  </p>

  @php
    do_action('woocommerce_order_details_after_order_table_items', $order);
  @endphp

  @foreach ($order->get_order_item_totals() as $key => $total)
    <div>
      {!! esc_html($total['label']) !!}
      <strong> {!! 'payment_method' === $key ? esc_html($total['value']) : wp_kses_post($total['value']) !!}</strong>
    </div>
  @endforeach

  @if ($order->get_customer_note())
    <div class="mt-1">
      {!! esc_html_e('Note:', 'woocommerce') !!}
      {!! wp_kses_post(nl2br(wptexturize($order->get_customer_note()))) !!}
    </div>
  @endif

  @php
    do_action('woocommerce_order_details_after_order_table', $order);
  @endphp

  @php
    do_action('woocommerce_after_order_details', $order);
  @endphp

  {{-- @if ($show_customer_details) --}}
  {{ wc_get_template('order/order-details-customer.php', ['order' => $order]) }}
  {{-- @endif --}}
</section>
