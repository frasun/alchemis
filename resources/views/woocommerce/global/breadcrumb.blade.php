@php
  /**
   * Shop breadcrumb
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see         https://docs.woocommerce.com/document/template-structure/
   * @package     WooCommerce\Templates
   * @version     2.3.0
   * @see         woocommerce_breadcrumb()
   */
  
  if (!defined('ABSPATH')) {
      exit();
  }
  
  if (!empty($breadcrumb)) {
      // remove categories
      $modified_breadcrumb = [reset($breadcrumb), end($breadcrumb)];
  
      echo '<nav class="pb-3">';
  
      foreach ($modified_breadcrumb as $key => $crumb) {
          if (!empty($crumb[1]) && sizeof($modified_breadcrumb) !== $key + 1) {
              echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
          } else {
              echo esc_html($crumb[0]);
          }
  
          if (sizeof($modified_breadcrumb) !== $key + 1) {
              echo '<span class="px-0.75 text-greyDark">></span>';
          }
      }
  
      echo '</nav>';
  }
@endphp
