@php
  /**
   * Checkout billing information form
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woocommerce.com/document/template-structure/
   * @package WooCommerce\Templates
   * @version 3.6.0
   * @global WC_Checkout $checkout
   */
  
  defined('ABSPATH') || exit();
@endphp

<section class="woocommerce-billing-fields">
  <h3 class="pb-1">
    @if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping())
      {!! esc_html_e('Billing &amp; Shipping', 'woocommerce') !!}
    @else
      {!! esc_html_e('Billing details', 'woocommerce') !!}
    @endif
  </h3>

  @php
    do_action('woocommerce_before_checkout_billing_form', $checkout);
  @endphp

  <div class="woocommerce-billing-fields__field-wrapper">
    @php
      $fields = $checkout->get_checkout_fields('billing');
    @endphp
    @foreach ($fields as $key => $field)
      {!! woocommerce_form_field($key, $field, $checkout->get_value($key)) !!}
    @endforeach
  </div>

  @php
    do_action('woocommerce_after_checkout_billing_form', $checkout);
  @endphp
</section>

@if (!is_user_logged_in() && $checkout->is_registration_enabled())
  <section class="woocommerce-account-fields">
    @if (!$checkout->is_registration_required())
      <div class="pt-2">
        <input id="createaccount"
          {{ checked(true === $checkout->get_value('createaccount') || true === apply_filters('woocommerce_create_account_default_checked', false), true) }}
          type="checkbox" name="createaccount" value="1" />
        <label for="createaccount">
          {!! esc_html_e('Create an account?', 'woocommerce') !!}
        </label>
      </div>
    @endif

    @php
      do_action('woocommerce_before_checkout_registration_form', $checkout);
    @endphp

    @if ($checkout->get_checkout_fields('account'))
      <div class="create-account">
        @foreach ($checkout->get_checkout_fields('account') as $key => $field)
          {!! woocommerce_form_field($key, $field, $checkout->get_value($key)) !!}
        @endforeach
        <div class="clear"></div>
      </div>
    @endif

    @php
      do_action('woocommerce_after_checkout_registration_form', $checkout);
    @endphp
  </section>
@endif
