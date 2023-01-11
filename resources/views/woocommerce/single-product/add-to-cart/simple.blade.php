@php
  /**
   * Simple product add to cart
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
  
  global $product;
  
  if (!$product->is_purchasable()) {
      return;
  }
  
  echo wc_get_stock_html($product); // WPCS: XSS ok.
@endphp

@if ($product->is_in_stock())
  @php
    do_action('woocommerce_before_add_to_cart_form');
  @endphp

  <form class="flex items-center flex-wrap add-to-cart-simple" action="{!! esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())) !!}" method="post"
    enctype='multipart/form-data'>
    @php
      do_action('woocommerce_before_add_to_cart_button');
    @endphp

    <div class="flex mr-2 pb-2">
      @php
        $input_id = uniqid('quantity_');
      @endphp

      <button
        class="changeQuantity border border-grey-4 border-r-0 font-bold text-center px-1 hover:text-green active:text-greyDark"
        data-add="false" data-input-id="<?php echo $input_id; ?>">-</button>
      @php
        do_action('woocommerce_before_add_to_cart_quantity');
        
        woocommerce_quantity_input([
            'input_id' => $input_id,
            'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
            'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
            'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
        ]);
        
        do_action('woocommerce_after_add_to_cart_quantity');
      @endphp
      <button
        class="changeQuantity border border-grey-4 border-l-0 font-bold text-center px-1 hover:text-green active:text-greyDark"
        data-add="true" data-input-id="<?php echo $input_id; ?>">+</button>
    </div>

    <div class="pb-2">
      <button type="submit" name="add-to-cart" value="{!! esc_attr($product->get_id()) !!}"
        class="btn btn-sm shrink-0">{!! esc_html($product->single_add_to_cart_text()) !!}</button>
    </div>

    @php
      do_action('woocommerce_after_add_to_cart_button');
    @endphp
  </form>

  @php
    do_action('woocommerce_after_add_to_cart_form');
  @endphp
@endif
