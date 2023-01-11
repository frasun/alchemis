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

<tr class="woocommerce-shipping-totals shipping">
  <th class="hidden"></th>
  <td>
    @if ($available_methods)
      <div class="flex items-start">
        <svg xmlns="http://www.w3.org/2000/svg" width="30.419" height="18" viewBox="0 0 30.419 18" class="mr-0.75">
          <g transform="translate(0 0)">
            <path
              d="M-396,181.761v-.475a1.137,1.137,0,0,1,1.2-.662c1.662.024,3.325.01,4.988.008a.913.913,0,0,0,.928-.6.807.807,0,0,0-.852-1.12c-1.455-.007-2.91,0-4.365,0a.905.905,0,0,1-1-.894.908.908,0,0,1,1.011-.887c.312,0,.625,0,.949,0,0-.627,0-1.211,0-1.794a.922.922,0,0,1,1.049-1.058h16c0,1.756,0,3.468,0,5.179a.922.922,0,0,0,1.048,1.059h6.473a2.871,2.871,0,0,1,2.956,2.274c0,.016.025.029.038.043v6.06a1.1,1.1,0,0,1-1.2.659c-.41-.029-.824-.006-1.223-.006-.665,1.8-1.738,2.693-3.263,2.73a3.384,3.384,0,0,1-1.969-.552,3.444,3.444,0,0,1-1.492-2.16h-9.027c-.648,1.77-1.718,2.665-3.227,2.712a3.392,3.392,0,0,1-1.973-.536,3.459,3.459,0,0,1-1.521-2.193c-.6,0-1.182.006-1.765,0a.889.889,0,0,1-.9-.752,2.073,2.073,0,0,1-.011-.326c0-.819,0-1.638,0-2.484-.571,0-1.114-.024-1.654.007a1.107,1.107,0,0,1-1.2-.66v-.475a1.142,1.142,0,0,1,1.2-.662c2.534.019,5.067.006,7.6.011a.918.918,0,0,0,.921-.521.89.89,0,0,0-.891-1.262c-2.544,0-5.087-.012-7.631.008A1.144,1.144,0,0,1-396,181.761Zm8.913,5.466a1.64,1.64,0,0,0-1.664,1.618,1.639,1.639,0,0,0,1.634,1.648,1.635,1.635,0,0,0,1.632-1.618A1.636,1.636,0,0,0-387.087,187.227Zm14.08,1.619a1.639,1.639,0,0,0,1.635,1.647,1.635,1.635,0,0,0,1.631-1.619,1.636,1.636,0,0,0-1.6-1.647A1.64,1.64,0,0,0-373.007,188.846Z"
              transform="translate(396 -174.275)" fill="#223728" />
            <path d="M-30.646,177.7c2.667.515,4.088,2.427,5.308,4.622h-5.308Z" transform="translate(52.24 -177.703)"
              fill="#223728" />
          </g>
        </svg>
        <div>
          <h3 class="pb-1">{!! wp_kses_post($package_name) !!}</h3>
          <ul id="shipping_method" class="woocommerce-shipping-methods">
            @foreach ($available_methods as $method)
              <li>
                <input type="radio" name="shipping_method[{!! $index !!}]"
                  data-index="{!! $index !!}"
                  id="shipping_method_{!! $index !!}_{!! esc_attr(sanitize_title($method->id)) !!}" value="{!! esc_attr($method->id) !!}"
                  class="shipping_method"
                  {{ 1 < count($available_methods) ? checked($method->id, $chosen_method, false) : '' }} />
                <label for="shipping_method_{!! $index !!}_{!! esc_attr(sanitize_title($method->id)) !!}">
                  {!! wc_cart_totals_shipping_method_label($method) !!}
                </label>
                @php
                  do_action('woocommerce_after_shipping_rate', $method, $index);
                @endphp
              </li>
            @endforeach
          </ul>
          @if (is_cart())
            <p class="woocommerce-shipping-destination">
              @if ($formatted_destination)
                {{ printf(esc_html__('Shipping to %s.', 'woocommerce') . ' ', '<strong>' . esc_html($formatted_destination) . '</strong>') }}
                @php
                  $calculator_text = esc_html__('Change address', 'woocommerce');
                @endphp
              @else
                {!! wp_kses_post(
                    apply_filters(
                        'woocommerce_shipping_estimate_html',
                        __('Shipping options will be updated during checkout.', 'woocommerce'),
                    ),
                ) !!}
              @endif
            </p>
          @endif
        </div>
      </div>
    @elseif (!$has_calculated_shipping || !$formatted_destination)
      @if (is_cart() && 'no' === get_option('woocommerce_enable_shipping_calc'))
        {!! wp_kses_post(
            apply_filters(
                'woocommerce_shipping_not_enabled_on_cart_html',
                __('Shipping costs are calculated during checkout.', 'woocommerce'),
            ),
        ) !!}
      @else
        {!! wp_kses_post(
            apply_filters(
                'woocommerce_shipping_may_be_available_html',
                __('Enter your address to view shipping options.', 'woocommerce'),
            ),
        ) !!}
      @endif
    @elseif (!is_cart())
      {!! wp_kses_post(
          apply_filters(
              'woocommerce_no_shipping_available_html',
              __(
                  'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.',
                  'woocommerce',
              ),
          ),
      ) !!}
    @else
      {!! wp_kses_post(
          apply_filters(
              'woocommerce_cart_no_shipping_available_html',
              sprintf(
                  esc_html__('No shipping options were found for %s.', 'woocommerce') . ' ',
                  '<strong>' . esc_html($formatted_destination) . '</strong>',
              ),
          ),
      ) !!}
      @php
        $calculator_text = esc_html__('Enter a different address', 'woocommerce');
      @endphp
    @endif

    @if ($show_package_details)
      <p class="woocommerce-shipping-contents">
        <small>{!! esc_html($package_details) !!}</small>
      </p>
    @endif

    @if ($show_shipping_calculator)
      {{ woocommerce_shipping_calculator($calculator_text) }}
    @endif
  </td>
</tr>
