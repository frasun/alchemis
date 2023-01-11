@php
  /**
   * Cart Page
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 7.0.1
   */
  
  defined('ABSPATH') || exit();
  
  do_action('woocommerce_before_cart');
@endphp

<form class="woocommerce-cart-form" action=" {!! esc_url(wc_get_cart_url()) !!}" method="post">
  @php
    do_action('woocommerce_before_cart_table');
  @endphp

  <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
    <thead>
      <tr>
        <th class="product-thumbnail">
          <span class="screen-reader-text">
            {!! esc_html_e('Thumbnail image', 'woocommerce') !!}
          </span>
        </th>
        <th class="product-name">
          <span class="screen-reader-text">
            {!! esc_html_e('Product', 'woocommerce') !!}
          </span>
        </th>
        <th class="product-quantity text-center">
          {!! esc_html_e('Quantity', 'woocommerce') !!}
        </th>
        <th class="product-remove text-center">
          {!! esc_html_e('Remove item', 'woocommerce') !!}
        </th>
        <th class="product-price text-center md:w-[120px] lg:w-[150px]">
          {!! esc_html_e('Price', 'woocommerce') !!}
        </th>
        <th class="product-subtotal text-center md:w-[120px] lg:w-[150px]">
          {!! esc_html_e('Subtotal', 'woocommerce') !!}
        </th>
      </tr>
    </thead>
    <tbody>
      @php
        do_action('woocommerce_before_cart_contents');
      @endphp

      @foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
        @php
          $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
          $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
        @endphp

        @if ($_product &&
            $_product->exists() &&
            $cart_item['quantity'] > 0 &&
            apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key))
          @php
            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
          @endphp

          <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
            <td class="product-thumbnail">
              @php
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('woocommerce_gallery_thumbnail'), $cart_item, $cart_item_key);
              @endphp

              @if (!$product_permalink)
                {!! $thumbnail !!} {{-- PHPCS: XSS ok. --}}
              @else
                @php
                  printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                @endphp
              @endif
            </td>

            <td class="product-name" data-title="{!! esc_attr_e('Product', 'woocommerce') !!}">
              @if (!$product_permalink)
                {!! wp_kses_post(
                    apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;',
                ) !!}
              @else
                {!! wp_kses_post(
                    apply_filters(
                        'woocommerce_cart_item_name',
                        sprintf('<a href="%s" class="link">%s</a>', esc_url($product_permalink), $_product->get_name()),
                        $cart_item,
                        $cart_item_key,
                    ),
                ) !!}
              @endif

              @php
                do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);
              @endphp

              {{-- Meta data. --}}
              {!! wc_get_formatted_cart_item_data($cart_item) !!} {{-- // PHPCS: XSS ok. --}}

              {{-- Backorder notification. --}}
              @if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity']))
                {!! wp_kses_post(
                    apply_filters(
                        'woocommerce_cart_item_backorder_notification',
                        '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>',
                        $product_id,
                    ),
                ) !!}
              @endif
            </td>

            <td class="product-quantity" data-title="{!! esc_attr_e('Quantity', 'woocommerce') !!}">
              @php
                if ($_product->is_sold_individually()) {
                    $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                } else {
                    $product_quantity = woocommerce_quantity_input(
                        [
                            'input_name' => "cart[{$cart_item_key}][qty]",
                            'input_value' => $cart_item['quantity'],
                            'max_value' => $_product->get_max_purchase_quantity(),
                            'min_value' => '0',
                            'product_name' => $_product->get_name(),
                        ],
                        $_product,
                        false,
                    );
                }
                
                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
              @endphp
            </td>

            <td class="product-remove">
              {!! apply_filters(
                  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                  'woocommerce_cart_item_remove_link',
                  sprintf(
                      '<a href="%s" class="remove ml-auto mr-0 md:mx-auto" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                      esc_url(wc_get_cart_remove_url($cart_item_key)),
                      esc_html__('Remove this item', 'woocommerce'),
                      esc_attr($product_id),
                      esc_attr($_product->get_sku()),
                  ),
                  $cart_item_key,
              ) !!}
            </td>

            <td class="product-price text-center md:w-[120px] lg:w-[150px]" data-title="{!! esc_attr_e('Price', 'woocommerce') !!}">
              {!! apply_filters(
                  'woocommerce_cart_item_price',
                  WC()->cart->get_product_price($_product),
                  $cart_item,
                  $cart_item_key,
              ) !!} {{-- PHPCS: XSS ok. --}}
            </td>

            <td class="product-subtotal text-center md:w-[120px] lg:w-[150px]" data-title="{!! esc_attr_e('Subtotal', 'woocommerce') !!}">
              {!! apply_filters(
                  'woocommerce_cart_item_subtotal',
                  WC()->cart->get_product_subtotal($_product, $cart_item['quantity']),
                  $cart_item,
                  $cart_item_key,
              ) !!} {{-- PHPCS: XSS ok. --}}
            </td>
          </tr>
        @endif
      @endforeach

      @php
        do_action('woocommerce_cart_contents');
      @endphp

      <tr>
        <td colspan="6" class="actions">
          @if (wc_coupons_enabled())
            <div class="coupon flex flex-wrap sm:flex-nowrap pt-4 md:pt-0">
              <label for="coupon_code">
                {!! esc_html_e('Coupon:', 'woocommerce') !!}
              </label>
              <input type="text" name="coupon_code" class="input-text sm:mr-2 mb-1 sm:mb-0" id="coupon_code"
                value="" placeholder="{!! esc_attr_e('Coupon code', 'woocommerce') !!}" />
              <button type="submit" class="button button-sm shrink-0" name="apply_coupon"
                value="{!! esc_attr_e('Apply coupon', 'woocommerce') !!}">
                {!! esc_attr_e('Apply coupon', 'woocommerce') !!}
              </button>

              @php
                do_action('woocommerce_cart_coupon');
              @endphp
            </div>
          @endif

          <button type="submit" class="btn btn-sm{!! esc_attr(
              wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '',
          ) !!}" name="update_cart"
            value="{!! esc_attr_e('Update cart', 'woocommerce') !!}">
            {!! esc_html_e('Update cart', 'woocommerce') !!}
          </button>

          @php
            do_action('woocommerce_cart_actions');
          @endphp

          @php
            wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce');
          @endphp
        </td>
      </tr>

      @php
        do_action('woocommerce_after_cart_contents');
      @endphp

    </tbody>
  </table>
  @php
    do_action('woocommerce_before_cart_collaterals');
    
    /**
     * Cart collaterals hook.
     *
     * @hooked woocommerce_cross_sell_display
     * @hooked woocommerce_cart_totals - 10
     */
    do_action('woocommerce_cart_collaterals');
  @endphp
  @php
    do_action('woocommerce_after_cart_table');
  @endphp
</form>

@php
  do_action('woocommerce_after_cart');
@endphp
