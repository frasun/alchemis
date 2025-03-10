@php
  /**
   * Single Product tabs
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 3.8.0
   */
  
  if (!defined('ABSPATH')) {
      exit();
  }
  
  /**
   * Filter tabs and allow third parties to add their own.
   *
   * Each tab is an array containing title, callback and priority.
   *
   * @see woocommerce_default_product_tabs()
   */
  $product_tabs = apply_filters('woocommerce_product_tabs', []);
@endphp

@if (!empty($product_tabs))
  <div class="prose">
    @foreach ($product_tabs as $key => $product_tab)
      @if (isset($product_tab['callback']))
        {!! call_user_func($product_tab['callback'], $key, $product_tab) !!}
      @endif
    @endforeach

    @if (has_filter('woocommerce_product_after_tabs'))
      <footer class="flex flex-wrap items-baseline mt-5 gap-3">
        @php
          do_action('woocommerce_product_after_tabs');
        @endphp
      </footer>
    @endif
  </div>
@endif
