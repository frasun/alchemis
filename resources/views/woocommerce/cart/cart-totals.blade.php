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
<tfoot>
  <tr>
    <td colspan="4"></td>
    <td class="text-center">
      {!! esc_html_e('Total', 'woocommerce') !!}
    </td>
    <td class="text-center" data-title="{!! esc_attr_e('Total', 'woocommerce') !!}">
      {!! wc_cart_totals_order_total_html() !!}
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <a href="{!! get_permalink(wc_get_page_id('shop')) !!}" class="link">
        {!! esc_html_e('Continue shopping', 'woocommerce') !!}
      </a>
    </td>
    <td colspan="3" class="text-right">
      @php
        do_action('woocommerce_proceed_to_checkout');
      @endphp
    </td>
  </tr>
</tfoot>
