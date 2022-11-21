@php
  /**
   * Checkout terms and conditions area.
   *
   * @package WooCommerce\Templates
   * @version 3.4.0
   */
  
  defined('ABSPATH') || exit();
@endphp

@if (apply_filters('woocommerce_checkout_show_terms', true) &&
    function_exists('wc_terms_and_conditions_checkbox_enabled'))
  @php
    do_action('woocommerce_checkout_before_terms_and_conditions');
  @endphp

  <small>
    @php
      do_action('woocommerce_checkout_terms_and_conditions');
    @endphp
  </small>

  @if (wc_terms_and_conditions_checkbox_enabled())
    <p class="form-row validate-required">
      <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
        <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
          name="terms" <?php checked(apply_filters('woocommerce_terms_is_checked_default', isset($_POST['terms'])), true); // WPCS: input var ok, csrf ok. ?> id="terms" />
        <span class="woocommerce-terms-and-conditions-checkbox-text"><?php wc_terms_and_conditions_checkbox_text(); ?></span>&nbsp;<abbr
          class="required" title="<?php esc_attr_e('required', 'woocommerce'); ?>">*</abbr>
      </label>
      <input type="hidden" name="terms-field" value="1" />
    </p>
  @endif

  @php
    do_action('woocommerce_checkout_after_terms_and_conditions');
  @endphp
@endif
