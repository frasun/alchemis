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
<div class="cart_totals {{ WC()->customer->has_calculated_shipping() ? 'calculated_shipping' : '' }}">
  <table cellspacing="0" class="shop_table shop_table_responsive">
    <tfoot>
      <tr>
        <td colspan="4">
          <div class="flex">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="38.558" height="22.816" viewBox="0 0 38.558 22.816">
                <g transform="translate(-774.5 -657.514)">
                  <g transform="translate(774.5 657.514)">
                    <path
                      d="M-396,183.764v-.6a1.441,1.441,0,0,1,1.516-.839c2.107.03,4.215.012,6.323.01a1.157,1.157,0,0,0,1.177-.76,1.023,1.023,0,0,0-1.08-1.42c-1.844-.009-3.688,0-5.533,0a1.147,1.147,0,0,1-1.273-1.134,1.151,1.151,0,0,1,1.281-1.125c.4,0,.792,0,1.2,0,0-.8,0-1.534,0-2.274a1.168,1.168,0,0,1,1.329-1.341h20.284c0,2.226,0,4.4,0,6.565a1.169,1.169,0,0,0,1.329,1.342h8.2a3.639,3.639,0,0,1,3.747,2.882c.005.021.031.037.048.055V192.8a1.39,1.39,0,0,1-1.517.836c-.52-.036-1.045-.007-1.551-.007-.844,2.286-2.2,3.414-4.136,3.461a4.289,4.289,0,0,1-2.5-.7,4.365,4.365,0,0,1-1.892-2.738h-11.443c-.821,2.243-2.178,3.378-4.091,3.438a4.3,4.3,0,0,1-2.5-.68,4.384,4.384,0,0,1-1.928-2.78c-.759,0-1.5.007-2.237,0a1.127,1.127,0,0,1-1.137-.954,2.611,2.611,0,0,1-.014-.413c0-1.038,0-2.076,0-3.149-.724,0-1.412-.031-2.1.008a1.4,1.4,0,0,1-1.518-.837v-.6a1.447,1.447,0,0,1,1.517-.839c3.211.025,6.423.008,9.635.013a1.164,1.164,0,0,0,1.168-.661,1.128,1.128,0,0,0-1.13-1.6c-3.224,0-6.448-.015-9.672.01A1.449,1.449,0,0,1-396,183.764Zm11.3,6.929a2.079,2.079,0,0,0-2.11,2.051,2.077,2.077,0,0,0,2.071,2.089,2.073,2.073,0,0,0,2.069-2.051A2.074,2.074,0,0,0-384.7,190.693Zm17.847,2.052a2.077,2.077,0,0,0,2.073,2.088,2.073,2.073,0,0,0,2.068-2.052,2.074,2.074,0,0,0-2.032-2.088A2.079,2.079,0,0,0-366.855,192.745Z"
                      transform="translate(396 -174.275)" fill="#223728" />
                    <path d="M-30.646,177.7c3.1.6,4.744,2.817,6.16,5.364h-6.16Z" transform="translate(58.16 -177.445)"
                      fill="#223728" />
                  </g>
                </g>
              </svg>
            </div>
            <div class="grow">
              @if (WC()->cart->needs_shipping() && WC()->cart->show_shipping())
                @php
                  do_action('woocommerce_cart_totals_before_shipping');
                  
                  wc_cart_totals_shipping_html();
                  
                  do_action('woocommerce_cart_totals_after_shipping');
                @endphp
              @elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc'))
                <?php esc_html_e('Shipping', 'woocommerce'); ?>
                <?php woocommerce_shipping_calculator(); ?>
              @endif
            </div>
          </div>
        </td>
        <td class="text-center md:w-[150px]">
          {!! esc_html_e('Total', 'woocommerce') !!}
        </td>
        <td class="text-center md:w-[150px]" data-title="{!! esc_attr_e('Total', 'woocommerce') !!}">
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
  </table>
</div>
