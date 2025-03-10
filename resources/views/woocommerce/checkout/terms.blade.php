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

  @if (wc_terms_and_conditions_checkbox_enabled())
    <div class="woocommerce-terms-and-conditions-wrapper mt-4 mb-2">
      @php
        /**
         * Terms and conditions hook used to inject content.
         *
         * @since 3.4.0.
         * @hooked wc_checkout_privacy_policy_text() Shows custom privacy policy text. Priority 20.
         * @hooked wc_terms_and_conditions_page_content() Shows t&c page content. Priority 30.
         */
        do_action('woocommerce_checkout_terms_and_conditions');
      @endphp

      <p class="form-row validate-required">
        <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
          name="terms" <?php checked(apply_filters('woocommerce_terms_is_checked_default', isset($_POST['terms'])), true); // WPCS: input var ok, csrf ok. ?> id="terms" />
        <label for="terms" class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
          <span class="woocommerce-terms-and-conditions-checkbox-text"><?php wc_terms_and_conditions_checkbox_text(); ?></span>
          <span class="required" title="<?php esc_attr_e('required', 'woocommerce'); ?>">*</span>
        </label>
        <input type="hidden" name="terms-field" value="1" />
      </p>
    </div>
  @endif

  @php
    do_action('woocommerce_checkout_after_terms_and_conditions');
  @endphp
@endif
