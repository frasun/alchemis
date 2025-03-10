@php
  /**
   * My Addresses
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 2.6.0
   */
  
  defined('ABSPATH') || exit();
  
  $customer_id = get_current_user_id();
  
  if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
      $get_addresses = apply_filters(
          'woocommerce_my_account_get_addresses',
          [
              'billing' => __('Billing address', 'woocommerce'),
              'shipping' => __('Shipping address', 'woocommerce'),
          ],
          $customer_id,
      );
  } else {
      $get_addresses = apply_filters(
          'woocommerce_my_account_get_addresses',
          [
              'billing' => __('Billing address', 'woocommerce'),
          ],
          $customer_id,
      );
  }
  
  $oldcol = 1;
  $col = 1;
@endphp

<p>
  {!! apply_filters(
      'woocommerce_my_account_my_address_description',
      esc_html__('The following addresses will be used on the checkout page by default.', 'woocommerce'),
  ) !!}
</p>

@if (!wc_ship_to_billing_address_only() && wc_shipping_enabled())
  <div class="grid md:grid-cols-2 gap-3 addresses mt-1">
@endif

@foreach ($get_addresses as $name => $address_title)
  @php
    $address = wc_get_account_formatted_address($name);
    $col = $col * -1;
    $oldcol = $oldcol * -1;
  @endphp

  <div class="woocommerce-Address">
    <header class="woocommerce-Address-title title">
      <h4 class="uppercase pb-1 font-bold">{!! esc_html($address_title) !!}</h4>
    </header>
    <address>
      {!! $address
          ? wp_kses_post($address)
          : esc_html_e('You have not set up this type of address yet.', 'woocommerce') !!}
    </address>
    <a href="{!! esc_url(wc_get_endpoint_url('edit-address', $name)) !!}" class="edit">{!! $address ? esc_html__('Edit', 'woocommerce') : esc_html__('Add', 'woocommerce') !!}</a>
  </div>
@endforeach

@if (!wc_ship_to_billing_address_only() && wc_shipping_enabled())
  </div>
@endif
